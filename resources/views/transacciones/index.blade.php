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
            <h4>Transacciones</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('home')}}">Transacciones</a></li>
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
              <th >Concepto Pago</th>
                <th >Estado del Pago</th>
                <th >Tipo de Usuario</th>
              <th >Acciones</th>
            </tr>
					</thead>
					<tbody>
          @foreach($pagos as $pago)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$pago->id}} </td>
							<td>{{$pago->pago_concepto}}</td>
							<td>
                                @if($pago->estado == 1)
                                <span class="badge badge-danger">No Pagado</span>
                                @else
                                <span class="badge badge-success">Pagado</span>
                                @endif
                              </td>
                        <td>
                            @if($pago->reg_cap == "")
                                <span class="badge badge-success">No Colegiado</span>
                            @else
                                <span class="badge badge-warning">Colegiado</span>
                            @endif
                        </td>
							<td>
								<div class="table-actions">
                                    <a href="{{route('detalle-transaccion', $pago->id)}}"> <i class="fa fa-eye text-success"></i> </a>
                                    <a href="{{route('editar-pago', $pago->id)}}"> <i class="fa fa-file text-primary"></i> </a>
								</div>
							</td>
						</tr>
          @endforeach
          </tbody>
				</table>

    </div>
@endsection
