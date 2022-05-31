@extends('index')

@section('contenido_principal')

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" style="background-color: black;" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" style="background-color: black;" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" style="background-color: black;" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset($producto->img2)}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset($producto->img3)}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset($producto->img4)}}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                        <i class="fa-solid fa-chevron-left text-black"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <!-- <span class="carousel-control-next-icon " aria-hidden="true"></span> -->
                        <i class="fa-solid fa-chevron-right text-black"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{$producto->titulo}}</h1>
                <div class="fs-5 mb-5">
                    <span>{{number_format($producto->precio, 2)}} €</span>
                </div>
                <p class="lead">{{$producto->descripcion}}</p>
                <div class="d-flex">
                    <form action="{{ route('guardarProductoCarrito') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_producto" value="{{$producto->id}}">
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">Añadir al carrito</button>
                    </form>

                    <form action="{{ route('añadirFavorito') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_producto" value="{{$producto->id}}">
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit"><i
                                class="fa-solid fa-heart"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection