@extends('index')

@section('contenido_principal')
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Resgistrarse</h5>

            <form method="POST" action="{{ route('register') }}">
            @csrf

              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="floatingInput" placeholder="Nombre">
                <label for="floatingInput">name</label>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              

              <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="floatingInput" placeholder="Email">
                <label for="floatingInput">Email</label>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password" id="floatingPassword" placeholder="Contraseña">
                <label for="floatingPassword">Contraseña</label>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-floating mb-3">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="floatingPassword" placeholder="Contraseña">
                <label for="floatingPassword">{{ __('Confirmar Contraseña') }}</label>
              </div>
              
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Registrarse</button>
              </div>
              <hr class="my-4">
              <a href="{{ route('login') }}">¿Ya tienes cuenta? Iniciar Sesion</a><br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection