@extends('Plantillas.plantilla')

@section('titulo','Listas de Nota')

@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

<h1><center><u>LISTA DE NOTAS</u></center></h1>
<br>

<div class="container">
    <h5><center>BUSCAR</center></h5>
    <div class="row" ALIGN="center">
      <div class="col-xl-12" ALIGN="center">
        <form action="{{ route('nota.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$NotaBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-success" href="{{ route('nota.index') }}">Volver</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>
  <br>

<table class="table" class="pagination">
    <thead>
       <tr>
        <th class="table-dark" scope="col"><center>ID</center></th>
        <th class="table-dark" scope="col"><center>TEXTO</center></th>
        <th class="table-dark" scope="col"><center>FECHA</center></th>
        <th class="table-dark" scope="col"><center>CONTACTO ID</center></th>
        <th class="table-dark" scope="col">ELIMINAR</th>
        <th class="table-dark" scope="col">EDITAR</th>
        <th class="table-dark" scope="col">VER</th> 
       </tr>
    </thead>

    <tbody>
        @forelse ($notas as $nota)

        <tr>
            <th class="table-dark" scope="row"><center>{{$nota->id}}</center></th>
            <td>{{$nota->texto}}</td>
            <td><center>{{$nota->fecha}}</center></td>
            <td><center>{{$nota->contacto_id}}</center></td> 
             
            <td class="table-danger"><center>
            <form method="POST" action="{{ route('nota.borrar', ['id'=>$nota->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn">
                </form>
             </center></td>

            <td class="table-info"><center><a class="btn btn" href= "{{route('nota.update',['id'=>$nota->id])}}"><u>Editar</u></a></center></td>
            <td class="table-success"><center><a class="btn btn" href= "{{route('nota.show',['id'=>$nota->id])}}"><u>Ver</u></a><center></td>
         </tr>

        @empty
        <tr>
            <td colspam="4">No hay notas</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $notas->render('pagination::bootstrap-4') }}

@endsection