@extends('index')

@section('contenido_principal')
<div class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">COMPRAVENTA</h1>
            <p class="lead fw-normal text-white-50 mb-0">Interactua con otros usuarios de la aplicacion para encontrar
                lo
                que buscas
            </p>
        </div>
    </div>
</div>

<br>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach ($datosCompraventa as $producto)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset($producto->imagen)}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$producto->nombre_producto}}</h5>

                            {{number_format($producto->precio, 2)}} €
                        </div>
                        <div class="text-center">
                            <form action="{{route('productoCompraventa', $producto->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="id_borrar" value="{{$producto->id}}">
                                <button class="btn btn-outline-dark" type="submit">Ver producto</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
@endsection