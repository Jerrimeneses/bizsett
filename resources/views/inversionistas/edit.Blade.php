@extends('layouts.dashboard')

@section('title', 'Bizsett | Editar inversión')

@section('content')

    <center>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">

    <h1 class="text-3xl text-center font-bold">Editar datos de la propuesta de inversión</h1>


    @foreach($emprendimientos as $emprendimiento)
            @if ($inversionista['emprendimiento_id'] == $emprendimiento['id'])
            <strong>Dirigido a: {{$emprendimiento['nombre']}}</strong>
            @endif
         @endforeach
    
    <br>
    <br>

    <form action="{{route('inversionistas.update', $inversionista['id'])}}" method="post">

        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-12 form-floating">
                <textarea name="propuesta" class="form-control" placeholder="Propuesta de inversión" id="floatingTextarea">{{old('propuesta', $inversionista['propuesta'])}}</textarea>
                <label for="floatingTextarea">Propuesta</label>
            </div>
            </div>
            
        
        @error('propuesta')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        <br>

        <!-- @error('nombreo')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        -->


        <button class="btn" style = "background-color:rgb(255, 174, 0) "  type="submit">Actualizar</button>
        <br>
        <a style="color:black" href="{{route('inversionistas.index', $inversionista)}}"><b>cancelar</b></a>

    </form> 

    <br>
    
    </center>
</div>

@endsection
