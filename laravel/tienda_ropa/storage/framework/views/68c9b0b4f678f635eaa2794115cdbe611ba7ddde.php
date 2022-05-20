<?php $__env->startSection('contenido_principal'); ?>
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
                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                    </div>
                    <h5 class="f-w-600"><?php echo e(Auth::user()->name); ?></h5>
                    <a href="#" style="color: white"><i class="fa-solid fa-pen-to-square"></i></a>
                    <br>    
                    <a class="btn text-white" href="<?php echo e(route('logout')); ?>"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Cerrar sesion  <i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
            </div>
            <div class="col-sm-8">  
                <div class="card-block">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Información</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Email</p>
                            <h6 class="text-muted f-w-400"><?php echo e(Auth::user()->email); ?></h6>
                        </div>
                        <div class="col-sm-6" id="administrar">
                            <p class="m-b-10 f-w-600">Administrar</p>
                            <a href="<?php echo e(route('administrar')); ?>" class="btn text-muted"><i class="fa-solid fa-screwdriver-wrench"></i></a>
                        </div>
                    </div>
                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Acciones</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Favoritos</p>
                            <a href="#" class="text-muted f-w-400"><i class="fa-solid fa-heart"></i></a>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Carrito de la compra</p>
                            <a href="#" class="text-muted f-w-400"><i class="fa-solid fa-cart-shopping"></i></a>
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

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>


</div>

<div style="height: 50px;"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\usuario\OneDrive\Escritorio\git\proyecto-2DAW\laravel\tienda_ropa\resources\views/home.blade.php ENDPATH**/ ?>