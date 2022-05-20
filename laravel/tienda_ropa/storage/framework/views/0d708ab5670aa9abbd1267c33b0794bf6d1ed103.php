

<?php $__env->startSection('contenido_principal'); ?>
<style>
    .imagen {
        width: 50%;
    }

    #imagen-td {
        width: 20%;
    }

    #opciones {
        padding: 2%;
        margin-left: 2%;
    }
</style>

<div style="height: 20px;"></div>

<div id="opciones">
    <a href="#" class="btn btn-success">Añadir  <i class="fa-solid fa-plus"></i></a>
</div>

<table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Titulo</th>
      <th scope="col">Precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $datosProductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($producto->id); ?></th>
            <td id="imagen-td"><img class="card-img-top imagen" src="<?php echo e(asset('storage/'.$producto->imagen)); ?>" alt="..."/></td>
            <td><?php echo e($producto->titulo); ?></td>
            <td><?php echo e($producto->precio); ?></td>
            <td>
                <form action="<?php echo e(route('menuEditar', $producto->id)); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <button class="btn btn-primary">Editar  <i class="fa-solid fa-pen-to-square"></i></button>
                </form>

                <form action="<?php echo e(route('borrar', $producto->id)); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <button class="btn btn-danger">Borrar  <i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\usuario\OneDrive\Escritorio\git\proyecto-2DAW\laravel\tienda_ropa\resources\views//administrar/administrar.blade.php ENDPATH**/ ?>