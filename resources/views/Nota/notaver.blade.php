@extends('Plantillas.plantilla')

@section('titulo','Listas de Notas')

@section('contenido')

<h1>Ver Nota</h1>

<table class="table" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Datos</th>
        <th scope="col">Informacion</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Texto de la Nota</th>
            <td>{{ $notaC->texto}}</td>
        </tr>
        <tr>
            <th scope="row">Fecha de Inicio</th>
            <td>{{ $notaC->fecha}}</td>
        </tr>
  
        <tr>
            <th scope="row">ID del Contacto</th>
            <td>{{ $notaC->contacto_id}}</td>
        </tr>
    </tbody>

  </table>
  <a class="btn btn-primary" href="{{ route('nota.index') }}">Volver</a>
  <br>
  <br>
@endsection