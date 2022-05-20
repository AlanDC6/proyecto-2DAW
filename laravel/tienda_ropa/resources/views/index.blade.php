<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="{{ asset('js/filtros/js.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/filtros/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagina_principal/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('principal') }}">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="{{ route('comprar') }}">Comprar</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="{{ route('comprarHombre') }}">Hombre</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('comprarMujer') }}">Mujer</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Compraventa"><i class="fa-solid fa-handshake-simple"></i></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" data-toggle="tooltip" data-placement="bottom" title="Perfil"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Carro de la compra"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div style="height: 56px;"></div>
        @yield('contenido_principal')
      </main>
      
  
    <footer class="bg-dark text-center text-white " style="position: relative; bottom:0px; width: 100%;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="rounded-circle btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a class="rounded-circle btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a class="rounded-circle btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a class="rounded-circle btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a class="rounded-circle btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
  
        <!-- Github -->
        <a class="rounded-circle btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="text-white" href="#">Alan Diaz Carrera</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>
</html>