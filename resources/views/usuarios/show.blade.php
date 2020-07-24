@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">{{ $user->name }}</h1>
        <h1 class="mt-4">{{ $user->email }}</h1>
        <a href="{{ url('usuarios')}}"><button type="submit" class="btn btn-success float-right">Atras</button></a>
    </div>
</main>
@endsection
