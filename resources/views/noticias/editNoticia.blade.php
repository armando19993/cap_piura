@extends('layouts.app')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Editar Noticia</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Noticias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar Noticia</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="{{route('noticias')}}">
                Regresar
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <form class="" action="{{route('updateNoticia', $noticia->id)}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{$noticia->titulo}}">
          </div>
        </div>

        <!-- <div class="col-md-6">
          <div class="form-group">
            <label for="">Fecha</label>
            <input type="date" class="form-control" name="fecha" value="{{$noticia->fecha}}">
          </div>
        </div> -->

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" name="categoria">
              <option value="">-- SELECCIONE --</option>
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" @if($categoria->id == $noticia->categoria_id) selected @endif>{{$categoria->categoria}}</option>
              @endforeach 
            </select>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Descripcion</label>
            <textarea  name="contenido" id="editor1" class="form-control ckeditor" rows="10" cols="80">{{$noticia->contenido}}</textarea>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Imagenes</label>
            <input type="file" name="image[]" class="form-control" id="image" multiple class="form-control">
          </div>
        </div>

        <hr>
      <h3 class="mt-4">Galeria</h3>
      <hr>
      <br>
      <div class="col-md-12">

        <div class="row">
        @foreach($noticia->imagenes as $imagen)
          <div class="col-md-4 card p-3 mt-3"> <img src="../uploads/noticias/{{$imagen->imagen}}" alt=""> </div>
          <div class="col-md-2"> <a href="{{route('deleteImagenNoticia', $imagen->id)}}"><i class="fa fa-trash text-danger" style="font-size: 3em"></i></a></div>
        @endforeach
        </div>
      </div>
        

        <div class="col-md-12">
          <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
        </div>
      </div>
      </form>
    </div>
@endsection
