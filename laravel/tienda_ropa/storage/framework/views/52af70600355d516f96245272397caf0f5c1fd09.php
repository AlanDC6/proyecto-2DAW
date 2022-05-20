

<?php $__env->startSection('contenido_principal'); ?>
<div class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item ">
            <a class="nav-link text-danger" href="<?php echo e(route('comprar')); ?>">REBAJAS</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('comprarRopa')); ?>">Ropa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('comprarCalzado')); ?>">Zapatos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('comprarComplementos')); ?>">Complementos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('comprar')); ?>">Deporte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('comprar')); ?>">Marcas</a>
            </li>
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                  <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Buscar...">
                    <a href="<?php echo e(route('comprar')); ?>" class="search_icon"><i class="fa fa-search"></i></a>
                  </div>
                </div>
              </div>
        </ul>
    </div>
</div>


<div>

  <!----- CARRUSEL ----->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo e(asset('img/pagina_principal/banner/BannerBañadores.jpg')); ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-black">
          <h5>Coleccion de Verano 2022</h5>
          <p>Descubre que prendas estan a la moda para este verano.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo e(asset('img/pagina_principal/banner/sudaderas.jpg')); ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-black">
          <h5>Sudaderas con capucha</h5>
          <p>Compra sudaderas entre la gran variedad de nuestra coleccion.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo e(asset('img/pagina_principal/banner/playeros.png')); ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Playeros deportivos</h5>
          <p>Si te gusta entrenar, esta es tu sección para comprar playeros.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="text-uppercase">Categorias</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="<?php echo e(asset('img/pagina_principal/img_prods/ropa.jpg')); ?>" class="rounded-circle img-fluid">
                <h5 class="text-center mt-3 mb-3">Ropa</h5>
                <p class="text-center"><a href="<?php echo e(route('comprarRopa')); ?>" class="btn btn-success">Comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="<?php echo e(asset('img/pagina_principal/img_prods/zapatos.jpg')); ?>" class="rounded-circle img-fluid">
                <h2 class="h5 text-center mt-3 mb-3">Calzado</h2>
                <p class="text-center"><a href="<?php echo e(route('comprarCalzado')); ?>" class="btn btn-success">Comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="<?php echo e(asset('img/pagina_principal/img_prods/complementos.jpg')); ?>" class="rounded-circle img-fluid">
                <h2 class="h5 text-center mt-3 mb-3">Complementos</h2>
                <p class="text-center"><a href="<?php echo e(route('comprarComplementos')); ?>" class="btn btn-success">Comprar</a></p>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\usuario\OneDrive\Escritorio\git\proyecto-2DAW\laravel\tienda_ropa\resources\views/principal.blade.php ENDPATH**/ ?>