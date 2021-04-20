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
            <h4>Junta Directiva</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Junta Directiva</a></li>
              <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>  Crear Categoria
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

      <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid">
					<thead>
						<tr role="row">
              <th>ID</th>
              <th >Categoria</th>
              <th >Acciones</th>
            </tr>
					</thead>
					<tbody>
          @foreach($categorias as $categoria)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$categoria->id}} </td>
							<td>{{$categoria->categoria}}</td>
							<td>
								<div class="table-actions">
                  <a href="#" onclick="editarCategoria({{$categoria->id}}, '{{$categoria->categoria}}')"><i class="icon-copy dw dw-edit text-success"></i></a>
									<a href="{{route('deleteCategoriaJuntaDirectiva', $categoria->id)}}" ><i class="icon-copy dw dw-delete-3 text-danger"></i></a>
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
      <form class="" action="{{route('saveCategoriaJuntaDirectiva')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="">Categoria</label>
          <input type="text" class="form-control" name="categoria" value="">
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
      <form class="" action="{{route('updateCategoriaJuntaDirectiva')}}" method="post">
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
