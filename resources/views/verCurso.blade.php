@extends('layouts.app0')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Bolsa de Trabajo</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Basicos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Bolsa de Trabajo</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-success" href="{{route('editCurso', $curso->id)}}">
              <i class="fa fa-edit"></i>  Editar Curso
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <div class="row">
        <div class="col-md-12"><img src="../uploads/fotos/{{$curso->foto}}" width="100%" alt=""></div>
        <div class="col-md-10"><h1>{{$curso->titulo}}</h1></div>
        <div class="col-md-2 text-center">
          <h2>{{$curso->cupos_count}} / {{$curso->cupos}}</h2>
        </div>
        <div class="col-md-4 mt-3"> <strong>Fecha Inicio:</strong>   {{$curso->fecha_inicio}}</div>
        <div class="col-md-4 mt-3"> <strong>Hora:</strong>   {{$curso->hora}} </div>
        <div class="col-md-4 mt-3">

          @if ($curso->tipo == 1)
              <div class="btn btn-success form-control text-white">Virtual</div>
          @endif

          @if ($curso->tipo == 2)
              <div class="btn btn-danger form-control text-white">Prescencial</div>
          @endif

        </div>
        <div class="col-md-4 mt-3"> <strong>Costo:</strong>   S/ {{$curso->costo}} </div>
        <div class="col-md-4 mt-3"> <strong>Ubicacion:</strong>   {{$curso->ubicacion}} </div>
        <div class="col-md-4 mt-3"> <strong>Whatsapp:</strong>   {{$curso->whatsapp}} </div>
        <div class="col-md-12 mt-3"> <strong>Descripcion:</strong> <br>   {!!$curso->descripcion!!} </div>

        <div class="table mt-5 text-center">
          <h3>Inscritos</h3>
          <table class="table mt-3">
            <thead>
              <tr>
                <td>DNI</td>
                <td>Nombre</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($inscritos as $inscrito)
                <tr>
                  <td>{{$inscrito->dni_usuario}}</td>
                  <td>{{$inscrito->nombre}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection
