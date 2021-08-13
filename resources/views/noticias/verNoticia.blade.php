@extends('layouts.plantilla')

@section('contenido')

<div class="card">
    <div class="card-header">
        <div class="row col-md-12">
            <div class="col-md-6">
                <h4>Detalle de Noticia</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-danger" href="{{route('deleteNoticia', $noticia->id)}}">
                    <i class="fa fa-trash"></i>  Eliminar Noticia
                  </a>

                  <a class="btn btn-primary" href="{{route('editNoticia', $noticia->id)}}">
                    <i class="fa fa-edit"></i>  Editar
                  </a>
            </div>
        </div>
    </div>
    <div class="card-body">
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

  </div>

@endsection
