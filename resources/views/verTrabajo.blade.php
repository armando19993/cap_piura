@extends('layouts.app0')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Ver Trabajo</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Basicos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Bolsa de Trabajo</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="{{route('editTrabajo', $bolsa->id)}}">
              <i class="fa fa-edit"></i>  Editar Trabajo
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <h1>{{$bolsa->titulo}}</h1>
      <h5>{{$bolsa->fecha}}</h5>
      <hr>

      {!! $bolsa->descripcion !!}
    </div>
@endsection
