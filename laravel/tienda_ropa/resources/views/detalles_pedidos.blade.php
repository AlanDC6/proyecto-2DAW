@extends('index')

@section('contenido_principal')
<div style="height: 56px;"></div>
<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Detalles de Pago</p>
        <form action="{{ route('guardarDetallesPedido', $precioTotal) }}" method="POST">
            @csrf
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Nombre</p>
                        <input name="nombre" class="form-control mb-3" type="text">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Direccion</p>
                        <input name="direccion" class="form-control mb-3" type="text">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Pais</p>
                        <input name="pais" class="form-control mb-3" type="text">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Ciudad</p>
                        <input name="ciudad" class="form-control mb-3 pt-2 " type="text">
                    </div>
                </div>
                <input type="hidden" name="precio_totad" id="precio_total" value="{{$precioTotal}}">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mb-3">
                        Pagar {{$precioTotal}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div style="height: 56px;"></div>

@endsection