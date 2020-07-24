@extends('layouts.backend')

@section('content')
<main>
  <div class="container-fluid">
                      <h1 class="mt-4">Peliculas</h1>

                      <div class="card mb-4">
                          <div class="card-header">
                              <i class="fas fa-table mr-1"></i>
                              Nuevo pelicula

                          </div>
                          <div class="card-body">
                            <form action="{{ url('peliculas') }}" method="post">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input class="form-control" name="nombre" placeholder="Nombre">

                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Categorias</label>
                                <select class="form-control" name="categoria_id">
                                  @foreach ($categorias as $categoria)
                                  <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}
                                  </option>
                                  @endforeach
                                </select>

                              </div>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                              <a href="{{ route('peliculas.index')}}"><button type="button" class="btn btn-info">Cancelar</button></a>
                            </form>

                          </div>
                      </div>
                  </div>
</main>
@endsection
