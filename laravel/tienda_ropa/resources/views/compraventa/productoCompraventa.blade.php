@extends('index')

@section('contenido_principal')

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img src="{{asset($producto->imagen)}}" class="d-block w-100" alt="...">
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{$producto->nombre_producto}}</h1>
                <div class="fs-5 mb-5">
                    <span>{{number_format($producto->precio, 2)}} €</span>
                </div>
                <p class="lead">{{$producto->descripcion_producto}}</p>
                <p class="lead"><u>Contacto:</u> {{$producto->contacto}}</p>
            </div>
        </div>
    </div>
</section>

@endsection