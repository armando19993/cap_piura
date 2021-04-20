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
            <h4>Miembros</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Directorio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Miembros</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-success" href="{{route('createMiembro')}}">
              <i class="fa fa-plus-circle"></i>  Crear Nuevo Miembro
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

      <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid">
					<thead>
						<tr role="row">
              <th>ID</th>
              <th >Cargo</th>
              <th >Nombre</th>
              <th >Dependencia</th>
              <th >Acciones</th>
            </tr>
					</thead>
					<tbody>
          @foreach($miembros as $miembro)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$miembro->id}} </td>
              <td>{{$miembro->cargo}}</td>
              <td>{{$miembro->nombre}}</td>
							<td>{{$miembro->dependencia->dependencia}}</td>
							<td>
								<div class="table-actions">
                  <a href="{{route('editMiembro', $miembro->id)}}"><i class="icon-copy dw dw-edit text-success"></i></a>
                  <a href="{{route('viewMiembro', $miembro->id)}}"><i class="icon-copy dw dw-eye text-primary"></i></a>
									<a href="{{route('deleteMiembro', $miembro->id)}}" ><i class="icon-copy dw dw-delete-3 text-danger"></i></a>
								</div>
							</td>
						</tr>
          @endforeach
          </tbody>
				</table>

    </div>
@endsection
