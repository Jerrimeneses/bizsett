@extends('layouts.dashboard')

@section('title', 'Bizsett | Emprendimientos')

@section('content')

<div class="text">Emprendimientos</div>
   <br>
      <form action="{{route('emprendimientos.create')}}">
            <button type="submit" class="btn bg-black border-black btn-outline-info" >Crear</button>
      </form>
   <br>
    <br>

<div class="container-fluid" >

   <div class="scrollmenu" style="border-radius: 10px; height:50ch">

   <table id="idemprendimientos" class="table table-dark table-hover" >

     <thead>
      
         <th>Id</th>
         <th>Nombre</th>
         <th>Descripción</th>
         <th>Categoría</th>
         <th>Teléfono</th>
         <th>Dirección</th>
         <th>Ciudad</th>
         <th>usuario</th>
         <th>Acciones</th>

      </thead>

      <tbody width="100">
         @foreach ($emprendimientos as $emprendimiento)

            <?php 
               $user= $emprendimiento['user'];
               $ciudade= $emprendimiento['ciudade'];
            ?>

            <tr>
               <td>{{$emprendimiento['id']}}</td>
               <td>{{$emprendimiento['nombre']}}</td>
               <td>{{$emprendimiento['descripcion']}}</td>
               <td>{{$emprendimiento['categoria']}}</td>
               <td>{{$emprendimiento['telefono']}}</td>
               <td>{{$emprendimiento['direccion']}}</td>
               <td>{{$ciudade['nombre_ciudad']}}</td>
               <td>{{$user['nombre']}} {{$user['apellidos']}}</td>

               <td>
                  <div class="btn-group">
                     <form action="{{route('emprendimientos.edit', $emprendimiento['id'])}}">
                        <button type="submit" class="btn bg-black border-black btn-outline-warning mx-1">Editar</button>
                     </form>
                     <form action="{{route('emprendimientos.destroy', $emprendimiento['id'])}}" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" method="post">
                        @csrf
                        @method('delete')
                           <button type="submit" class="btn bg-black border-black btn-outline-danger" >Eliminar</button>
                     </form>
                  </div>
               </td>
            </tr>
         @endforeach
      </tbody>

   </table>
   </div>
</div>

@endsection