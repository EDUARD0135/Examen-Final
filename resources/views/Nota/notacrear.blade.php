@extends('Plantillas.plantilla')

@section('titulo','Listas de Eventos')

@section('contenido')

<h1>Crear Nota</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ isset($nota_crear) ? route("nota.update", ["nota_crear"=> $nota_crear->id]): route("nota.guardar") }}">
      
        @csrf
        @if(isset($contacto_crear))
            @method('put')
        @endif
        
        <br>
    <div class="form-group">
        <label for="texto">Texto</label>
        <input type="text" class="form-control" name="texto"  id="texto" placeholder="Ingrese un nuevo texto del Evento">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="fechaInicio">Fecha de Inicio</label>
        <input type="text" class="form-control" name="fechainicio"  id="fechainicio" placeholder="Ingrese la fecha de Inicio">
      </div>
      
      <br>

      <div class="form-group">
        <label for="idusuario">ID del Usuario</label>
        <input type="text" class="form-control" name="idusuario"  id="idusuario" placeholder="Ingrese el Id del Contacto">
      </div>
      
      <br>
      
      <button class="btn btn-primary" type="submit">Registrar Nota</button>

      <a class="btn btn-primary" href="{{ route('nota.index') }}">Volver</a>

</form>
<br>
<br>
@endsection