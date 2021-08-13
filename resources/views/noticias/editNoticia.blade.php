@extends('layouts.plantilla')

@section('contenido')


<div class="card">
    <div class="card-header">
        <div class="row col-md-12">
            <div class="col-md-6">
                <h4>Editar Noticia</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="{{route('noticias')}}">
                    Regresar
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">



      <form class="" action="{{route('updateNoticia', $noticia->id)}}" method="post" enctype="multipart/form-data">
        @csrf

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="titulo" value="{{$noticia->titulo}}">
                </div>
                </div>


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoria</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="categoria" required>
                                <option value="">-- SELECCIONE --</option>
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}" @if($categoria->id == $noticia->categoria_id) selected @endif>{{$categoria->categoria}}</option>
                                @endforeach
                              </select>
                        </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagenes</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" name="image[]" class="form-control" id="image" multiple class="form-control">
                            </div>
                            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="">Descripcion</label>
                <textarea  name="contenido" id="editor1" class="form-control ckeditor" rows="10" cols="80">{{$noticia->contenido}}</textarea>
              </div>
            </div>

            <h3 class="mt-4">Galeria</h3>
      <hr>
      <br>
      <div class="col-md-12">

        <table class="table table-striped table-md" id="table1">
            <thead>
                <tr role="row">
      <th >Imagen</th>
      <th >Eliminar</th>
    </tr>
            </thead>
            <tbody>
                @foreach($noticia->imagenes as $imagen)
            <tr role="row" class="odd">
                    <td class="table-plus sorting_1" tabindex="0">   <img src="../uploads/noticias/{{$imagen->imagen}}" alt="" width="200px"> </td>
                    <td>
                        <div class="table-actions">

                            <a href="{{route('deleteImagenNoticia', $imagen->id)}}" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
  </tbody>
    </table>

      </div>

            <div class="col-md-12">
              <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
            </div>
          </div>
          </form>
    </div>

  </div>
@endsection












@section('contenido')
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Editar Noticia</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Noticias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar Noticia</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

            <a class="btn btn-primary" href="{{route('noticias')}}">
                Regresar
            </a>

        </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Titulo</label>

          </div>
        </div>

        <!-- <div class="col-md-6">
          <div class="form-group">
            <label for="">Fecha</label>
            <input type="date" class="form-control" name="fecha" value="{{$noticia->fecha}}">
          </div>
        </div> -->

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" name="categoria">
              <option value="">-- SELECCIONE --</option>
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" @if($categoria->id == $noticia->categoria_id) selected @endif>{{$categoria->categoria}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Descripcion</label>
            <textarea  name="contenido" id="editor1" class="form-control ckeditor" rows="10" cols="80">{{$noticia->contenido}}</textarea>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="">Imagenes</label>
            <input type="file" name="image[]" class="form-control" id="image" multiple class="form-control">
          </div>
        </div>

        <hr>
        <br>



        <div class="col-md-12">
          <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
        </div>
      </div>
      </form>
    </div>
@endsection
