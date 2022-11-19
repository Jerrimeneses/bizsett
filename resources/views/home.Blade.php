@extends('layouts.plantilla')

@section('title', 'Bizsett')

@section('content')

  <head>
    <style>
      /* body {
      
     background: -webkit-linear-gradient(to right, rgba(43, 61, 80, 0), hsla(204, 8%, 76%, 0)), url('http://localhost/bizsett/public/storage/img/pexels-krivec-ales-548264.jpg'); 
     background: linear-gradient(to right, rgba(43, 61, 80, 0), hsla(204, 8%, 76%, 0)), url('http://localhost/bizsett/public/storage/img/pexels-krivec-ales-548264.jpg'); 
     background-size: cover;
     background-attachment: fixed;
     position: relative; 
   
   }*/
  </style>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="main.css" rel="stylesheet" type="text/css">
      <title>Responsive Image Slider Only With Html And Css</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body>
  {{-- <section id="images-slider">
  
    
     <ul class="slides">
     
      <input type="radio" name="radio-btn" id="img-1" checked />
      <li class="slide-container">
      <div class="slide">
        <img src="http://localhost/bizsett/public/storage/img/fondo_one.jpg"/>
          </div>
      <div class="nav">
        <label for="img-6" class="prev"><i class="fas fa-chevron-circle-left fa-3x"></i></label>
        <label for="img-2" class="next"><i class="fas fa-chevron-circle-right fa-3x"></i></label>
      </div>
      </li>
  
      <input type="radio" name="radio-btn" id="img-2" />
      <li class="slide-container">
          <div class="slide">
            <img src="http://localhost/bizsett/public/storage/img/pexels-francesco-ungaro-1526725.jpg"/>
          </div>
      <div class="nav">
        <label for="img-1" class="prev"><i class="fas fa-chevron-circle-left fa-3x"></i></label>
        <label for="img-3" class="next"><i class="fas fa-chevron-circle-right fa-3x"></i></label>
      </div>
      </li>
  
      <input type="radio" name="radio-btn" id="img-3" />
      <li class="slide-container">
          <div class="slide">
            <img src="http://localhost/bizsett/public/storage/img/fondo5.jpg"/>
          </div>
      <div class="nav">
        <label for="img-2" class="prev"><i class="fas fa-chevron-circle-left fa-3x"></i></label>
        <label for="img-4" class="next"><i class="fas fa-chevron-circle-right fa-3x"></i></label>
      </div>
      </li>
  
      <input type="radio" name="radio-btn" id="img-4" />
      <li class="slide-container">
          <div class="slide">
            <img src="http://localhost/bizsett/public/storage/img/fondo_one.jpg"/>
          </div>
      <div class="nav">
        <label for="img-3" class="prev"><i class="fas fa-chevron-circle-left fa-3x"></i></label>
        <label for="img-5" class="next"><i class="fas fa-chevron-circle-right fa-3x"></i></label>
      </div>
      </li>
  
      <input type="radio" name="radio-btn" id="img-5" />
      <li class="slide-container">
          <div class="slide">
            <img src="https://picsum.photos/609/424/?random"/>
          </div>
      <div class="nav">
        <label for="img-4" class="prev"><i class="fas fa-chevron-circle-left fa-3x"></i></label>
        <label for="img-6" class="next"><i class="fas fa-chevron-circle-right fa-3x"></i></label>
      </div>
      </li>
  
      <input type="radio" name="radio-btn" id="img-6" />
      <li class="slide-container">
          <div class="slide">
            <img src="https://picsum.photos/609/425/?random"/>
          </div>
      <div class="nav">
        <label for="img-5" class="prev"><i class="fas fa-chevron-circle-left fa-3x"></i></label>
        <label for="img-1" class="next"><i class="fas fa-chevron-circle-right fa-3x"></i></label>
      </div>
      </li>
  
      <li class="nav-dots">
        <label for="img-1" class="nav-dot" id="img-dot-1"></label>
        <label for="img-2" class="nav-dot" id="img-dot-2"></label>
        <label for="img-3" class="nav-dot" id="img-dot-3"></label>
        <label for="img-4" class="nav-dot" id="img-dot-4"></label>
        <label for="img-5" class="nav-dot" id="img-dot-5"></label>
        <label for="img-6" class="nav-dot" id="img-dot-6"></label>
      </li>
  </ul>
    
      
  </section> --}}
    
      


