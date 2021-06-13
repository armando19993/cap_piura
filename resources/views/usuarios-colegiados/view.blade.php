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
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link active" id="bnt1" aria-current="page" href="{{route('view-colegiado', $usuario->id)}}">Datos del Colegiado</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#GenerarDeuda" onclick="nueva_deuda()" id="btn2">Generar Deuda</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#PagosRealizados" id="bnt3" onclick="pagados()">Pagos Realizados</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#Deudas" id="bnt4" onclick="deudas()">Deudas</a>
        </nav>

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

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Sexo</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->sexo}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Estado Civil</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->estado_civil}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Fecha de Incorporacion</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->fecha_incorporacion}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Fecha de Nacimiento</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->fecha_nacimiento}} </div>
            @if($usuario->extranjeria != null)
            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Documento de Extranjeria</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->extranjeria}} </div>

            <div class="col-md-3 text-white p-3 mt-1"></div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> </div>
            @else
            <div class="col-md-12 p-3"></div>
            @endif


            <div class="col-md-2 bg-secondary text-white p-3">Direccion</div>
            <div class="col-md-4 p-3" style="font-weight: 900"> {{$usuario->direccion}} </div>

            <div class="col-md-2 bg-secondary text-white p-3">Locacion</div>
            <div class="col-md-4 p-3" style="font-weight: 900"> {{$usuario->localidad}} </div>

            <div class="col-md-2 bg-secondary text-white p-3 mt-1">Referencia</div>
            <div class="col-md-10 p-3 mt-1" style="font-weight: 900"> {{$usuario->referencia}} </div>

            <div class="col-md-12 p-3"></div>

            <div class="col-md-3 bg-secondary text-white p-3">Telefonos</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->telefonos}} </div>

            <div class="col-md-3 bg-secondary text-white p-3">Celular</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->celular}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Correo Principal</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->correo}} </div>
            @if($usuario->correo_alternativa != null)
            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Correo Secundario</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->correo_alternativa}} </div>
            @endif
            <div class="col-md-12 p-3"></div>

            <div class="col-md-3 bg-secondary text-white p-3">Modalidad de Trabajo</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->modalidad_trabajo}} </div>
            @if($usuario->modalidad_trabajo == "DEPENDIENTE")
            <div class="col-md-3 bg-secondary text-white p-3">Empresa</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->empresa}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">RUC</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->ruc_empresa}} </div>

            <div class="col-md-3 bg-secondary text-white p-3">Direccion</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->direccion_empresa}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Localidad</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->localidad_empresa}} </div>

            <div class="col-md-3 bg-secondary text-white p-3">Referencia</div>
            <div class="col-md-3 p-3" style="font-weight: 900"> {{$usuario->referencia_empresa}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Telefonos</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->telefonos_empresa}} </div>

            <div class="col-md-3 bg-secondary text-white p-3 mt-1">Celular</div>
            <div class="col-md-3 p-3 mt-1" style="font-weight: 900"> {{$usuario->celular_empresa}} </div>
            @endif
        </div>




        <div class="row col-md-12" class="text-center" style="padding-left: 1.2%; padding-right: 1.2%; margin-top: 2%; display: none; text-align: center;" id="nueva_deuda">
            <h3 class="mb-2">Nuevo Registro de Deuda para el Colegiado <b>{{$usuario->apellido_paterno}} {{$usuario->apellido_matrno}}, {{$usuario->nombres}}</b></h3>
            <form action="{{route('generar-deuda', $usuario->id)}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Seleccione Categoria del Pago</label>
                    <select name="categoria_pago" id="categoria_pago" class="form-control" onchange="buscar_pagos()">
                        <option value="">SELECCIONE</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="">Seleccione el Tipo de Pago</label>
                    <select name="pago" id="pago" class="form-control">
                        <option value="">SELECCIONE</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary form-control mt-3 text-white" value="Generar Deuda">
                </div>
            </form>
            </div>

        </div>



        <div class="row col-md-12" class="text-center" style="padding-left: 1.2%; padding-right: 1.2%; margin-top: 2%; display: none; text-align: center;" id="deudas">
            <h3 class="mb-2">Registro de Deudas</h3>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($deudas as $deuda)


                  <tr>
                    <th scope="row">{{$deuda->id}}</th>
                    <td>S/ {{$deuda->monto}}.00</td>
                    <td>{{$deuda->pago_concepto}}</td>
                    <td>{{$deuda->fecha}}</td>
                    <td>
                        <a href="{{route('edit-deuda', $deuda->id)}}"> <i class="fa fa-edit text-success" style="font-size: 2em;"></i> </a>
                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
        </div>


        <div class="row col-md-12" class="text-center" style="padding-left: 1.2%; padding-right: 1.2%; margin-top: 2%; display: none; text-align: center;" id="pagados">
          <h3 class="mb-2">Registro de Recibos Pagados</h3>

          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Monto</th>
                  <th scope="col">Concepto</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($pagados as $pagado)


                <tr>
                  <th scope="row">{{$pagado->id}}</th>
                  <td>S/ {{$pagado->monto}}.00</td>
                  <td>{{$pagado->pago_concepto}}</td>
                  <td>{{$pagado->fecha}}</td>
                  <td>
                      
                      <a href=""> <i class="fa fa-file text-success" style="font-size: 2em;"></i> </a>
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
      </div>
    </div>
@endsection


<script>
    function nueva_deuda(){
        $("#nueva_deuda").css('display', 'block');
        $("#datos_colegiado").css('display', 'none');
        $("#deudas").css('display', 'none');
        $("#bnt1").removeClass('active');
        $("#bnt3").removeClass('active');
        $("#bnt4").removeClass('active');
        $("#btn2").addClass('active');
    }

    function datos(){
        $("#nueva_deuda").css('display', 'none');
        $("#datos_colegiado").css('display', 'block');
        $("#deudas").css('display', 'none');
        $("#bnt1").addClass('active');
        $("#bnt3").removeClass('active');
        $("#bnt4").removeClass('active');
        $("#btn2").removeClass('active');
    }

    function deudas(){
        $("#nueva_deuda").css('display', 'none');
        $("#datos_colegiado").css('display', 'none');
        $("#deudas").css('display', 'block');
        $("#bnt1").removeClass('active');
        $("#bnt3").removeClass('active');
        $("#bnt4").addClass('active');
        $("#btn2").removeClass('active');
    }

    function pagados(){
        $("#nueva_deuda").css('display', 'none');
        $("#datos_colegiado").css('display', 'none');
        $("#deudas").css('display', 'none');
        $("#pagados").css('display', 'block');
        $("#bnt1").removeClass('active');
        $("#bnt3").addClass('active');
        $("#bnt4").removeClass('active');
        $("#btn2").removeClass('active');
    }

    function buscar_pagos(){
        dato = $("#categoria_pago").val();

        $.ajax({
                type: 'GET',
                url: "/getPagosByCategoria/"+dato,
                success: function(data){
                    $("#pago").html(data);
                }
            });
    }
</script>
