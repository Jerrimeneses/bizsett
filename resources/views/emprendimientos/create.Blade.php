@extends('layouts.dashboard')

@section('title', 'Bizsett | Registrar emprendimiento')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
    rounded-lg shadow-lg" style="width:900px">

    <h1 class="text-3xl text-center font-bold">Crea un emprendimiento</h1>
    <br>

    <center>
    <form action="{{route('emprendimientos.store')}}" method="POST">
    @csrf

    <div class="row">

        <div class="col-5">

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
            placeholder-gray-900 p-2 my-2 " placeholder="Nombre" name="nombre" value="{{old('nombre')}}" 
            style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">
            <br>

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <input type="tel" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
            placeholder-gray-900 p-2 my-2 " placeholder="Teléfono" name="telefono" value="{{old('telefono')}}" 
            style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">

            {{-- @error('telefono')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror --}}

            <input type="tel" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
            placeholder-gray-900 p-2 my-2 " placeholder="Categoría" name="categoria" value="{{old('categoria')}}" 
            style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">
            <br>

            @error('categoria')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <input type="tel" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
            placeholder-gray-900 p-2 my-2 " placeholder="Dirección" name="direccion" value="{{old('direccion')}}" 
            style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">
            <br>

        </div>

        <div class="col-1"></div>

        <div class="col-5">

            <label for="">
                <strong>Descripción</strong>
                <textarea class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
                placeholder-gray-900 p-2 my-2 " placeholder="Descripción" name="descripcion" value="{{old('descripcion')}}" 
                style="border-radius: 15px; background-color:rgb(224, 224, 224) ;"> </textarea>
            </label>

            <br>

            @error('descripcion')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror


            <label for="">
                <strong>Ciudad</strong>
                <select name="ciudade_id" id="idciudad" class="form-select" aria-label="Default select example" >
                    @foreach ($ciudades as $ciudade)
                        <option value="{{$ciudade['id']}}">{{$ciudade['nombre_ciudad']}}</option>
                    @endforeach
                </select>
            </label>

                {{-- @error('ciudad')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror --}}

                <br>
                <br>

        
            <label>
                <strong>Usuario</strong>
                <select name="user_id" id="iduser" class="form-select" aria-label="Default select example">
                    @foreach ($users as $user)  
                        @if ($user['emprendimiento'] == null)
                            <option value="{{$user['id']}}">{{$user['nombre']}}</option> 
                        @endif
                    @endforeach    
                </select>
            </label>

        </div>

    </div>

        <br>
        <button class="btn" style="background-color: rgb(255, 174, 0) " type="submit">Crear</button>
        <br>
        <br>
        <a style="color:black" href="{{route('emprendimientos.index')}}"><b>cancelar</b></a>
        
        
    </form>
    </center>
    
</div>

@endsection
