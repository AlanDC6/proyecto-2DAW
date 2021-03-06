@extends('index')

@section('contenido_principal')

<style>
        /* EDITAR */
    .div_editar {
        width: 25%;
        margin-left: 37%;
    }

    .input_imagen > input {
        display: none;
    }

    .editar_imagen {
        position: relative;
        width: 80%;
    }

    #boton_cancelar {
        margin-left: 40%;
    }

    #boton_guardar {
        position: absolute;
        margin-left: 2%;
    }

    #logo {
        width: 120px;
        margin-left: 42%;
        padding-bottom: 2%;
    }

    .btn_header {
        background-color: orange;
    }
</style>

<div class="">
            <h1 class="text-center">{{$producto->titulo}}</h1>
        
        <form id="confirmar" action="{{route('confirmarCambios', $producto->id)}}" method="post" enctype="multipart/form-data">
            @csrf

                <!-- {{-- Input imagen --}} -->
                <div  class="div_editar_img text-center">
                    <div class="input_imagen">
                        <label for="file-input">
                          <img class="editar_imagen img-responsive" src="{{asset($producto->imagen)}}"/>
                        </label>
                        <input onchange="mostrar_nueva_img(this)" id="file-input" type="file" name="nueva_imagen"/>
                      </div><br>
                </div>
                
                <!-- {{-- Input Titulo --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Titulo</span>
                        </div>
                        <input type="text" class="form-control" name="titulo" value="{{$producto->titulo}}">
                        </div>
                    </div><br>
                </div>

                <!-- {{-- Input Descripcion --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Descripcion</span>
                        </div>
                        <input type="text" class="form-control" name="descripcion" value="{{$producto->descripcion}}">
                        </div>
                    </div><br>
                </div>

                <!-- {{-- Input Precio --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Precio</span>
                        </div>
                        <input type="text" class="form-control" name="precio" value="{{$producto->precio}}">
                        <div class="input-group-append">
                        <span class="input-group-text">???</span>
                        </div>
                    </div><br>
                </div>

                <!-- {{-- Input Tipo --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Tipo</span>
                        </div>
                        @switch($producto->tipo)
                        @case('ropa')
                                <select name="tipo" class="form-control" id="tipo">
                                    <option value="ropa">Ropa</option>
                                    <option value="calzado">Calzado</option>
                                    <option value="complementos">Complementos</option>
                                </select>
                                @break
                            @case('calzado')
                            <select name="tipo" class="form-control" id="tipo">
                                <option value="calzado">Calzado</option>
                                    <option value="ropa">Ropa</option>
                                    <option value="complementos">Complementos</option>
                                </select>
                                @break
                            @case('complementos')
                            <select name="tipo" class="form-control" id="tipo">
                                <option value="complementos">Complementos</option>
                                    <option value="ropa">Ropa</option>
                                    <option value="calzado">Calzado</option>
                                </select>
                                @break
                        @endswitch
                            
                    </div><br>
                </div>

                <!-- {{-- Input Categoria Prenda --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Categoria</span>
                        </div>
                        @switch($producto->tipo)
                            @case('ropa')
                                <select name="categoria_prenda" class="form-control" required id="categoria_prenda">
                                    <option value=""></option>
                                    <option value="sudadera con capucha">Sudadera con capucha</option>
                                    <option value="sudadera/jersey">Sudadera/Jersey</option>
                                    <option value="chaqueta">Chaqueta</option>
                                    <option value="camiseta">Camiseta</option>
                                    <option value="pantalones vaqueros">Pantalones vaqueros</option>
                                    <option value="otros pantalones">Otros pantalones</option>
                                    <option value="falda">Falda</option>
                                    <option value="chandal">Chandal</option>
                                </select>
                                @break
                            @case('calzado')
                                <select name="categoria_prenda" class="form-control" required id="categoria_prenda">
                                    <option value=""></option>
                                    <option value="zapato de vestir">Zapato de vestir</option>
                                    <option value="zapato skate">Zapato skate</option>
                                    <option value="playero de deporte">Playero de deporte</option>
                                    <option value="chanclas">Chanclas</option>
                                    <option value="zapatillas">Zapatillas</option>
                                </select>
                                @break
                            @case('complementos')
                                <select name="categoria_prenda" class="form-control" required id="categoria_prenda">
                                    <option value=""></option>
                                    <option value="anillo">Anillo</option>
                                    <option value="collar">Collar</option>
                                    <option value="pulsera">Pulsera</option>
                                    <option value="pendientes">Pendientes</option>
                                    <option value="gorra">Gorra</option>
                                    <option value="gafas de sol">Gafas de sol</option>
                                    <option value="gafas">Gafas</option>
                                    <option value="calcetines">Calcetines</option>
                                </select>
                                @break
                        @endswitch
                        
                    </div><br>
                </div>

                <!-- {{-- Input Marca --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Marca</span>
                        </div>
                        <input type="text" class="form-control" name="marca" value="{{$producto->marca}}">
                    </div><br>
                </div>

                <!-- {{-- Input Genero --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Genero</span>
                        </div>
                        @switch($producto->genero)
                            @case('masculino')
                                <select name="genero" class="form-control" id="genero">
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="unisex">Unisex</option>
                                </select>
                                @break
                            @case('femenino')
                                <select name="genero" class="form-control" id="genero">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="unisex">Unisex</option>
                                </select>
                                @break
                            @case('unisex')
                                <select name="genero" class="form-control" id="genero">
                                    <option value="unisex">Unisex</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                                @break
                        @endswitch
                        
                    </div><br>
                </div>

                <!-- {{-- Input img2 --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Imagen 2</span>
                        </div>
                        <input type="file" class="form-control" name="img2">
                        </div>
                    </div><br>
                </div>

                <!-- {{-- Input img3 --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Imagen 3</span>
                        </div>
                        <input type="file" class="form-control" name="img3">
                        </div>
                    </div><br>
                </div>

                <!-- {{-- Input img4 --}} -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Imagen 4</span>
                        </div>
                        <input type="file" class="form-control" name="img4">
                        </div>
                    </div><br>
                </div>
                            
                <br>
                <div>
                    <a href="{{route('administrar')}}"><input type="button" id="boton_cancelar" class="btn btn-danger" value="Cancelar"></a>
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