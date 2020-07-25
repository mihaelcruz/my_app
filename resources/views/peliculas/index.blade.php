@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Peliculas</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Lista de peliculas

            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <a href="{{ route('peliculas.create')}}"><button type="submit" class="btn btn-success float-right">Agregar pelicula</button></a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($peliculas as $pelicula)
                          <tr>
                              <td>{{ $pelicula->id }}</td>
                              <td>{{ $pelicula->nombre }}</td>
                              <td>{{ $pelicula->categoria->nombre }}</td>
                              <td>


                                  <a href="{{ route('peliculas.show', $pelicula->id)}}"><button type="button" class="btn btn-success">Ver</button></a>
                                  <a href="{{ route('peliculas.edit', $pelicula->id)}}"><button type="button" class="btn btn-info">Editar</button></a>

                              </td>
                          </tr>
                          @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
