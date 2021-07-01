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
            <h4>Categoria de Pagos</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('home')}}">Pagos</a></li>
              {{-- <li class="breadcrumb-item active" aria-current="page">Categorias</li> --}}
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>  Crear Pago
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

      <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid">
					<thead>
						<tr role="row">
              <th>ID</th>
              <th >Pago</th>
              <th >Estado</th>
              <th >Acciones</th>
            </tr>
					</thead>
					<tbody>
          @foreach($pagos as $pago)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$pago->id}} </td>
							<td>{{$pago->pago}}</td>
							<td>
                @if($pago->estado == 1)
                <span class="badge badge-success">Activo</span>
                @else
                <span class="badge badge-danger">Inactivo</span>
                @endif
              </td>
							<td>
								<div class="table-actions">
                  <a href="{{route('editar-pago', $pago->id)}}"> <i class="fa fa-edit text-success"></i> </a>
                  @if($pago->estado == 1)
                  <a href="{{route('desactivarPago', $pago->id)}}"> <i class="fa fa-trash text-danger"></i> </a>
                  @else
                  <a href="{{route('activarPago', $pago->id)}}"> <i class="fa fa-check text-success"></i> </a>
                  @endif
								</div>
							</td>
						</tr>
          @endforeach
          </tbody>
				</table>

    </div>
@endsection


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('savePago')}}" method="post">
        @csrf
      <div class="modal-body">
      <div class="form-group">
          <label for="">Categoria</label>
          <select name="categoria" class="form-control" required id="">
            <option value="">SELECCIONE</option>
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="">Pago</label>
          <input type="text" class="form-control" required name="pago" value="">
        </div>

        <div class="form-group">
            <label for="">Monto</label>
            <input type="text" class="form-control" required name="monto" value="">
          </div>

        <div class="form-group">
          <label for="">Concepto</label>
          <textarea name="concepto" id="" required class="form-control" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="">Estado</label>
          <select name="estado" required class="form-control" id="">
            <option value="">SELECCIONE</option>
            <option value="1">ACTIVO</option>
            <option value="2">INACTIVO</option>
          </select>
        </div>

          <div class="form-group">
              <label for="">Exonerable</label>
              <select name="exonerable" required class="form-control" id="">
                  <option value="">SELECCIONE</option>
                  <option value="1">NO</option>
                  <option value="2">SI</option>
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('updateCategoriaPago')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="">Categoria</label>
          <input type="text" class="form-control" id="categoria" name="categoria" value="">
          <input type="hidden" class="form-control" name="id" id="id" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function editarCategoria(id, categoria) {

    $("#id").val(id);
    $("#categoria").val(categoria);

    $("#modalEdit").modal('show');

  }
</script>
