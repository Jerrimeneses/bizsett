@extends('layouts.dashboard')
@section('title', 'Bizsett | Usuarios')
@section('content_header')
@stop

@section('content')

<head>
   {{-- <link rel="stylesheet" href="http://localhost/bizsett/public/css/Cindex.css"> --}}


</head>
<div class="text">Usuarios</div>
   <br>
   
   <form action="{{route('users.create')}}">
      <button type="submit" class="btn bg-black border-black btn-outline-info" >Crear</button>
   </form>
   <br>

<div class="container-fluid">
   <div id="divs" class="scrollmenu" style="border-radius: 10px; height:50ch" >
      <table class="table table-dark table-hover"  id="idusers">
            
         <thead class="">
               <th>Id</th>
               <th>Nombre</th>
               <th>Apellidos</th>
               <th>Correo</th>
               <th>Contraseña</th>
               <th>Tipo de documento</th>
               <th>Número de documento</th>
               <th>Tipo persona</th>
               <th>Acciones</th>
         </thead>

         <tbody>
            @foreach ($users as $user)
            <?php 
               $tipopersona = $user['tipopersona'];
               $tipodocumento = $user['tipodocumento']
               ?>
            <tr>
               <td>{{$user['id']}}</td>
               <td>{{$user['nombre']}}</td>
               <td>{{$user['apellidos']}}</td>
               <td>{{$user['email']}}</td>
               <td>************</td>   
               <td>{{$tipodocumento['nombre']}}</td>
               <td>{{$user['numero_documento']}}</td>
               <td>{{$tipopersona['nombre']}}</td>

               <td>
                  <div class="btn-group">
                     <form action="{{route('users.edit', $user['id'])}}">
                        <button type="submit" class="btn bg-black border-black btn-outline-warning mx-1">Editar</button>
                     </form>
                     <form action="{{route('users.destroy', $user['id'])}}" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" method="post">
                        @csrf
                        @method('delete')
                           <button type="submit" class="btn bg-black border-black btn-outline-danger" >Eliminar</button>
                     </form>
                  </div>
               </td>

            </tr>
            @endforeach
            @if (count($users)<= 0)
                <tr>
                  <td colspan="12">
                     No hay resultados
                  </td>
                </tr>
            @endif
         </tbody>
         {{-- <tfoot>
            <nav aria-label="Page navigation example">
               <ul class="pagination">
                  <td class="pagination-dark" colspan="4">{{$users->links()}}</td>
               </ul>
            </nav>
         </tfoot> --}}
      </table>
   </div> 
</div>


@endsection