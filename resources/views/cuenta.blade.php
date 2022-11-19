@extends('layouts.plantilla')

@section('title' , "Bizsett | ".$emprendimiento['nombre'])

@section('content')

<head>
  <link rel="stylesheet" href="{{ asset('css/perfilcuenta.css') }}">
</head>

{{-- Botones para invertir y solicitar empleo --}}

<body>
  @auth
    <ul>
        <a href="{{ route('inversionistas.crear', $emprendimiento['id']) }}" class="btn btn-warning btn-sm btn-md btn-rounded" >invertir</a> 
        <a href="{{ route('empleos.crear', $emprendimiento['id']) }}" class="btn btn-warning btn-sm btn-md btn-rounded">Postularme</a>
    </ul>
  @endauth

  <div class="container-fluid">

    <center>
    <div class="perfil">
      <div class="col-md-10">
          <!-- Column -->

          
          <?php 
              $user = $emprendimiento['user'];?>
              @auth
              <?php 
              $follow='no';
              for ($i=0; $i < 1;) { 
                foreach ($followers as $follower){
                  if (auth()->user()->id == $follower['user_id']){
                    if ($follower['emprendimiento_id'] == $emprendimiento['id']){
                        $follow='si';
                    }else{
                        $i++;
                    }
                  }
                }$i=1;
              }
          ?>
        @endauth
            {{-- Foto usuario --}}
            <div class=""><img class="" style="width: 200px; height: 200px;" src="{{ 'http://localhost/bizsett/public/storage/fotos_perfiles/' . $user['foto_perfil']}}" alt="user" ></div>
            
          <div>
            {{-- Nombre del emprendimiento --}}
          <p class="h1 font-bold">{{$emprendimiento['nombre']}}</p>
          </div>
            {{-- Descripción del emprendimiento --}}
          <p>{{$emprendimiento['descripcion']}}</p> 
            
            @auth
              {{-- Botón de seguir --}}
              @if($follow == 'si')
                <form action="{{route('followers.destroy', $follower['id'])}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">
                    Siguiendo
                  </button>
                </form>
              @else
                <form action="{{route('followers.store', $emprendimiento['id'])}}" method="POST">
                  @csrf
                  <button type="submit" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">
                    Seguir
                  </button>
                </form>
              @endif
            @endauth
            
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
    <div class="row three-panel-block mt-5">

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
                 
              </div>
              
              {{-- Imagen --}}
            
              <div class="img border border-gray-400 shadow-lg" style="background-color:rgb(209, 209, 209)">
                
                    <img style="height:12rem" src="{{ 'http://localhost/api.bizsett/public/storage/multimedia_folder/' . $publicacione['imagen']}}" class="img-fluid" alt="{{$publicacione['imagen']}}">
                  
              </div>
        </div>
      @endforeach
    </div>
  </div>
  
</body>
@endsection


