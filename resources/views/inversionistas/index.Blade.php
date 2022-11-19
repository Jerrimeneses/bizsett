@extends('layouts.dashboard')

@section('title', 'Bizsett | Inversiones')

@section('content')

<body>
   <div class="text">Inversiones</div>
   <br>
   <form action="{{route('inversionistas.create')}}">
      <button type="submit" class="btn bg-black border-black btn-outline-info" >¡Invertir!</button>
   </form>
   <br>
   <br>

   <div class="container-fluid" >

      <div class="scrollmenu" style="border-radius: 10px; height:50ch">

   <table id="idinversionistas" class="table table-dark table-hover">

      <thead>

         <th>Id</th>
         <th>Propuesta</th>
         <th>Emprendimiento</th>
         <th>Usuario</th>
         <th>Acciones</th>

      </thead>

      <tbody>
         @foreach ($inversionistas as $inversionista)
        <tr>
         <td>{{$inversionista['id']}}</td>
         <td>{{$inversionista['propuesta']}}</td>
         @foreach($emprendimientos as $emprendimiento)
            @if ($inversionista['emprendimiento_id'] == $emprendimiento['id'])
               <td>{{$emprendimiento['nombre']}}</td>
            @endif
         @endforeach

         @foreach($users as $user)
            @if ($inversionista['user_id'] == $user['id'])
               <td>{{$user['nombre']}} {{$user['apellidos']}}</td>
            @endif
         @endforeach
         
        

         <td>
            <div class="btn-group">
               <form action="{{route('inversionistas.edit', $inversionista['id'])}}">
                  <button type="submit" class="btn bg-black border-black btn-outline-warning mx-1">Editar</button>
               </form>
               <form action="{{route('inversionistas.destroy', $inversionista['id'])}}" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" method="post">
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
               <td class="pagination-dark" colspan="4">{{$inversionistas->links()}}</td>
            </ul>
         </nav>
      </tfoot> --}}
   </table>
   </div>
</div>

@endsection