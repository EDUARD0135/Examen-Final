@extends('Plantillas.plantilla')

@section('titulo','Listas de Eventos')

@section('contenido')

<h1>Ver Evento</h1>

<table class="table" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Datos</th>
        <th scope="col">Informacion</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Titulo del Evento</th>
            <td>{{ $eventoC->titulo }}</td>
          </tr>
        <tr>
            <th scope="row">Descripción del Evento</th>
            <td>{{ $eventoC->descripción }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha de Inicio</th>
            <td>{{ $eventoC->fecha_inicio}}</td>
        </tr>
        <tr>
            <th scope="row">Fecha Final</th>
            <td>{{ $eventoC->fecha_fin}}</td>
        </tr>
        <tr>
            <th scope="row">ID del Contacto</th>
            <td>{{ $eventoC->contacto_id}}</td>
        </tr>
    </tbody>

  </table>
  <a class="btn btn-primary" href="{{ route('evento.index') }}">Volver</a>
  <br>
  <br>
@endsection