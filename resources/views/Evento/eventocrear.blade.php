@extends('Plantillas.plantilla')

@section('titulo','Listas de Eventos')

@section('contenido')

<h1>Crear Evento</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<form  method="POST" action="{{ isset($evento_crear) ? route("evento.update", ["evento_crear"=> $evento_crear->id]): route("evento.guardar") }}">
      
        @csrf
        @if(isset($contacto_crear))
            @method('put')
        @endif 
        
        <br>
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo"  id="titulo" placeholder="Ingrese el Titulo del Evento">
      </div>
      
      <br>

      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion"  id="descripcion" placeholder="Ingrese la Descripcion">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="fechainicio">Fecha de Inicio</label>
        <input type="text" class="form-control" name="fechainicio"  id="fechainicio" placeholder="Ingrese la fecha de Inicio">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="fechafin">Fecha Final</label>
        <input type="text" class="form-control" name="fechafin"  id="fechafin" placeholder="Ingrese la Fecha Final">
      </div>
      
      <br>

      <div class="form-group">
        <label for="contactoid">ID del Usuario</label>
        <input type="text" class="form-control" name="contactoid"  id="contactoid" placeholder="Ingrese el Id del Contacto">
      </div>
      
      <br>
      
      <button class="btn btn-primary" type="submit">Registrar Evento</button>

      <a class="btn btn-primary" href="{{ route('evento.index') }}">Volver</a>

</form>
<br>
<br>
@endsection

