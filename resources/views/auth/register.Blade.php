@extends('layouts.plantilla')

@section('title', 'Bizsett | Register')

@section('content')
<style>
    body {
    
   background: -webkit-linear-gradient(to right, rgba(43, 61, 80, 0), hsla(204, 8%, 76%, 0)), url('http://localhost/bizsett/public/storage/img/pexels-krivec-ales-548264.jpg'); 
   background: linear-gradient(to right, rgba(43, 61, 80, 0), hsla(204, 8%, 76%, 0)), url('http://localhost/bizsett/public/storage/img/pexels-krivec-ales-548264.jpg'); 
   background-size: cover;
   background-attachment: fixed;
   position: relative; 

 }
</style>
<body>

<br><br>

<div class="container">
    <div class="row">

        <div class="block mx-auto my-4 p-8 w-1/3 shadow-lg col-8" style="border-radius: 15px; background-color:rgba(5, 5, 5, 0.5) ;">

            <h1 class="text-5xl text-center pt-18">Registro</h1>
    
            <form action="" class="mt-5" method="POST">
            @csrf


                <div class="row">

                    <div class="col-5 ">

                    <input type="text" class="border border-gray bg-gray-200 w-full text-lg 
                    placeholder-gray-900 p-2 my-2 " placeholder="Nombre" name="nombre" value="{{old('nombre')}}" style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">


                    @error('nombre')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror

                    <br>


                    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
                    placeholder-gray-900 p-2 my-2 " placeholder="Apellidos" name="apellidos" value="{{old('apellidos')}}" style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">


                    <br>

                    @error('apellidos')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror


                    <div class="input-group form-group my-2">
						<div class="input-group-prepend">
							<select name="tipodocumento_id" id="idtipodocumento" class="form-select form-select-sm my-2 mx-2" aria-label=".form-select-sm example" style="border-radius: 15px; background-color:rgb(224, 224, 224) ">
                                @foreach ($tipodocumentos as $tipodocumento)
                                    <option value="{{$tipodocumento->id}}" >{{$tipodocumento->nombre}}</option>
                                @endforeach
                            </select>
						</div>
						<input type="text" class="form-control border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
                        placeholder-gray-900 p-2" placeholder="Número de documento" name="numero_documento" value="{{old('numero_documento')}}" style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">
                    
					</div>

                

                    @error('numero_documento')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror


                </div>

                <div class="col-1"></div>

                <div class="col-5 ">

                    <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
                    placeholder-gray-900 p-2 my-2 " placeholder="Correo" name="email" value="{{old('email')}}" style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">
                    

                    <br>

                    @error('email')
                        <br>
                        <div class="alert alert-warning" role="alert">Ese correo ya existe.
                        </div>
                        <br>
                    @enderror


                    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
                    placeholder-gray-900 p-2 my-2 " placeholder="Contraseña" name="password" value="{{old('passsword')}}" style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">


                    <br>

                    @error('password')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror



                    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
                    placeholder-gray-900 p-2 my-2" placeholder="Confirmar contraseña" name="password_confirmation" value="{{old('passsword')}}" style="border-radius: 15px; background-color:rgb(224, 224, 224) ;">


                    <br>

                

                    </div>
                </div>

                {{-- botón de registrarse --}}

                <div class="d-flex justify-content-end mx-20">
                    <button type="submit" class="rounded-md bg-warning text-lg font-semibold p-2 my-3 hover:bg-black">Registrarse</button>
                </div>
            </form>

        </div>

    </div>

</div>

<br><br><br>
    
</body>
@endsection



