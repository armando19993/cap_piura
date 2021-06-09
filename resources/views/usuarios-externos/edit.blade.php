@extends('layouts.app')

@section('contenido')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

<form class="" action="{{route('update-usuario-externo-web')}}" method="post">
        @csrf
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Editar Usuario</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('home')}}">Usuario Externo</a></li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">


        <div class="form-group">
          <label for="">DNI</label>
          <input type="text" class="form-control" name="dni" disabled value="{{$usuario->dni}}">
          <input type="hidden" class="form-control" name="id" value="{{$usuario->id}}">
        </div>

        <div class="form-group">
          <label for="">Nombres</label>
          <input type="text" class="form-control" name="nombres"  value="{{$usuario->nombres}}">
        </div>

        <div class="form-group">
          <label for="">Apellido Paterno</label>
          <input type="text" class="form-control" name="apellido_parteno"  value="{{$usuario->apellido_parteno}}">
        </div>

        <div class="form-group">
          <label for="">Apellido Materno</label>
          <input type="text" class="form-control" name="apellido_materno"  value="{{$usuario->apellido_materno}}">
        </div>

        <div class="form-group">
          <label for="">Correo</label>
          <input type="text" class="form-control" name="correo"  value="{{$usuario->correo}}">
        </div>

        <button type="submit" class="btn btn-primary form-control text-white">Guardar</button>

    </div>
</form>
@endsection

