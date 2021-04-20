@extends('layouts.app')

@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Informacion del Directorio</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Directorio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Informacion Basica</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="{{route('home')}}">
                Regresar
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <form class="" action="{{route('updateDirectorio', $directorio->id)}}" method="post">
        @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Razon Social</label>
            <input type="text" class="form-control" name="razon_social" value="{{$directorio->razon_social}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">RUC</label>
            <input type="text" class="form-control" name="ruc" value="{{$directorio->ruc}}">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control" name="telefono" value="{{$directorio->telefono}}">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Horario</label>
            <input type="text" class="form-control" name="horario" value="{{$directorio->horario}}">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Direccion</label>
            <input type="text" class="form-control" name="direccion" value="{{$directorio->direccion}}">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">WEB</label>
            <input type="text" class="form-control" name="web" value="{{$directorio->web}}">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Facebook</label>
            <input type="text" class="form-control" name="facebook" value="{{$directorio->facebook}}">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Instagram</label>
            <input type="text" class="form-control" name="instagram" value="{{$directorio->instagram}}">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Youtube</label>
            <input type="text" class="form-control" name="youtube" value="{{$directorio->youtube}}">
          </div>
        </div>

        <div class="col-md-12">
          <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
        </div>
      </div>
      </form>
    </div>
@endsection
