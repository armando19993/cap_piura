@extends('layouts.app')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Crear Trabajo</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Basicos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Bolsa de Trabajo</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="{{route('bolsas')}}">
                Regresar
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <form class="" action="{{route('saveNoticia')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Fecha</label>
            <input type="date" class="form-control" name="fecha" value="">
          </div>
        </div>

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

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Descripcion</label>
            <textarea  name="contenido" id="editor1" class="form-control ckeditor" rows="10" cols="80"></textarea>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Imagenes</label>
            <input type="file" name="image[]" class="form-control" id="image" multiple class="form-control">
          </div>
        </div>

        <hr>
        <h2>Galeria Actual</h2>
        <hr>
        
        <div class="col-md-12">
          <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
        </div>
      </div>
      </form>
    </div>
@endsection
