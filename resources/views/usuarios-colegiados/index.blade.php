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
            <h4>Usuarios Colegiados</h4>
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
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Buscar Por Reg CAP</label>
                    <input type="text" id="reg_cap" onkeypress="buscar_dni()" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Buscar Por DNI</label>
                    <input type="text" id="dni" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Buscar Por Estado</label>
                    <select name="" class="form-control" id="estado">
                        <option value="">SELECCIONE</option>
                        <option value="todas">TODAS</option>
                        <option value="1">ACTIVOS</option>
                        <option value="0">INACTIVOS</option>
                    </select>
                </div>
            </div>
        </div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr role="row">
                        <th>ID</th>
                        <th>Reg Cap</th>
                        <th >Usuario</th>
                        <th >Estado</th>
                        <th >Acciones</th>
                        </tr>
					</thead>
					<tbody id="resultado">
          @foreach($usuarios as $usuario)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$usuario->id}} </td>
							<td>{{$usuario->reg_cap}}</td>
							<td style="font-weight: 900">{{$usuario->apellido_paterno}} {{$usuario->apellido_materno}} , {{$usuario->nombres}}</td>
							<td>
                @if($usuario->estado == 1)
                <span class="badge badge-success">Activo</span>
                @else
                <span class="badge badge-danger">Inactivo</span>
                @endif
              </td>
							<td>
								<div class="table-actions">
                  <a href="{{route('view-colegiado', $usuario->id)}}"> <i class="fa fa-eye text-success"></i> </a>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );

function buscar_dni(){

}
</script>
