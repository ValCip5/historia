<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Historia</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('app.css') }}">
        <link rel="icon" href="{{ asset('img/favicon.png') }}">
    </head>
    <body>
        <header>
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?= url('/');?>"><img src="{{ URL::to('img/logo.png') }}" alt="Logo Historia"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= url('/');?>">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?= url('/nosotros');?>">Nosotros</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?= url('/membresia');?>">Membresía</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                    <a class="nav-link" href="<?= url('usuarios/'. Auth::user()->id);?>">Perfil</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                    <a class="nav-link" href="<?= url('usuarios/'. Auth::user()->id . '/historias');?>">Tus historias</a>
                    </li>
                @endif
                @if (!Auth::check())
                    <li class="nav-item">
                    <a class="nav-link" href="<?= url('iniciarsesion');?>">Acceder</a>
                    </li>
                @else
                    <li class="nav-item">
                    <a class="nav-link" href="<?= url('cerrarsesion');?>">Cerrar sesión</a>
                    </li>
                @endif
                    <li class="nav-item">
                    @if (Auth::check())
                    <a id="cta" class="nav-link" href="<?= url('/historias/crear');?>">Escribí</a>
                    @else
                    <a id="cta" class="nav-link" href="<?= url('/iniciarsesion');?>">Escribí</a>
                    @endif
                    </li>
            </ul>
            </div>
        </div>
        </nav>
        </header>

        @yield('body')

        <footer>
            <div class="container">
            <div class="row pie">
                <div class="col-md-6 col-sm-12 logoFooter">
                    <img src="{{ URL::to('img/logofooter.png') }}" alt="Historia Logo">
                </div>
                <div class="col-md-6 col-sm-12 derecha">
                    <ul>
                        <li>
                            <a href="<?= url('/');?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= url('/nosotros');?>">Nosotros</a>
                        </li>
                        <li>
                            <a href="#">Membresía</a>
                        </li>
                        <li>
                            @if (Auth::check())
                            <a href="<?= url('/historias/crear');?>">Escribí</a>
                            @else
                            <a href="<?= url('/iniciarsesion');?>">Escribí</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </footer>
    </body>
</html>
