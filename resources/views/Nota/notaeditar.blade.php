@extends('Plantillas.plantilla')

@section('titulo','Listas de Eventos')

@section('contenido')

<h1>Editar Nota</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ route('nota.update',['id'=>$nota->id])}}"> 
      
        @csrf
            @method('put')
        
        <br>
    <div class="form-group">
        <label for="texto">Texto</label>
        <input type="text" class="form-control" name="texto"  id="texto" placeholder="Ingrese un nuevo texto del Evento" value="{{$nota->texto}}">
      </div>
      
      <br>

      <div class="form-group">
        <label for="fechaInicio">Fecha de Inicio</label>
        <input type="text" class="form-control" name="fechainicio"  id="fechainicio" placeholder="Ingrese la fecha de Inicio" value="{{$nota->fecha}}">
      </div>
      
      <br>

      <div class="form-group">
        <label for="idusuario">ID del Usuario</label>
        <input type="text" class="form-control" name="idusuario"  id="idusuario" placeholder="Ingrese el Id del Contacto" value="{{$nota->contacto_id}}">
      </div>
      
      <br>

      <button class="btn btn-primary" type="submit">Guardar Nota Editada</button>

      <a class="btn btn-primary" href="{{ route('nota.index') }}">Volver</a>

</form>
<br>
<br>
@endsection