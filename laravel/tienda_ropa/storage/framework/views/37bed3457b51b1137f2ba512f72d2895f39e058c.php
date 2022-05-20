

<?php $__env->startSection('contenido_principal'); ?>

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
</style>

<div class="">
        
        <form id="confirmar" action="<?php echo e(route('nuevoProd')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

                <!--  -->
                <div  class="div_editar_img text-center">
                    <div class="input_imagen">
                        <label for="file-input">
                          <img class="editar_imagen img-responsive" src="<?php echo e(asset('img/productos/default.jpg')); ?>"/>
                        </label>
                        <input onchange="mostrar_nueva_img(this)" id="file-input" type="file" name="nueva_imagen"/>
                      </div><br>
                </div>
                
                <!--  -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Titulo</span>
                        </div>
                        <input required type="text" class="form-control" name="titulo">
                        </div>
                    </div><br>
                </div>

                <!--  -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Descripcion</span>
                        </div>
                        <input required type="text" class="form-control" name="descripcion">
                        </div>
                    </div><br>
                </div>

                <!--  -->
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

                <!--  -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Tipo</span>
                        </div>
                        <select required name="tipo" class="form-control" id="tipo">
                            <option value="ropa">Ropa</option>
                            <option value="calzado">Calzado</option>
                            <option value="complementos">Complementos</option>
                        </select>
                    </div><br>
                </div>

                <!--  -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Marca</span>
                        </div>
                        <input required type="text" class="form-control" name="marca">
                        </div>
                    </div><br>
                </div>

                <!--  -->
                <div class="div_editar">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Genero</span>
                        </div>
                        <select required name="genero" class="form-control" id="genero">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="unisex">Unisex</option>
                        </select>
                    </div><br>
                </div>
                            
                <br>
                <div>
                    <a href="<?php echo e(route('administrar')); ?>"><input type="button" id="boton_cancelar" class="btn btn-danger" value="Cancelar"></a>
                    <button id="boton_guardar" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
        <div style="height: 40px;"></div>



    <!-- <script>
        function mostrar_nueva_img(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.editar_imagen').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\usuario\OneDrive\Escritorio\git\proyecto-2DAW\laravel\tienda_ropa\resources\views/administrar/nuevoProd.blade.php ENDPATH**/ ?>