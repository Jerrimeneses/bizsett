@extends('layouts.dashboard')

@section('title', 'Bizsett | Publicaciones')

@section('content')

<div class="text">Publicaciones</div>

   <br>
   <form action="{{route('publicaciones.create')}}">
      <button type="submit" class="btn bg-black border-black btn-outline-info" >Crear</button>
   </form>
   <br>
   <br>

<div class="container-fluid" >

   <div class="scrollmenu" style="border-radius: 10px; height:50ch">

      <table id="idpublicaciones" class="table table-dark table-hover">

         <thead>
            <th>Id</th>
            <th>Descripción</th>
            <th>Emprendimiento</th>
            <th>Contenido</th>
            <th>Acciones</th>
         </thead>

         <tbody>
            @foreach ($publicaciones as $publicacione)

            <?php $emprendimiento = $publicacione['emprendimiento'] ?>
            <tr>
               <td>{{$publicacione['id']}}</td>
               <td>{{$publicacione['descripcion']}}</td>
               <td>{{$emprendimiento['nombre']}}</td>

               <td>
                  <div class="img shadow-lg" style="background-color:rgba(0, 0, 0, 0)">
                     <center>
                        <img style="height:8rem" src="{{ 'http://localhost/api.bizsett/public/storage/multimedia_folder/' . $publicacione['imagen']}}" class="img-fluid" alt="">
                      
                     </center>
                  </div> 
               </td>
               <td>
                  <div class="btn-group">
                     <form action="{{route('publicaciones.edit', $publicacione['id'] )}}">
                        <button type="submit" class="btn bg-black border-black btn-outline-warning mx-1">Editar</button>
                     </form>
                     <form action="{{route('publicaciones.destroy', $publicacione['id'] )}}" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" method="post">
                        @csrf
                        @method('delete')
                           <button type="submit" class="btn bg-black border-black btn-outline-danger" >Eliminar</button>
                     </form>
                  </div>
               </td>
            </tr>

            @endforeach
         </tbody>
         {{-- <tfoot>
            <nav aria-label="Page navigation example">
               <ul class="pagination">
                  <td class="pagination-dark" colspan="4">{{$publicaciones->links()}}</td>
               </ul>
            </nav>
         </tfoot> --}}
      </table>
   </div>
</div>


@endsection