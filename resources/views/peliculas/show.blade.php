@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
      <h1>Pelicula</h1>
        <img src="{{ asset('/storage/movies/'.$pelicula->imagen) }}" alt="">
        <p><strong>Nombre: </strong>{{ $pelicula->nombre }}</p>
        <p><strong>Categoria: </strong>{{ $pelicula->categoria->nombre }}</p>
        <a href="{{ url('peliculas')}}"><button type="submit" class="btn btn-success float-right">Atras</button></a>
    </div>
</main>
@endsection
