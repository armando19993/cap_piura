@extends('layouts.app')

@section('contenido')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


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

            <a class="btn btn-primary" href="{{route('createTrabajo')}}">
              <i class="fa fa-plus-circle"></i>  Crear Trabajo
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

      <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid">
					<thead>
						<tr role="row">
              <th>ID</th>
              <th >Trabajo</th>
              <th >Fecha</th>
              <th >Estado</th>
              <th >Acciones</th>
            </tr>
					</thead>
					<tbody>
          @foreach($bolsas as $bolsa)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$bolsa->id}} </td>
							<td>{{$bolsa->titulo}}</td>
							<td>{{$bolsa->fecha}}</td>
							<td>
                @if($bolsa->estado == 1) <span class="badge badge-primary">Activo</span> @endif
                @if($bolsa->estado == 2) <span class="badge badge-danger">Inactivo</span> @endif
              </td>
							<td>
								<div class="table-actions">
                  <a href="{{route('viewTrabajo', $bolsa->id)}}" ><i class="icon-copy dw dw-eye text-success"></i></a>
									<a href="{{route('editTrabajo', $bolsa->id)}}" ><i class="icon-copy dw dw-edit2 text-warning"></i></a>
									<a href="{{route('deleteTrabajo', $bolsa->id)}}" ><i class="icon-copy dw dw-delete-3 text-danger"></i></a>
								</div>
							</td>
						</tr>
          @endforeach
          </tbody>
				</table>

    </div>
@endsection
