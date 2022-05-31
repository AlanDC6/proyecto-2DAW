@extends('index')

@section('contenido_principal')
<div style="height: 42px;"></div>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius"
                                        alt="User-Profile-Image">
                                </div>
                                <h5 class="f-w-600">{{ Auth::user()->name }}</h5>
                                <br>
                                <p>Saldo: {{ Auth::user()->saldo }} €</p>
                                <br>
                                <a class="btn text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Cerrar sesion <i
                                        class="fa-solid fa-right-from-bracket"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Información</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                    </div>
                                    <div class="col-sm-6" id="administrar">
                                        <p class="m-b-10 f-w-600">Administrar</p>
                                        <a href="{{ route('administrar') }}" class="btn text-muted"><i
                                                class="fa-solid fa-screwdriver-wrench"></i></a>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Acciones</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Favoritos</p>
                                        <a href="{{ route('favoritos') }}" class="text-muted f-w-400"><i
                                                class="fa-solid fa-heart"></i></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Carrito de la compra</p>
                                        <a href="{{ route('mostrarProductoCarrito') }}" class="text-muted f-w-400"><i
                                                class="fa-solid fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>


</div>

<div style="height: 50px;"></div>
@endsection