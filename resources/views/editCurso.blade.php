@extends('layouts.app0')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Crear Curso</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('cursos')}}">Cursos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Nuevo Curso</li>
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
      <form class="" action="{{route('updateCurso', $curso->id)}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" name="categoria">
              <option value="">-- SELECCIONE --</option>
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" @if($categoria->id == $curso->categoria_id) selected @endif>{{$categoria->categoria}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{$curso->titulo}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" value="{{$curso->fecha_inicio}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Hora</label>
            <input type="text" class="form-control" name="hora" value="{{$curso->hora}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Modalidad</label>
            <select name="tipo" id="" class="form-control">
              <option value="">SELECCIONE</option>
              <option value="1" @if($curso->tipo == 1) selected @endif>Virtual</option>
              <option value="2" @if($curso->tipo == 2) selected @endif>Presencial</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Costo</label>
            <input type="text" class="form-control" name="costo" value="{{$curso->costo}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Ubicacion</label>
            <input type="text" class="form-control" name="ubicacion" value="{{$curso->ubicacion}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Cupos Disponibles</label>
            <input type="number" class="form-control" name="cupos" value="{{$curso->cupos}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Whatsapp</label>
            <input type="number" class="form-control" name="whatsapp" value="{{$curso->whatsapp}}">
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="image" class="form-control" id="image" class="form-control">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Descripcion</label>
            <textarea  name="descripcion" id="editor1" class="form-control ckeditor" rows="10" cols="80">{{$curso->descripcion}}</textarea>
          </div>
        </div>

        <div class="col-md-12">
          <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
        </div>
      </div>
      </form>
    </div>
@endsection
