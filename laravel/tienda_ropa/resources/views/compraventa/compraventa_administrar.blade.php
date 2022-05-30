@extends('index')

@section('contenido_principal')
<style>
.imagen {
    width: 50%;
}

#imagen-td {
    width: 20%;
}

#opciones {
    padding: 2%;
    margin-left: 2%;
}
</style>

<div style="height: 20px;"></div>

<div id="opciones">
    <a href="{{ route('menuNuevoCompraventa') }}" class="btn btn-success">Añadir <i class="fa-solid fa-plus"></i></a>
</div>

<table class="table table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Titulo</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datosCompraventa as $producto)
        <tr>
            <td id="imagen-td"><img class="card-img-top imagen" src="{{asset($producto->imagen)}}" alt="..." /></td>
            <td>{{$producto->nombre_producto}}</td>
            <td>{{$producto->precio}}</td>
            <td>
                <form action="{{route('borrarCompraventa', $producto->id)}}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Borrar <i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection