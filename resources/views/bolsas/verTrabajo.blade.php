@extends('layouts.plantilla')

@section('contenido')

<div class="card">
    <div class="card-header">
        <div class="row col-md-12">
            <div class="col-md-6">
                <h4>Detalle de Trabajo</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info" href="{{route('bolsas')}}">
                    <i class="fa fa-back"></i>  Listado de Trabajos
                  </a>

                <a class="btn btn-primary" href="{{route('editTrabajo', $bolsa->id)}}">
                    <i class="fa fa-edit"></i>  Editar Trabajo
                  </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <h1>{{$bolsa->titulo}}</h1>
        <h5>{{$bolsa->fecha}}</h5>
        <hr>

        {!! $bolsa->descripcion !!}
    </div>

  </div>

@endsection
