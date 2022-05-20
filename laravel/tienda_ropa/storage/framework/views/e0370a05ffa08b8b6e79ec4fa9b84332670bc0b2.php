

<?php $__env->startSection('contenido_principal'); ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Iniciar Sesión</h5>
            <form action="#">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
                <label for="floatingPassword">Contraseña</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Recordar contraseña
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Iniciar Sesion</button>
              </div>
              <hr class="my-4">
              <a href="#">¿Todavia no tienes cuenta? Registrarse</a><br>
              <a href="#">¿Has olvidado la contraseña?</a>
              <hr class="my-4">
              <div class="d-grid mb-2">
                <button class="btn btn-danger text-uppercase fw-bold" type="submit">
                  <i class="fa-brands fa-google me-2"></i> Iniciar sesion con Google
                </button>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary text-uppercase fw-bold" type="submit">
                  <i class="fa-brands fa-facebook-f me-2"></i> Iniciar sesion con Facebook
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\usuario\OneDrive\Escritorio\git\proyecto-2DAW\laravel\tienda_ropa\resources\views/login.blade.php ENDPATH**/ ?>