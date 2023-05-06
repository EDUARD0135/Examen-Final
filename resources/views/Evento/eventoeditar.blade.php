@extends('Plantillas.plantilla')

@section('titulo','Listas de Eventos')

@section('contenido')

<h1>Editar Evento</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ route('evento.update',['id'=>$evento->id])}}">
      
        @csrf
            @method('put')
        
        <br>
    <div class="form-group">
        <label for="Titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo"  id="titulo" placeholder="Ingrese el Tirulo del Evento" value="{{$evento->titulo}}" >
      </div>
      
      <br>

      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion"  id="descripcion" placeholder="Ingrese la Descripcion" value="{{$evento->descripción}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="fecha_inicio">Fecha de Inicio</label>
        <input type="text" class="form-control" name="fechainicio"  id="fechainicio" placeholder="Ingrese la fecha de Inicio" value="{{$evento->fecha_inicio}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="fecha_fin">Fecha Final</label>
        <input type="text" class="form-control" name="fechafin"  id="fechafin" placeholder="Ingrese la Fecha Final" value="{{$evento->fecha_fin}}">
      </div>
      
      <br>

      <div class="form-group">
        <label for="contacto_id">ID del Usuario</label>
        <input type="text" class="form-control" name="contactoid"  id="contactoid" placeholder="Ingrese el Id del Contacto" value="{{$evento->contacto_id}}">
      </div>
      
      <br>
      
      <button class="btn btn-primary" type="submit">Guardar Evento Editado</button>

      <a class="btn btn-primary" href="{{ route('evento.index') }}">Volver</a>

</form>
<br>
<br>
@endsection