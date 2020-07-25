@extends('layouts.backend')

@section('content')
<main>
  <div class="container-fluid">
                      <h1 class="mt-4">Peliculas</h1>

                      <div class="card mb-4">
                          <div class="card-header">
                              <i class="fas fa-table mr-1"></i>
                              Editar pelicula
                              @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
                          </div>
                          <div class="card-body">
                            <form action="{{ route('peliculas.update', $pelicula->id) }}" method="post" enctype="multipart/form-data">
                              @method('PATCH')
                              @csrf

                              <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input class="form-control" name="nombre" value="{{ $pelicula->nombre }}" placeholder="Nombre">

                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Categorias</label>
                                <select class="form-control" name="categoria_id">
                                  @foreach ($categorias as $categoria)
                                  <option value="{{ $categoria['id'] }}" @if ($categoria['id'] == $pelicula->categoria_id) selected="selected" @endif>{{ $categoria['nombre'] }}
                                  </option>
                                  @endforeach

                                </select>

                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Imagen</label>
                                <input type="file" class="form-control" name="imagen">

                              </div>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                              <a href="{{ route('peliculas.index')}}"><button type="button" class="btn btn-info">Cancelar</button></a>
                            </form>

                          </div>
                      </div>
                  </div>
</main>
@endsection
