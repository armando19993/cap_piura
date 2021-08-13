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

        </div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr role="row">
                        <th>Reg Cap</th>
                        <th>Nombre</th>
                        <th >Fecha Vigencia</th>
                        <th >PDF</th>
                        <th >Validar</th>
                        </tr>
					</thead>
					<tbody id="resultado">
                        @foreach($certificados as $certi)
                            <tr role="row">
                            <th>{{$certi->reg_cap}}</th>
                            <th>{{$certi->nombres_apellidos}}</th>
                            <th >{{$certi->vigencia_fecha}}</th>
                            <th class="text-center"> <a href="/pdf/{{$certi->pdf}}" target="_blank"><i class="fa fa-file text-success"></i></a> </th>
                            <th class="text-center"><a href="">Validar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
				</table>

    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
