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

        <div class="row" class="text-dark" style="padding-left: 1.2%; padding-right: 1.2%; margin-top: 2%" id="datos_colegiado">
            <form action="{{route('update-pago-emision-factura', $transaccion->id)}}" method="post">
                @csrf
            <div class="col-md-3 bg-secondary text-white p-3">Tipo de Documento Electronico</div>
            <div class="col-md-3 p-3" style="font-weight: 900">
                <select name="tipo_documento" onchange="datos_documento()" id="tipo_documento" class="form-control">
                    <option value="">SELECCIONE</option>
                    <option value="1">FACTURA ELECTRONICA</option>
                    <option value="2">BOLETA DE VENTA ELECTRONICA</option>
                </select>
            </div>

            <div class="col-md-12 p-3" id="datos_factura" style="display: none">
                <div class="form-group">
                    <label for="">Tipo de Documento</label>
                    <input type="text" class="form-control"  disabled value="RUC">
                </div>

                <div class="form-group">
                    <label for="">Numero de Documento</label>
                    <input type="text" class="form-control" name="documento" value="{{$usuario->ruc}}">
                </div>

                <div class="form-group">
                    <label for="">Nombre o Razon Social</label>
                    <input type="text" class="form-control" name="razon_social" value="">
                </div>

                <div class="form-group">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="">
                </div>

                <input type="submit" class="btn btn-primary form-control" value="Generar Documento Electronico">

            </form>
            </div>

            <div class="col-md-12 text-white p-3" id="datos_boleta" style="display: none">
                <div class="form-group">
                    <label for="">Tipo de Documento</label>
                    <input type="text" class="form-control" disabled value="DNI">
                </div>
            </div>
        </div>



    </div>
@endsection



<script>

    function datos_documento(){
        dato = $("#tipo_documento").val();

        if(dato == 1){
            $("#datos_factura").css('display', 'block')
            $("#datos_boleta").css('display', 'none')
        }
        else{
            $("#datos_boleta").css('display', 'block')
            $("#datos_factura").css('display', 'none')
        }
    }

</script>