<div class="container-fluid">
  <br>
  @auth
    @foreach ($emprendimientos as $emprendimiento)
      @if ($emprendimiento['user_id'] == auth()->user()->id)
        <div class="row">
          <div class="col-3 mb-1">
            <a class="btn mx-2" style="background-color: #f9ae00; " href="{{route('publicaciones.create')}}">
                  <img src="storage\img\bxs-image-add.svg" alt="">
                </a>
          </div>
          <div class="col-3 mb-1"></div> 
        </div>
      @endif    
    @endforeach
  @endauth


  {{-- Cada publicación --}}

  @foreach ($publicaciones as $publicacione)
    <div class="row">
      
      <div class="col-3 mb-1"></div>

      <div class="card col-6 mb-4" style="border-radius: 15px; background-color:#f1f1f1 ;">

        <div class="card-head ">
          <?php
              $emprendimiento = $publicacione['emprendimiento'];
              $foto_perfil = $publicacione['emprendimiento']['user']['foto_perfil'];
          ?>
            <br>
                <div class="row">
                  <div class="col-1 p-0">
                          {{-- Foto usuario publicación --}}
                      @auth
                        @if (auth()->user()->id == $emprendimiento['user_id'])
                            <a href="{{route('perfilemp.me')}}">
                              <img class="rounded-circle mx-3" src="{{'http://localhost/bizsett/public/storage/fotos_perfiles/'.$foto_perfil}}" style="width: 50px; height: 50px;">
                            </a>
                        @else

                            <a href="{{route('perfilemp.user', $emprendimiento['id'])}}">
                              <img class="rounded-circle mx-3" src="{{'http://localhost/bizsett/public/storage/fotos_perfiles/'.$foto_perfil}}" style="width: 50px; height: 50px;">
                            </a>
                        @endif
                      @else
                      <a href="{{route('perfilemp.user', $emprendimiento['id'])}}">
                        <img class="rounded-circle mx-3" src="{{'http://localhost/bizsett/public/storage/fotos_perfiles/'.$foto_perfil}}" style="width: 50px; height: 50px;">
                      </a>
                      @endauth

                            
                  </div>
                  <div class="col-8 mx-3">
                        {{-- Nombre emprendimiento de la publicación --}}
                    <h5 class="card-title"><strong><a href="{{route('perfilemp.user', $emprendimiento['id'])}}">{{$emprendimiento['nombre']}}</a></strong></h5>
                        {{-- fecha y hora de la publicación --}}
                    <p class="card-text"><small class="text-muted">{{$publicacione['created_at']}}</small></p>
                  
                  </div>
                  @auth
                    @if (auth()->user()->id==$emprendimiento['user_id'])
                      <div class="col-2 d-flex justify-content-end">
                            {{-- Opciones de la publicación --}}
                        <a class="nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="storage\img\bx-dots-vertical-rounded.svg" alt="dots-vertical">
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
                                {{-- Cancelar opciones de la publicación --}}
                                    <a class="dropdown-item" href="">Cancelar</a>
                            </div>
                      </div>
                    @endif
                  @endauth
                </div>
            {{-- Descripción  --}}
            <p class="card-text">{{$publicacione['descripcion']}}</p>

          </div>

          <hr>
          <br>
          <center>
            {{-- IMAGEN --}}
            <img src="{{'http://localhost/api.bizsett/public/storage/multimedia_folder/'. $publicacione['imagen']}}" 
            style="width:40rem; border-radius: 15px" class="card-img-top" alt="{{$publicacione['imagen']}}">

        </center>
        <br>
        <hr>
        
        <div class="card-body">
            <div class="row">
              <div class="col-3">

              @auth
                
                {{-- Si el usuario logueado ha reaccionado a la publicación o no --}}
                <?php 
                  $reac='no';
                  for ($i=0; $i < 1;) { 
                    foreach ($reacciones as $reaccione){
                      if (auth()->user()->id == $reaccione['user_id']){
                        if ($reaccione['publicacione_id'] == $publicacione['id']){
                                $reac='si';
                          }else{
                              $i++;
                          }
                      }
                    }$i=1;
                  }
                ?>
                {{-- Elimina la reacción --}}
                @if ($reac == 'si')
                  <form action="{{route('reacciones.destroy', $reaccione['id'])}}" method="POST">
                    @csrf
                    @method('delete')
                      <button type="submit">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 174, 0, 1);transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>  
                      </button>
                  </form>
                @else
                  {{-- Crea la reacción --}}
                  <form action="{{route('reacciones.store', $publicacione['id'])}}" method="POST">
                    @csrf
                    <button type="submit">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
                    </button>
                  </form>
                @endif
                  

                  {{-- Si no está logueado --}}
              @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
              @endauth
                  {{-- Contador de reacciones --}}
                  <?php 
                      $cont=0;
                    foreach($publicacione['reacciones'] as $reaccione){
                            $cont=$cont+1;
                    }
                    $cont;
                  ?>
                  {{-- Número de reacciones --}}
                  <h5>{{$cont}} reacciones</h5>

                  {{-- Contador de comentarios --}}
                  <?php 
                      $coment=0;
                      foreach($publicacione['comentarios'] as $comentario){
                              $coment=$coment+1;
                      }
                      $coment;
                  ?>
                  
              </div>
              {{-- ver los comentarios (Acordion) --}}
              <div class="col-7 d-flex justify-content-center">
                
                <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #f9ae00">
                  Ver comentarios ( {{$coment}} )
                </a>
              
              </div>
              {{-- Compartir --}}
              <div class="col-2">
                <a href="">
                  <img src="storage\img\bxs-share-alt.svg" alt="">
                </a>
              </div>
            </div>
            <hr>
            <br>
            {{-- Comentar --}}
            @auth
                
            <form action="{{route('comentarios.store', $publicacione['id'])}}" method="POST">
              @csrf
              <input name="comentario" class="round w-full placeholder-gray-500" placeholder="Deja un comentario..." style="width:85%; background-color:rgb(212, 212, 212)" type="text">

              <button class="btn" style="background-color: #ffae00;  border-radius: 15px; width:50px" type="submit">
                <img style="width:50px;" src="storage\img\bx-send.svg" alt="send">
              </button>
            </form>
            <hr>
            
            @endauth
            {{-- Comentarios --}}
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  @foreach ($publicacione['comentarios'] as $comentario)

                    <?php
                    $user = $comentario['user'];
                    ?>
                     
                          <div class="col-8">
                            <div class="row">
                              <div class="col-2">
                                      <img class="rounded-circle mx-3" src="storage\fotos_perfiles\{{$user['foto_perfil']}}" style="width: 30px; height: 30px;">
                              </div>

                              <div class="">
                                <strong>{{$user['nombre']}}.</strong>
                                <p class="h6">{{$comentario['comentario']}}</p>
                              </div>

                            </div>
                            
                            <hr>
                          </div>
                            @auth
                                {{-- Si el usuario logueado es el que hizo el comentario --}}
                              @if (auth()->user()->id==$comentario['user_id'])
                                <div class="col-2 d-flex justify-content-end">
                                  {{-- Opciones del comentario --}}
                                  <a class="nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="storage\img\bx-dots-vertical-rounded.svg" alt="dots-vertical">
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    {{-- Eliminar comentario --}}
                                    <form action="{{route('comentarios.destroy', $comentario['id'])}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-link dropdown-item" style="color:rgb(255, 196, 0)">Eliminar</button>
                                    </form>
                                    {{-- Editar comentario --}}
                                    <a class="dropdown-item" href="">Editar</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="">Cancelar</a>
                                  </div>
                                </div>
                            
                              @endif
                            @endauth

                    
                  @endforeach
                </div>
              </div>
            </div>
        </div>
      </div>

      <div class="col-3 col-md-1"></div> 

    </div>

  @endforeach
  </div>
