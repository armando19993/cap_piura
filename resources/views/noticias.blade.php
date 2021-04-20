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
            <h4> Noticias</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Noticias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Noticias</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-success" href="{{route('craeateNoticia')}}">
              <i class="fa fa-plus-circle"></i>  Crear Noticia
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

      <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid">
					<thead>
						<tr role="row">
              <th>ID</th>
              <th >Noticia</th>
              {{-- <th >Categoria</th> --}}
              <th >Acciones</th>
            </tr>
					</thead>
					<tbody>
          @foreach($noticias as $noticia)
					<tr role="row" class="odd">
							<td class="table-plus sorting_1" tabindex="0"> {{$noticia->id}} </td>
              <td>{{$noticia->titulo}}</td>
							{{-- <td>{{$noticia->categoria->categoria}}</td> --}}
							<td>
								<div class="table-actions">
                  <a href="{{route('viewNoticia', $noticia->id)}}"><i class="icon-copy dw dw-eye text-primary"></i></a>
									<a href="{{route('deleteNoticia', $noticia->id)}}" ><i class="icon-copy dw dw-delete-3 text-danger"></i></a>
								</div>
							</td>
						</tr>
          @endforeach
          </tbody>
				</table>

    </div>
@endsection
