@extends('layouts.backend')

@section('content')
<main>
  <div class="container-fluid">
                      <h1 class="mt-4">Usuarios</h1>

                      <div class="card mb-4">
                          <div class="card-header">
                              <i class="fas fa-table mr-1"></i>
                              Editar usuarios

                          </div>
                          <div class="card-body">
                            <form action="{{ route('usuarios.update', $user->id) }}" method="post">
                              @method('PATCH')
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Enter email">

                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input class="form-control" name="name" value="{{ $user->name }}" aria-describedby="emailHelp" placeholder="Enter name">

                              </div>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                              <a href="{{ url('usuarios')}}"><button type="submit" class="btn btn-info">Cancelar</button></a>
                            </form>

                          </div>
                      </div>
                  </div>
</main>
@endsection
