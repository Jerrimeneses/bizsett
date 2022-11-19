@extends('layouts.dashboard')

@section('title', 'Solicitudes de empleo')

@section('content')
<div class="text">Solicitudes de empleo</div>
   <br>
   <form action="{{route('empleos.create')}}">
      <button type="submit" class="btn bg-black border-black btn-outline-info" >Crear</button>
   </form>
   <br>
   <br>

<div class="container-fluid" >

   <div class="scrollmenu" style="border-radius: 10px; height:50ch">
     
   <table id="idbuzons" class="table table-dark table-hover">
      
     <thead>
      
         <th>Id</th>
         <th>Archivo</th>
         <th>Mensaje</th>
         <th>Emprendimiento</th>
         <th>Usuario</th>
         <th>Acciones</th>

      </thead>

      <tbody>
         @foreach ($empleos as $empleo)
         <?php 
            $emprendimiento = $empleo['emprendimiento'];
            $user = $empleo['user']
         ?>
        <tr>
         <td>{{$empleo['id']}}</td>
         <td>
            <embed src="{{'http://localhost/api.bizsett/public/storage/pdf_folder/'.$empleo['evidencia']}}" type="application/pdf" width="100%" height="300px" />
         </td>
         <td>{{$empleo['mensaje_trabajo']}}</td>
         <td>{{$emprendimiento['nombre']}}</td>
         <td>{{$user['nombre']}}</td>

         <td>
         <div class="btn-group">
            <form action="{{route('empleos.edit', $empleo['id'])}}">
               <button type="submit" class="btn bg-black border-black btn-outline-warning mx-1">Editar</button>
            </form>
            <form action="{{route('empleos.destroy', $empleo['id'])}}" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" method="post">
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
               <td class="pagination-dark" colspan="4">{{$empleos->links()}}</td>
            </ul>
         </nav>
      </tfoot> --}}
   </table>
   </div>
</div>

@endsection