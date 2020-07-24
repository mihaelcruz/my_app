@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Usuarios</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Lista de usuarios

            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <a href="{{ route('usuarios.create')}}"><button type="submit" class="btn btn-success float-right">Agregar usuario</button></a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>E-mail</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                          <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>

                                <form action="{{ route('usuarios.destroy', $user->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <a href="{{ route('usuarios.show', $user->id)}}"><button type="button" class="btn btn-success">Ver</button></a>
                                  <a href="{{ route('usuarios.edit', $user->id)}}"><button type="button" class="btn btn-info">Editar</button></a>
                                  <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
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
