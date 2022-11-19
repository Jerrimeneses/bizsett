@extends('layouts.plantilla')

@section('title', 'Bizsett | Login')

@section('content')
<body> 
<br><br>

<div class="block mx-auto my-12 p-8 w-1/3 shadow-lg" style="border-radius: 15px; background-color:rgba(0, 0, 0, 0.5) ;">

    <h1 class="text-3xl text-center font-bold">Login</h1>

    <form action="" class="mt-4" method="POST">
    @csrf

        <input type="email" class=" border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
        placeholder-gray-900 p-2 my-2" value="{{old('email')}}" placeholder="Correo" id="email" name="email">

        <input type="password" class=" border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
        placeholder-gray-900 p-2 my-2" placeholder="Contraseña" id="password" name="password">

        @error('message')
        <p class="alert alert-danger">*Correo o contraseña incorrectos</p>
        @enderror

        <button type="submit" class="rounded-md bg-warning w-full text-lg font-semibold p-2 my-3 hover:bg-black">Inciar sesión</button>

        
        <center>
        <a href="" style="color: #FEA900">¿Olvidaste tu contraseña?</a>
        </center>
    
    </form>

</div>
<br><br><br>
</body>
<style>
    body {
    
   background: -webkit-linear-gradient(to right, rgba(43, 61, 80, 0), hsla(204, 8%, 76%, 0)), url('http://localhost/bizsett/public/storage/img/pexels-krivec-ales-548264.jpg'); 
   background: linear-gradient(to right, rgba(43, 61, 80, 0), hsla(204, 8%, 76%, 0)), url('http://localhost/bizsett/public/storage/img/pexels-krivec-ales-548264.jpg'); 
   background-size: cover;
   background-attachment: fixed;
   position: relative; 

 }
</style>
@endsection

