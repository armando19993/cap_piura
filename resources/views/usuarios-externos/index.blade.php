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
            <h4>Usuarios Externos</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('home')}}">Usuarios</a></li>
              {{-- <li class="breadcrumb-item active" aria-current="page">Categorias</li> --}}
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <!-- <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>  Crear Pago
            </a> -->

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

      <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid">
					<thead>
						<tr role="row">
              <th>ID</th>
              <th>Dni</th>
              <th >Usuario</th>
              <th >Estado</th>
              <th >Correo</th>
              <th >Acciones</th>
            </tr>
					</thead>
					<tbody>
          @foreach($usuarios as $usuario)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$usuario->id}} </td>
							<td>{{$usuario->dni}}</td>
							<td>{{$usuario->nombres}} {{$usuario->apellido_parteno}}</td>
							<td>
                @if($usuario->estado == 1)
                <span class="badge badge-success">Activo</span>
                @else
                <span class="badge badge-danger">Inactivo</span>
                @endif
              </td>
              <td>{{$usuario->correo}}</td>
							<td>
								<div class="table-actions">
                  <a href="{{route('editar-usuario-externo', $usuario->id)}}"> <i class="fa fa-edit text-success"></i> </a>
                  @if($usuario->estado == 1)
                  <a href="{{route('desactivar-usuario-externo', $usuario->id)}}"> <i class="fa fa-trash text-danger"></i> </a>
                  @else
                  <a href="{{route('activar-usuario-externo', $usuario->id)}}"> <i class="fa fa-check text-success"></i> </a>
                  @endif
								</div>
							</td>
						</tr>
          @endforeach
          </tbody>
				</table>

    </div>
@endsection
