@extends('layouts.app')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Crear Cargo - Junta Directiva</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Junta Directiva</a></li>
              <li class="breadcrumb-item active" aria-current="page">Nuevo Cargo</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="{{route('juntaDirectiva')}}">
                Regresar
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <form class="" action="{{route('saveJuntaDirectiva')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" name="categoria">
              <option value="">-- SELECCIONE --</option>
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">CIP</label>
            <input type="text" class="form-control" name="cip" value="">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Cargo</label>
            <input type="text" class="form-control" name="cargo" value="">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Correo</label>
            <input type="text" class="form-control" name="correo" value="">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control" name="telefono" value="">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Hoja de Vida</label>
            <input type="file" name="hoja" class="form-control" id="hoja" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="image" class="form-control" id="image" class="form-control">
          </div>
        </div>

        <div class="col-md-12">
          <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
        </div>
      </div>
      </form>
    </div>
@endsection
