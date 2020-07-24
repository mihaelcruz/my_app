@extends('layouts.backend')

@section('content')
<main>
  <div class="container-fluid">
                      <h1 class="mt-4">Usuarios</h1>

                      <div class="card mb-4">
                          <div class="card-header">
                              <i class="fas fa-table mr-1"></i>
                              Nuevo usuarios

                          </div>
                          <div class="card-body">
                            <form action="{{ url('usuarios') }}" method="post">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">

                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name">

                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                              <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-info">Cancelar</button></a>
                            </form>

                          </div>
                      </div>
                  </div>
</main>
@endsection
