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
                <h4>Bolsa de Trabajo</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="{{route('createTrabajo')}}">
                    <i class="fa fa-plus-circle"></i>  Crear Trabajo
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
                                    <a href="{{route('viewTrabajo', $bolsa->id)}}" class="btn btn-info">Ver</a>
									<a href="{{route('editTrabajo', $bolsa->id)}}" class="btn btn-primary">Editar</a>
									<a href="{{route('deleteTrabajo', $bolsa->id)}}"  class="btn btn-danger">Eliminar</a>
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


@section('scripts')
<script>
    $('#table1').dataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    paging: true,
    searching: true
    }
     );
</script>
@endsection
