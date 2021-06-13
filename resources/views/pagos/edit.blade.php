@extends('layouts.app')

@section('contenido')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

<form class="" action="{{route('updatePago')}}" method="post">
        @csrf
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Editar Pagos</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('home')}}">Pagos</a></li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>  Editar Pagos
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

        <div class="form-group">
          <label for="">Categoria</label>
          <select name="categoria" class="form-control" id="">
            <option value="">SELECCIONE</option>
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}" @if($categoria->id == $pago->categoria_pago_id) selected @endif>{{$categoria->categoria}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="">Pago</label>
          <input type="text" class="form-control" name="pago" value="{{$pago->pago}}">
          <input type="hidden" class="form-control" name="id" value="{{$pago->id}}">
        </div>

        <div class="form-group">
            <label for="">Monto</label>
            <input type="text" class="form-control" name="monto" value="{{$pago->monto}}">
          </div>

        <div class="form-group">
          <label for="">Concepto</label>
          <textarea name="concepto" id="" class="form-control" cols="30" rows="10">{{$pago->concepto}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary form-control text-white">Guardar</button>

    </div>
</form>
@endsection

