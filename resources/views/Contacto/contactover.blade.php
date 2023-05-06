@extends('Plantillas.plantilla')

@section('titulo','Listas de Contactos')

@section('contenido')

<h1>Ver Contacto</h1>

<table class="table" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Datos</th>
        <th scope="col">Informacion</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Nombre Contacto</th>
            <td>{{ $contactoC->nombre }}</td>
          </tr>
        <tr>
            <th scope="row">Apellido Contacto </th>
            <td>{{ $contactoC->apellido }}</td>
        </tr>
        <tr>
            <th scope="row">Correo Electronico </th>
            <td>{{ $contactoC->correo_electronico }}</td>
        </tr>
        <tr>
            <th scope="row">Telefono</th>
            <td>{{ $contactoC->telefono }}</td>
        </tr>
    </tbody>

  </table>
  <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>
  <br>
  <br>
@endsection