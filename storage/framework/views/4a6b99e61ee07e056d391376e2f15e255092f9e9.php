<?php
/** @var \App\Models\Categoria[]|\Illuminate\Database\Eloquent\Collection $categorias */
?>


<?php $__env->startSection('body'); ?>

    <?php if(Auth::user() && Auth::user()->es_admin): ?>
        <div class="admin">
            <div class="container">
            <p>Bienvenido administrador, haga click <a href="<?= url('/historias');?>">aquí</a> para ingresar al panel de noticias, o sino haga click <a href="<?= url('/admin/panelmembresia');?>">aquí</a> para ingresar al panel de administración de usuarios.</p>
            </div>
        </div>
    <?php endif; ?>

        <section id="seccionUnoHome">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <h1 class="mb-4">Confluencia de ideas en un solo lugar</h1>
                        <p>Únete y descubre miles de opiniones escritas por 
                        personas de todo el mundo, es tiempo de escribir tu historia.</p>
                        <div class="boton">
                        <?php if(Auth::user()): ?>
                            <a href="<?= url('/historias/crear');?>">Empezar</a>
                        <?php else: ?>
                            <a href="<?= url('/iniciarsesion');?>">Empezar</a>
                        <?php endif; ?>
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
            <?php $__currentLoopData = $mejoresNoticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img width="40" class="me-2" src="<?php echo e(URL::to('img/usuarios/' . $noticia->usuario->foto_url)); ?>" alt="Perfil"><?php echo e($noticia->usuario->nombre); ?> <?php echo e($noticia->usuario->apellido); ?> en <?php echo e($noticia->categoria->nombre); ?></span>
                    <h3 class="my-3"><a href="<?= url('/historias/' . $noticia->id);?>"><?php echo e($noticia->titulo); ?></a></h3>
                    <span class="tiempo"><?php echo e($noticia->fecha); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            </div>
        </section>

        <section id="seccionTresHome">
            <div class="container">
                <div class="row columna">
                <div class="col-8">
                <div class="mb-3">

                    <?php if(isset($anchor) && $anchor): ?>
                        <input type="hidden" id="anchor" name="anchor" value="<?php echo e($anchor); ?>">
                    <?php endif; ?>

                <form action="<?= url('/');?>" method="get" id="laBusqueda">

                <input id="form_categoria" type="hidden" name="categoria">

                <div class="col-md-8 col-sm-12 arriba">
                        <h2 class="mb-3">Descubre eso que te importa</h2>
                            <ul class="bloque">
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <input id="categoria_<?php echo e($categoria->nombre); ?>" type="radio" name="categoria" value="<?php echo e($categoria->id); ?>" class="categoria"/>
                                    <label for="categoria_<?php echo e($categoria->nombre); ?>"><?php echo e($categoria->nombre); ?></label>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                </div>

                <?php if(isset($busqueda)): ?>
                    <input type="text" value="<?php echo e($busqueda); ?>" name="busqueda" id="titulo" placeholder="Título de la noticía">
                <?php else: ?>
                    <input type="text" name="busqueda" id="titulo" placeholder="Título de la noticía">
                <?php endif; ?>
                    <select id="tiempo" name="ordenamiento">
                        <option value="reciente">Reciente</option>
                        <option value="antiguo">Lo más antiguo</option>
                        <option value="masVisto">Lo más visto</option>
                        <option value="masVotado">Lo más votado</option>
                    </select>
                    <input id="enviar" name="buscar" class="enviar" type="submit" value="Buscar">
                </form>
                </div>
                <ul>
                <?php $__currentLoopData = $ultimasNoticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="abajo">
                            <img width="40" class="me-2" src="<?php echo e(URL::to('img/usuarios/' . $noticia->usuario->foto_url)); ?>" alt="Perfil">
                            <span><?php echo e($noticia->usuario->nombre); ?> <?php echo e($noticia->usuario->apellido); ?> en <?php echo e($noticia->categoria->nombre); ?></span>
                            <h3 class="mt-3 mb-0"><a href="<?= url('/historias/' . $noticia->id);?>"><?php echo e($noticia->titulo); ?></a></h3>
                            <p class="mt-1"><?php echo e($noticia->descripcion); ?></p>
                            <span class="tiempo"><?php echo e($noticia->fecha); ?></span>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                </div>

                <!--
                <aside class="col-md-4 col-sm-12 arriba">
                        <span class="mb-3">Espacio para anuncios</span>
                </aside>
                -->

            </div>
        </div>
        </section>

        <script>
        const categorias = document.getElementsByClassName('categoria');

        for (let i=0; i<categorias.length; i++) {
        const categoriaActual = categorias[i];
            categoriaActual.onclick = () => {
                document.getElementById('form_categoria').value = categoriaActual.value;
            }
        }

        if (document.getElementById('anchor')) {
            window.location.hash = 'laBusqueda';
        }
        </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\historia\resources\views/home.blade.php ENDPATH**/ ?>