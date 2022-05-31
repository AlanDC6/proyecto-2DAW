@extends('index')

@section('contenido_principal')
<div class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">COMPRAR</h1>
            <p class="lead fw-normal text-white-50 mb-0">Encuentra lo que buscas entre una gran cantidad de productos
            </p>
        </div>
    </div>
</div>

<br>

<a class="btn btn-primary" id="boton_filtros" data-bs-toggle="collapse" href="#filtros" role="button"
    aria-expanded="false" aria-controls="filtros">
    FILTROS <i class="fa-solid fa-filter"></i>
</a>

<!-- --------FILTROS-------- -->
<div class="collapse" id="filtros">

    <div class="s007">
        <form>
            <div class="inner-form">
                <div class="basic-search">
                    <div class="input-field">
                        <div class="icon-wrap">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <path
                                    d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z">
                                </path>
                            </svg>
                        </div>
                        <input id="search" type="text" placeholder="Buscar..." />
                    </div>
                </div>
                <div class="advance-search">
                    <span class="desc">Busqueda avanzada</span>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="categoria">
                                    <option placeholder="" value="">CATEGORIA</option>
                                    <option>Ropa</option>
                                    <option>Calzado</option>
                                    <option>Complementos</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="color">
                                    <option placeholder="" value="">COLOR</option>
                                    <option>Azul</option>
                                    <option>Verde</option>
                                    <option>Amarillo</option>
                                    <option>Rojo</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="talla">
                                    <option placeholder="" value="">TALLA</option>
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row third">
                        <div class="input-field">
                            <button class="btn-search">Search</button>
                            <button class="btn-delete" id="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    const customSelects = document.querySelectorAll("select");
    const deleteBtn = document.getElementById('delete')
    const choices = new Choices('select', {
        searchEnabled: false,
        removeItemButton: true,
        itemSelectText: '',
    });
    for (let i = 0; i < customSelects.length; i++) {
        customSelects[i].addEventListener('addItem', function(event) {
            if (event.detail.value) {
                let parent = this.parentNode.parentNode
                parent.classList.add('valid')
                parent.classList.remove('invalid')
            } else {
                let parent = this.parentNode.parentNode
                parent.classList.add('invalid')
                parent.classList.remove('valid')
            }
        }, false);
    }
    deleteBtn.addEventListener("click", function(e) {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++) {
            deleteAll[i].click();
        }
    });
    </script>

</div>
<!-- ---------FIN FILTROS-------- -->


<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


            @foreach ($datosProductos as $producto)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset($producto->imagen)}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$producto->titulo}}</h5>
                            <!-- Product price-->
                            {{number_format($producto->precio, 2)}} €
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                href="{{route('mostrarProductoUnico', $producto->id)}}">Ver producto</a></div>
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