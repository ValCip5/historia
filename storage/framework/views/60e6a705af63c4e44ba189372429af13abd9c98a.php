<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Historia</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('app.css')); ?>">
    </head>
    <body>
        <header>
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?php echo e(URL::to('img/logo.png')); ?>" alt="Logo Historia"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Nosotros</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Membresia</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                <a id="cta" class="nav-link" href="#">Escribí</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        </header>

        <section id="seccionUnoHome">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <h1 class="mb-4">Confluencia de ideas en un solo lugar</h1>
                        <p>Unite y descubrí miles de opiniones escritas
                        por personas de todo el mundo, es tiempo de escribir tu historia.</p>
                        <div class="boton">
                            <a href="#">Leer</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 imagen">
                        <img class="img-fluid" src="img/confluencia.png" alt="Confluencia">
                    </div>
                </div>
            </div>
        </section>

        <section id="seccionDosHome">
            <div class="container">
            <h2 class="mb-0"><i class="bi-star-fill me-2"></i>Populares en Historia</h2>
            <ol class="row">
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                    <h3 class="my-3"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                    <span class="tiempo">Abril 19 - Hace 2 horas</span>
                </li>
            </ol>
            </div>
        </section>

        <section id="seccionTresHome">
            <div class="container">
                <div class="row columna">
                <div class="col-8">
                <div class="mb-3">
                    <input type="text" id="titulo" placeholder="Título">
                    <select id="tiempo" name="tiempo">
                        <option value="economia">Recientemente</option>
                        <option value="economia">Hace una semana</option>
                        <option value="economia">Hace un mes</option>
                    </select>
                    <input id="enviar" type="submit" value="Buscar">
                </div>

                    <div class="abajo">
                        <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                        <h3 class="mt-3 mb-0"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                        <p class="mt-1">estoy re caliente loko no puede ser que este tan caro todo no me alcanzan para las cosas,
                            por eso escribi esta noticia.
                        </p>
                        <span class="tiempo">Abril 19 - Hace 2 horas</span>
                    </div>

                    <div class="abajo">
                        <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                        <h3 class="mt-3 mb-0"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                        <p class="mt-1">estoy re caliente loko no puede ser que este tan caro todo no me alcanzan para las cosas,
                            por eso escribi esta noticia.
                        </p>
                        <span class="tiempo">Abril 19 - Hace 2 horas</span>
                    </div>

                    <div class="abajo">
                        <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                        <h3 class="mt-3 mb-0"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                        <p class="mt-1">estoy re caliente loko no puede ser que este tan caro todo no me alcanzan para las cosas,
                            por eso escribi esta noticia.
                        </p>
                        <span class="tiempo">Abril 19 - Hace 2 horas</span>
                    </div>

                    <div class="abajo">
                        <span><img class="me-2" src="img/perfil.png" alt="Perfil">Puto Delorto en Economía</span>
                        <h3 class="mt-3 mb-0"><a href="#">Está todo muy caro loko, aflojen los precios</a></h3>
                        <p class="mt-1">estoy re caliente loko no puede ser que este tan caro todo no me alcanzan para las cosas,
                            por eso escribi esta noticia.
                        </p>
                        <span class="tiempo">Abril 19 - Hace 2 horas</span>
                    </div>
                </div>
                <aside class="col-md-4 col-sm-12 arriba">
                        <h2 class="mb-3">Descubrí eso que te importa</h2>
                            <ul class="bloque">
                                <li>
                                    <button>Economía</button>
                                </li>
                                <li>
                                    <button>Economía</button>
                                </li>
                                <li>
                                    <button>Economía</button>
                                </li>
                                <li>
                                    <button>Economía</button>
                                </li>
                                <li>
                                    <button>Economía</button>
                                </li>
                                <li>
                                    <button>Economía</button>
                                </li>
                                <li>
                                    <button>Economía</button>
                                </li>
                                <li>
                                    <button>Economía</button>
                                </li>
                            </ul>
                </aside>
            </div>
        </section>

        <footer>
            <div class="container">
            <div class="row pie">
                <div class="col-md-6 col-sm-12 logoFooter">
                    <img src="img/logofooter.png" alt="Historia Logo">
                </div>
                <div class="col-md-6 col-sm-12 derecha">
                    <ul>
                        <li>
                            <a href="#">Contacto</a>
                        </li>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Nosotros</a>
                        </li>
                        <li>
                            <a href="#">Membresia</a>
                        </li>
                        <li>
                            <a href="#">Escribí</a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </footer>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\portales\resources\views/welcome.blade.php ENDPATH**/ ?>