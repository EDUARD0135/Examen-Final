@extends('Plantillas.plantilla')
@section('titulo','Listas de Eventos')
@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

<h1><center><u>LISTA DE EVENTOS</u></center></h1> 
<br>

<div class="container">
    <h5><center>BUSCAR</center></h5>
    <div class="row" ALIGN="center">
      <div class="col-xl-12" ALIGN="center">
        <form action="{{ route('evento.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$EventoBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-success" href="{{ route('evento.index') }}">Volver</a>
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
        <th class="table-dark" scope="col"><center>TITULO</center></th>
        <th class="table-dark" scope="col"><center>DESCRIPCION</center></th>
        <th class="table-dark" scope="col"><center>FECHA INICIO</center></th>
        <th class="table-dark" scope="col"><center>FECHA FINAL</center></th>
        <th class="table-dark" scope="col"><center>CONTACTO ID </center></th>
        <th class="table-dark" scope="col"><center>ELIMINAR</center></th>
        <th class="table-dark" scope="col"><center>EDITAR</center></th>
        <th  class="table-dark" scope="col">VER</th> 
       </tr>
    </thead>

    <tbody>
        @forelse ($eventos as $evento)

        <tr>
            <th class="table-dark" scope="row">{{$evento->id}}</th>
            <td><center>{{$evento->titulo}}</center></td>
            <td>{{$evento->descripción}}</td>
            <td><center>{{$evento->fecha_inicio}}</center></td>
            <td><center>{{$evento->fecha_fin}}</center></td>
            <td><center>{{$evento->contacto_id}}</center></td>

            <td class="table-danger"><center>
            <form method="POST" action="{{ route('evento.borrar', ['id'=>$evento->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-">
                </form>
            </center></td>

            <td class="table-info"><center><a class="btn btn" href= "{{route('evento.update',['id'=>$evento->id])}}"><u>Editar</u></a></center></td>
            <td class="table-success"><center><a class="btn btn" href= "{{route('evento.show',['id'=>$evento->id])}}"><u>Ver</u></a><center></td>
        </tr>

        @empty
        <tr>
            <td colspam="4">No hay eventos</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $eventos->render('pagination::bootstrap-4') }}

@endsection