</body>

<style>
  
  * {
      padding: 0px;
      margin: 0;
      box-sizing: border-box;
  }
  
  .h1-title {
      text-align: center;
      padding-bottom: 20px;
      color: #fff;
  }
  .slides {
    width: 1200px;
      height:500px;
      margin: 0 auto;
      position: relative;
      display: block;
  
      
    /* animation: cambio 20s infinite alternate linear; */
    animation-duration: 3s;
    animation-name: slidein;
  }
  .slides input { 
      display: none; 
  }
  
  .slide-container { 
      display: block;
  }
  
  .slide {
      top: 0;
      opacity: 0;
      display: block;
      position: absolute;
      transform: scale(0);
      transition: all .7s ease-in-out ;
      animation: normal;
    animation-duration: 5s;
    animation-iteration-count: infinite;
      
  }
  
  
  
  .slide img {
      width: 1200px;
      height:500px;
      display: block;
  
      
  
  }
  
  .nav label {
      display: none;
      position: absolute;
      cursor: pointer;
      color: rgba(0,0,0,0.5);
      text-align: center;
      margin-top: 29%;
  }
  
  .nav label:hover { 
      color: #000;
  }
  
  .nav .next { 
      right: 5px; 
  }
  
  .nav .prev {
      left: 5px;
  } 
  
  input:checked + .slide-container  .slide {
      opacity: 1;
      transform: scale(1);
      transition: opacity 1s ease-in-out;
  }
  
  input:checked + .slide-container .nav label { 
      display: block; 
  }
  
  .nav-dots {
    width: 100%;
    height: 11px;
    display: block;
    position: absolute;
    text-align: center;
      margin-top: 63%;
  }
  
  
  .nav-dots .nav-dot {
    width: 11px;
    height: 11px;
    margin: 0 4px;
    position: relative;
    border-radius: 100%;
    display: inline-block;
    background-color: rgba(0, 0, 0, 0.6);
  }
  
  .nav-dots .nav-dot:hover {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.8);
  }
  
  input#img-1:checked ~ .nav-dots label#img-dot-1,
  input#img-2:checked ~ .nav-dots label#img-dot-2,
  input#img-3:checked ~ .nav-dots label#img-dot-3,
  input#img-4:checked ~ .nav-dots label#img-dot-4,
  input#img-5:checked ~ .nav-dots label#img-dot-5,
  input#img-6:checked ~ .nav-dots label#img-dot-6 {
    background: rgba(0, 0, 0, 0.8);
  }
  @media screen and (max-width: 609px) {
    .slides {
      width: 100%;
    }
  }
  
  .myvideo {
    text-decoration: none;
    color: #fff;
    background: red;
    text-align: center;
    padding: 10px;
    font-weight: 600;
    z-index:100;
    position: absolute;
    bottom: 20px;
  }
  .myvideo:hover {
    color: #000;
  }
  
</style>
@endsection

