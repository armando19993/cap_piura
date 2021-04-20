@extends('layouts.app0')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Crear Miembro</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Directorio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Nuevo Miembro</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="{{route('miembrosDirectorio')}}">
                Regresar
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <form class="" action="{{route('updateMiembro', $miembro->id)}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Dependencia</label>
            <select class="form-control" name="dependencia" disabled>
              <option value="">-- SELECCIONE --</option>
              @foreach($dependencias as $dependencia)
                <option value="{{$dependencia->id}}" @if($dependencia->id == $miembro->id) selected @endif>{{$dependencia->dependencia}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" disabled name="nombre" value="{{$miembro->nombre}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Cargo</label>
            <input type="text" class="form-control" disabled name="cargo" value="{{$miembro->cargo}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control" disabled name="telefono" value="{{$miembro->telefono}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Correo</label>
            <input type="text" class="form-control" disabled name="correo" value="{{$miembro->correo}}">
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
            <label for="">Foto</label>
            <img src="../uploads/fotos/{{$miembro->foto}}" alt="">

          </div>
        </div>

        <div class="col-md-12">
          <a href="{{route('editMiembro', $miembro->id)}}" class="btn btn-primary form-control">Editar</a>
        </div>
      </div>
      </form>
    </div>
@endsection
