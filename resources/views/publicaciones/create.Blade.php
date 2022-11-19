@extends('layouts.dashboard')

@section('title', '"Bizsett | Publicar')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <center>
    <h1 class="text-3xl text-center font-bold">Publicación</h1>
    <br>
    <?php $id = 0; ?>

    <form action="{{'http://localhost/api.bizsett/public/v1/publicaciones/crear/'.$id}}" method="POST" enctype="multipart/form-data">
    @csrf

        <textarea name="descripcion" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Descripción..." id="descripcion"></textarea >

        @error('descripcion')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <br>

     
        <input type="file" id="imagen" class="" name="imagen" value="{{old('imagen')}}" required>

        @error('imagen')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <div>
            <img id="imgSeleccionada">
        </div>

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
            <br>

            <div class="d-flex justify-content-between">

                <a style="color:black" href="{{route('publicaciones.index')}}"><b>cancelar</b></a>
                
                <button class="btn" style="background-color: rgb(255, 174, 0) " type="submit">Crear</button>
                
            </div>

        
    </form>
    </center>

</div>


<script>
    function readImage (input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgSeleccionada').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function () {
        // Código a ejecutar cuando se detecta un cambio de archivO
        readImage(this);
    });
</script>

<style>
input:invalid {
    border: 2px dashed red;
  }
  
  input:invalid:required {
    background-image: linear-gradient(to right, pink, lightgreen);
  }
  
  input:valid {
    border: 2px solid black;
  }

  </style>

@endsection
