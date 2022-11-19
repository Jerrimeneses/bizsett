@extends('layouts.plantilla')

@section('title' , "Bizsett | ".$emprendimiento['nombre'])

@section('content')

<div class="container-fluid">

  <center>
  <div class="perfil">
    <div class="col-md-10">
      <!-- Column -->
      <?php
          $user = $emprendimiento['user'];
      ?>
    
        {{-- Foto usuario --}}
        <div class=""><img class="" style="width: 200px; height: 200px;" src="{{ 'http://localhost/api.bizsett/public/storage/fotos_perfiles/' . $user['foto_perfil']}}" alt="user" ></div>
          
        <div>
          {{-- Nombre del emprendimiento --}}
          <p class="h1 font-bold">{{$emprendimiento['nombre']}}</p>
        </div>
          {{-- Descripción del emprendimiento --}}
        <p>{{$emprendimiento['descripcion']}}</p> 
          
        <br>
          
          <div class="row text-center m-t-20">
              <div class="col-lg-4 col-md-4 m-t-20">
                {{-- Contador de publicaciones, del emprendimiento --}}
                
              {{-- Número de publicaciones, de seguidores y seguidos --}}
                <p class="h3 m-b-0 font-light font-bold">{{$public}}</p>
                <p class="h3 m-b-0 font-light ">Publicaciones</p>
              </div>
              <div class="col-lg-4 col-md-4 m-t-20">
                
                <p class="h3 m-b-0 font-light font-bold">{{$seguidores}}</p>
                <p class="h3 m-b-0 font-light ">Seguidores</p>
              </div>
              <div class="col-lg-4 col-md-4 m-t-20">
                
                <p class="h3 m-b-0 font-light font-bold">{{$seguidos}}</p>
                <p class="h3 m-b-0 font-light ">Seguidos</p>
              </div>
          </div>
    </div>
  </div>

    <br>
  
{{-- Publicaciones del emprendimiento --}}
  <div class="row three-panel-block">

    @foreach ($emprendimiento['publicaciones'] as $publicacione)
      
          {{-- Cada publicación --}}
        <div class="service-block-overlay card col-3 m-5 ">
            <div class="row my-2">
              <div class="col-1 p-0">
              </div>
              <div class="col-9 ">
                    {{-- Nombre emprendimiento de la publicación --}}
                <h5 class="card-title"><strong><a href="{{route('perfilemp.user', $emprendimiento['id'])}}">{{$emprendimiento['nombre']}}</a></strong></h5>
                    {{-- fecha y hora de la publicación --}}
                <p class="card-text"><small class="text-muted">{{$publicacione['created_at']}}</small></p>
              
              </div>
                @auth
                
                @if (auth()->user()->id==$emprendimiento['user_id'])
                
                  <div class="col-2 d-flex justify-content-end">
                        {{-- Opciones de la publicación --}}
                    <a class=""  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="{{asset('storage\img\bx-dots-vertical-rounded.svg')}}" alt="dots-vertical">
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- Eliminar publicación --}}
                       
                          <form action="{{route('publicaciones.destroy', $publicacione['id'])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link dropdown-item" style="color:#ffc400">Eliminar</button>
                        {{-- Editar publicación --}}
                      </form>
                      
                        <a class="dropdown-item" href="{{route('publicaciones.edit', $publicacione['id'])}}">Editar</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Cancelar</a>
                        
                      
                      
                    </div>
                
                  </div>
                @endif
                  
              @endauth  
            </div>
            
            {{-- Imagen --}}
          
            <div class="img border border-gray-400 shadow-lg" style="background-color:rgb(209, 209, 209)">
              
                  <img style="height:12rem" src="{{ 'http://localhost/api.bizsett/public/storage/multimedia_folder/' . $publicacione['imagen']}}" class="img-fluid" alt="{{$publicacione['imagen']}}">
                
            </div>
      </div>
    @endforeach
  </div>
</div>


@endsection