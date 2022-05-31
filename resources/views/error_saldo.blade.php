@extends('index')

@section('contenido_principal')
<div style="height: 100px;"></div>
<div class="container">
    <h1 class="text-center">ERROR EN EL PEDEIDO</h1>

    <h2 class="text-center">SALDO INSUFICIENTE :(</h2>

    <a href="{{ route('principal') }}" class="btn btn-primary">VOLVER AL INICIO</a>
</div>
<div style="height: 100px;"></div>
@endsection