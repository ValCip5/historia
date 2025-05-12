
<?php $__env->startSection('body'); ?>

        <section id="seccionUnoNoticia">
            <div id="divNoticia">
                <div class="descNoticia">
                    <h1 class="mb-3">
                        <?php echo e($noticia->titulo); ?>

                    </h1>
                    <p class="descripcion mb-0">
                        <?php echo e($noticia->descripcion); ?>

                    </p>
                    <img class="img-fluid my-4" src="<?php echo e(url('img/noticias/' . $noticia->imagen_url)); ?>" alt="Portada de <?php echo e($noticia->imagen_url); ?>">
                    <span><img width="40" class="me-2" src="<?php echo e(URL::to('img/usuarios/' . $noticia->usuario->foto_url)); ?>" alt="Perfil"> <?php echo e($noticia->usuario->nombre); ?> <?php echo e($noticia->usuario->apellido); ?> en <?php echo e($noticia->categoria->nombre); ?>, <?php echo e($noticia->fecha); ?></span>
                </div>
                <div class="laNoticia mt-5">
                <?php $__currentLoopData = $noticia->bloques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <p>
                    <?php echo e($bloque->texto); ?>

                </p>

                <?php if($bloque->imagen_url): ?>
                    <img class="img-fluid mt-5 mb-4" src="<?php echo e(url('img/noticias/' . $bloque->imagen_url)); ?>" alt="Imagen de <?php echo e($bloque->imagen_url); ?>">
                <?php endif; ?>
                <div id="likes"></div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="mt-5 pt-4 comLike">
                    <button class="me-2"><i class="bi-send"></i></button><span class="numeros"><?php echo e($cantidadComentarios); ?></span>
                    
                    <form action="<?= url('/api/historias/' . $noticia->id . '/likes');?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php if($likeActual == null): ?>
                    <input id="likeStatus" name="likeStatus" type="submit"  value="Me gusta" class="me-2 ms-4"/>
                    <?php else: ?>
                    <input id="likeStatus" name="likeStatus" type="submit" value="Ya no me gusta" class="me-2 ms-4"/>
                    <?php endif; ?>
                    </form>

                    <span class="numeros"><?php echo e($cantidadLikes); ?></span>
                </div>
                </div>
            </div>
        </section>

        <section id="seccionComentarios">
            <div id="divComentarios">
                <h2>Comentarios</h2>
                <p>Tu comentario</p>
                <form action="<?= url('/api/historias/' . $noticia->id . '/comentarios');?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div>
                    <textarea id="tuComentario" class="mb-3" name="comentario" rows="5"></textarea>
                    </div>
                    <input type="submit" id="comentar" value="Comentar">
                </form>
                
                <ul class="pt-3">
                    <?php $__currentLoopData = $noticia->comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="mt-5 pt-3">
                        <img width="40" class="me-2" src="<?php echo e(URL::to('img/usuarios/' . $comentario->usuario->foto_url)); ?>" alt="Perfil">
                        <?php if($comentario->usuario->es_admin): ?>
                        <span class="nombreAzul"> <?php echo e($comentario->usuario->nombre); ?> <?php echo e($comentario->usuario->apellido); ?></span>
                        <?php else: ?>
                        <span> <?php echo e($comentario->usuario->nombre); ?> <?php echo e($comentario->usuario->apellido); ?></span>
                        <?php endif; ?>
                        <p class="mt-3">
                            <?php echo e($comentario->comentario); ?>

                        </p>
                        <!--<button class="me-2"><i class="bi-heart"></i></button>-->
                        <span><?php echo e($comentario->fecha); ?></span>
                        <?php if(Auth::check() && ($comentario->usuario->id == Auth::user()->id || Auth::user()->es_admin)): ?>
                        <form class="mt-3" method="get" action="<?= url('api/comentarios/' . $comentario->id . '/eliminar');?>"><button class="eliCom" type="submit">Eliminar</button></form>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </section>

        
        <section id="seccionDosNoticia">
            <div class="container">
                <h2>
                <i class="bi-arrow-up-right-circle-fill me-2"></i>Recientes en <?php echo e($noticia->categoria->nombre); ?>

                </h2>
                <ol class="row">
                <?php $__currentLoopData = $ultimasNoticiasRelacionadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticiaRelacionada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img width="40" class="me-2" src="<?php echo e(URL::to('img/usuarios/' . $noticia->usuario->foto_url)); ?>" alt="Perfil"><?php echo e($noticiaRelacionada->usuario->nombre); ?> <?php echo e($noticiaRelacionada->usuario->apellido); ?></span>
                    <h3 class="my-3"><a href="<?= url('/historias/' . $noticiaRelacionada->id);?>"><?php echo e($noticiaRelacionada->titulo); ?></a></h3>
                    <span class="tiempo"><?php echo e($noticiaRelacionada->fecha); ?></span>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            </div>
        </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portales\resources\views/leernoticia.blade.php ENDPATH**/ ?>