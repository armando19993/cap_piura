@extends('layouts.app0')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Ver Noticia</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Noticias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ver Noticia</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-danger" href="{{route('deleteNoticia', $noticia->id)}}">
              <i class="fa fa-trash"></i>  Eliminar Noticia
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <h1>{{$noticia->titulo}}</h1>
      <h5>{{$noticia->fecha}}</h5>
      <hr>

      {!! $noticia->contenido !!}
      <hr>
      <h3 class="mt-4">Galeria</h3>
      <hr>
      <div class="row">
        @foreach($noticia->imagenes as $imagen)
          <div class="col-md-6 card p-3 mt-3"> <img src="../uploads/noticias/{{$imagen->imagen}}" alt=""> </div>
        @endforeach
      </div>

    </div>
@endsection
