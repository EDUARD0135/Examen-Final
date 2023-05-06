@extends('Plantillas.plantilla')

@section('titulo','Listas de Contactos')

@section('contenido')

<h1>Crear Contactos</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ isset($contacto_crear) ? route("contacto.update", ["contacto_crear"=> $contacto_crear->id]): route("contacto.guardar") }}">
      
        @csrf
        @if(isset($contacto_crear))
            @method('put')
        @endif
        
        <br>
    <div class="form-group">
        <label for="descripcion">Nombre</label>
        <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Ingrese El Nombre Del Contacto">
      </div>
      
      <br>

      <div class="form-group">
        <label for="precio">Apellido</label>
        <input type="text" class="form-control" name="apellido"  id="apellido" placeholder="Ingrese El Apellido Del Contacto">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="existencia">Correo Electronico</label>
        <input type="text" class="form-control" name="correo"  id="correo" placeholder="Ingrese un Correo Electronico">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="existencia">Telefono</label>
        <input type="text" class="form-control" name="telefono"  id="telefono" placeholder="Ingrese un Numero Telefonico">
      </div>
      
      <br>
      
      <button class="btn btn-primary" type="submit">Registrar Contacto</button>  
      <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>

</form>
<br>
<br>
@endsection
