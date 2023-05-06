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
<form  method="POST" action="{{ route('contacto.update',['id'=>$contacto->id])}}">
      
        @csrf
            @method('put')
        
        <br>
    <div class="form-group">
        <label for="descripcion">Nombre</label>
        <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Ingrese El Nombre Del Contacto" value="{{$contacto->nombre}}" >
      </div>
      
      <br>

      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" name="apellido"  id="apellido" placeholder="Ingrese El Apellido Del Contacto" value="{{$contacto->apellido}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="correo">Correo Electronico</label>
        <input type="text" class="form-control" name="correo"  id="correo" placeholder="Ingrese un Correo Electronico" value="{{$contacto->correo_electronico}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" name="telefono"  id="telefono" placeholder="Ingrese un Numero Telefonico" value="{{$contacto->telefono}}">
      </div>
      
      <br>
      
      <button class="btn btn-primary" type="submit">Guardar Contacto Editado</button>

      <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>

</form>
<br>
<br>
@endsection