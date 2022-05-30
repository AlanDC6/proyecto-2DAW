@extends('index')

@section('contenido_principal')

<style>
/* EDITAR */
.div_editar {
    width: 25%;
    margin-left: 37%;
}

.input_imagen>input {
    display: none;
}

.editar_imagen {
    position: relative;
    width: 80%;
}
</style>

<div style="height: 20px;"></div>
<div class="">

    <form id="confirmar" action="{{ route('nuevoProdCompraventa') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- {{-- Input imagen --}} -->
        <div class="div_editar_img text-center">
            <div class="input_imagen">
                <label for="file-input">
                    <img class="editar_imagen img-responsive" src="{{asset('img/compraventa/default.jpg')}}" />
                </label>
                <input onchange="mostrar_nueva_img(this)" id="file-input" type="file" name="nueva_imagen" />
            </div><br>
        </div>

        <!-- {{-- Input Titulo --}} -->
        <div class="div_editar">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Nombre del producto</span>
                </div>
                <input required type="text" class="form-control" name="nombre_producto">
            </div>
        </div><br>
</div>

<!-- {{-- Input Descripcion --}} -->
<div class="div_editar">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Descripcion</span>
        </div>
        <input required type="text" class="form-control" name="descripcion_producto">
    </div>
</div><br>
</div>

<!-- {{-- Input Precio --}} -->
<div class="div_editar">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Precio</span>
        </div>
        <input required type="text" class="form-control" name="precio">
        <div class="input-group-append">
            <span class="input-group-text">€</span>
        </div>
    </div><br>
</div>

<!-- {{-- Input Metodo Contacto --}} -->
<div class="div_editar">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Contacto</span>
        </div>
        <input required type="text" class="form-control" name="contacto">
    </div>
</div><br>
</div>

<br>
<div class="text-center">
    <a href="{{route('compraventa_administrar')}}"><input type="button" id="boton_cancelar" class="btn btn-danger"
            value="Cancelar"></a>
    <button id="boton_guardar" class="btn btn-info">Guardar</button>
</div>
</form>
</div>
<div style="height: 40px;"></div>



<script>
function mostrar_nueva_img(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.editar_imagen').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>

@endsection