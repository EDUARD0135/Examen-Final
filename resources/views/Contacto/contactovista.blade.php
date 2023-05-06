@extends('Plantillas.plantilla')

@section('titulo','Listas de Contactos')

@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

<h1><center><u>LISTA DE CONTACTOS</u></center></h1>
<br>

<div class="container">
    <h5><center>BUSCAR</center></h5>
    <div class="row" ALIGN="center">
      <div class="col-xl-12" ALIGN="center">
        <form action="{{ route('contacto.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$ContactoBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-success" href="{{ route('contacto.index') }}">Volver</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>
  <br>

<table class="table table-bordered" class="table" class="pagination">
    <thead>
       <tr>
        <th class="table-dark" scope="col"><center>ID</center></th>
        <th class="table-dark" scope="col"><center>NOMBRE</center></th>
        <th class="table-dark" scope="col"><center>APELLIDO</center></th>
        <th class="table-dark" scope="col"><center>CORREO ELECTRONICO</center></th>
        <th class="table-dark" scope="col"><center>TELEFONO</center></th>
        <th class="table-dark" scope="col"><center>ELIMINAR</center></th>
        <th class="table-dark" scope="col"><center>EDITAR</center></th>
        <th  class="table-dark" scope="col"><center>VER</center></th>
       </tr>
    </thead>

    <tbody>
        @forelse ($contactos as $contacto)

        <tr>
            <th class="table-dark" scope="row"><center>{{$contacto->id}}</center></th>
            <td><center>{{$contacto->nombre}}</center></td>
            <td><center>{{$contacto->apellido}}</center></td>
            <td><center>{{$contacto->correo_electronico}}</center></td>
            <td><center>{{$contacto->telefono}}</center></td>
           
            <td class="table-danger"><center>
            <form method="POST" action="{{ route('contacto.borrar', ['id'=>$contacto->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-">
                </form>
            </td></center>

            <td class="table-info"><center><a class="btn btn" href= "{{route('contacto.update',['id'=>$contacto->id])}}"><u>Editar</u></a></center></td>
            <td class="table-success"><center><a class="btn btn" href= "{{route('contacto.show',['id'=>$contacto->id])}}"><u>Ver</u></a><center></td>
        </tr>
        @empty
        <tr>
            <td colspam="4">No hay Contactos</td>
        </tr>
        @endforelse
    </tbody>
</table>
<br>

{{ $contactos->render('pagination::bootstrap-4') }}

@endsection