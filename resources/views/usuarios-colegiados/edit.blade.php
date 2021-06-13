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
            <h4>Ver Deuda</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('home')}}">Inicio</a></li>
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

        <div class="row" class="" style="padding-left: 1.2%; padding-right: 1.2%; margin-top: 2%" id="datos_colegiado">
            <div class="col-md-3 bg-secondary text-white p-3">Apellido Paterno</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->apellido_paterno}} </div>

            <div class="col-md-3 bg-secondary text-white p-3">Apellido Materno</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->apellido_materno}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Nombres</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->nombres}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Registro Cap</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->reg_cap}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">DNI</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->dni}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">RUC</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->ruc}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Fecha de Incorporacion</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->fecha_incorporacion}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Fecha de Generacion de Pago</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$transaccion->fecha}} </div>

            @if($usuario->extranjeria != null)
            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Documento de Extranjeria</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->extranjeria}} </div>

            <div class="col-md-3 text-white p-3 mt-1"></div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> </div>
            @else
            <div class="col-md-12 p-3"></div>
            @endif

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Cambiar Estado:</div>

            <div class="col-md-9 p-3 mt-1" style="font-weight: 900">
                <select name="estado" class="form-control" id="estado" onchange="estado()" @if($transaccion->estado == 2 || $transaccion->estado == 3) disabled @endif>
                    <option value="1" @if($transaccion->estado == 1) selected @endif>SIN PAGAR</option>
                    <option value="2" @if($transaccion->estado == 2) selected  @endif>PAGADO</option>
                    <option value="3" @if($transaccion->estado == 3) selected  @endif>ANULADO</option>
                </select>
             </div>

            <div class="col-md-12 p-3"></div>
            <div class="col-md-12 p-3"></div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Monto:</div>

            <div class="col-md-9 p-3 mt-1" style="font-weight: 900">
                {{$transaccion->monto}}
             </div>

             <div class="col-md-3 bg-secondary text-white p-3 mt-1">Concepto:</div>

            <div class="col-md-9 p-3 mt-1" style="font-weight: 900">
                {{$transaccion->pago_concepto}}
             </div>

             @if($transaccion->estado == 1)
             <div class="col-md-12 p-3">
                 <a href="" class="btn btn-primary form-control text-white">Pagado Presencial</a>
             </div>
             @endif
        </div>



    </div>
@endsection


<div class="modal" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Actualizar Estado del Pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('update-transaccion-panel', $transaccion->id)}}" method="post">
            @csrf
        <div class="modal-body">
          <div class="form-group">
              <label for="">Comentario</label>
              <textarea name="comentario" id="" class="form-control" cols="30" rows="10"></textarea>
              <input type="hidden" name="estado" value="" id="estado_transaccion">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<script>
    function estado(){
        dato = $("#estado").val();

        $("#estado_transaccion").val(dato);
        $("#modal").modal("show");
    }
</script>
