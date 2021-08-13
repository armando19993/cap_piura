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
                <h4>Categorias de Noticias</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle"></i>  Crear Categoria
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
                            <a href="#" onclick="editarCategoria({{$categoria->id}}, '{{$categoria->categoria}}')" class="btn btn-success">Editar</a>
                            <a href="{{route('deleteCategoriaNoticia', $categoria->id)}}" class="btn btn-danger">Eliminar</a>
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
      <form class="" action="{{route('saveCategoriaNoticia')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="">Categoria</label>
          <input type="text" class="form-control" required name="categoria" value="">
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
      <form class="" action="{{route('updateCategoriaNoticia')}}" method="post">
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
