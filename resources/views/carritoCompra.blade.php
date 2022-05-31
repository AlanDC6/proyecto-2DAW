@extends('index')

@section('contenido_principal')

<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="display-5 mb-2 text-center">Carrito de la Compra</h3>
                <table id="shoppingCart" class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="width:60%">Producto</th>
                            <th style="width:12%">Precio</th>
                            <th style="width:10%">Cantidad</th>
                            <th style="width:16%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datosCarrito as $producto)


                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-md-3 text-left">
                                        <img src="{{asset($producto->imagen)}}" alt=""
                                            class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                    </div>
                                    <div class="col-md-9 text-left mt-sm-2">
                                        <h4>{{$producto->titulo}}</h4>
                                        <p class="font-weight-light">{{$producto->descripcion}}</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{$producto->precio * $producto->cantidad}} €</td>
                            <form action="{{route('actualizarCantidad', $producto->id)}}" method="POST">
                                <input type="hidden" name="id" value="{{$producto->id}}">
                                <td data-th="Quantity">
                                    <input type="text" name="cantidad{{$producto->id}}"
                                        class="form-control form-control-lg text-center"
                                        value="{{$producto->cantidad}}">
                                </td>
                                <td class="actions" data-th="">
                                    <div class="text-right">
                                        @csrf
                                        <button class="btn btn-outline-dark btn-md mb-2">
                                            <i class="fa-solid fa-rotate"></i>
                                        </button>
                            </form>
                            <form action="{{ route('eliminarProdCarrito')}}" method="GET">
                                @csrf
                                <input type="hidden" name="id_borrar" value="{{$producto->id}}">
                                <button class="btn btn-outline-dark btn-md mb-2">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

            </div>
            </td>
            </tr>

            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    @foreach ($precioTotal as $precioTotal)
    <h1>Total:</h1>
    <h1>{{$precioTotal->total}} €</h1>
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-sm-6 order-md-2 text-right">
            <a href="{{ route('pagar', $precioTotal->total)}}" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">PAGAR</a>
        </div>
        @endforeach
        <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
            <a href="{{ route('comprar')}}">
                <i class="fa-solid fa-arrow-left mr-2"></i> Continuar Comprando</a>
        </div>
    </div>
    </div>
</section>
@endsection