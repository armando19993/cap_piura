@extends('layouts.plantilla')

@section('contenido')


<div class="card">
    <div class="card-header">
        <div class="row col-md-12">
            <div class="col-md-6">
                <h4>Crear Noticia</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="{{route('bolsas')}}">
                    Regresar
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">



        <form class="" action="{{route('saveNoticia')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="titulo" value="" required>
                </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fecha</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="fecha" value="" required>
                    </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoria</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="categoria" required>
                                <option value="">-- SELECCIONE --</option>
                                @foreach($categorias as $categoria)
                                  <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
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
                <textarea  name="contenido" id="editor1" class="form-control ckeditor" rows="10" cols="80"></textarea>
              </div>
            </div>

            <div class="col-md-12">
              <input type="submit" name="" class="btn btn-primary text-white form-control" value="Guardar">
            </div>
          </div>
          </form>
    </div>

  </div>
@endsection


