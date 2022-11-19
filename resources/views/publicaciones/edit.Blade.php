@extends('layouts.dashboard')

@section('title', 'Bizsett | Editar Publicación')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">

    <h1 class="text-3xl text-center font-bold">Editar publicación</h1>

    <?php $emprendimiento = $publicacione['emprendimiento']; ?>

    <strong>Publicación de: {{$emprendimiento['nombre']}}</strong>
    <br>
    <br>
    <center>
    <form action="{{'http://localhost/api.bizsett/public/v1/publicaciones/'.$publicacione['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <textarea name="descripcion" class="form-control border borde-white" placeholder="Descripción..." id="descripcion" value="">{{old('descripcion', $publicacione['descripcion'])}}</textarea>

        <br>
        <br>


        <input type="file" class="border border-black" name="imagen" value="{{old('url_contenido', $publicacione['imagen'])}}">

        <br>

        <br>
            <label >
                Emprendimiento:
                <br>
                <select name="emprendimiento_id" id="idemprendimiento" class="form-select" aria-label="Default select example">
                    @foreach ($emprendimientos as $emprendimiento)
                        <option value="{{$emprendimiento['id']}}">{{$emprendimiento['nombre']}}</option>
                    @endforeach
                </select>
            </label>

            <div class="d-flex justify-content-between">

                <a style="color:black" href="{{route('publicaciones.index',)}}"><b>cancelar</b></a>
                <button class="btn" style = "background-color:rgb(255, 174, 0) "  type="submit">Actualizar</button>
                
            </div>
        

            
    </form> 
    </center>

</div>

@endsection
