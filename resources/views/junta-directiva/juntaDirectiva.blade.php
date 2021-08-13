@extends('layouts.plantilla')

@section('contenido')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="row col-md-12">
            <div class="col-md-6">
                <h4>Junta Directiva</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success" href="{{route('createJuntaDirectiva')}}">
                    <i class="fa fa-plus-circle"></i>  Crear Nuevo Cargo
                  </a>
            </div>
        </div>
    </div>
    <div class="card-body p-3">
      <div class="table-responsive">
        <table class="table table-striped table-md" id="table1">
            <thead>
                <tr role="row">
      <th>ID</th>
      <th >Cargo</th>
      <th >Categoria / Grupo</th>
      <th >Nombre</th>
      <th >Acciones</th>
    </tr>
            </thead>
            <tbody>
  @foreach($directivas as $directiva)
            <tr role="row" class="odd">
                    <td class="table-plus sorting_1" tabindex="0"> {{$directiva->id}} </td>
      <td>{{$directiva->cargo}}</td>
                    <td>{{$directiva->categoria->categoria}}</td>
      <td>{{$directiva->nombre}}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{route('viewCargo', $directiva->id)}}" class="btn btn-info">Ver</a>
                            <a href="{{route('editJuntaDirectiva', $directiva->id)}}" class="btn btn-success">Editar</a>
                            <a href="{{route('deleteJuntaDirectiva', $directiva->id)}}" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
  @endforeach
  </tbody>
    </table>
      </div>
    </div>
  </div>

@endsection


