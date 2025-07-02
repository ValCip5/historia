
<?php $__env->startSection('body'); ?>

<section id="seccionRegistrarse">
<div class="divIngresar">
        <h1 class="mb-2">Perfil</h1>
        <p class="mb-5 perfilP">La foto será mostrada hasta una resolución máxima de 100x100.
        Fuera del perfil, se verá a 40x40.</p>
        <div class="text-center">
            <img class="fotoDePerfil mb-3" src="<?php echo e(URL::to('img/usuarios/' . Auth::user()->foto_url)); ?>" alt="Perfil del usuario">
            <form class="mb-5" enctype="multipart/form-data" action="<?= url('usuarios/' . Auth::user()->id.'/imagen');?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="file" id="imagen" name="imagen" accept="image/*">
                <button id="cambiar" type="submit">Cambiar</button>
            </form>
            <form action="<?php echo e(url('usuarios/' . Auth::user()->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo e(Auth::user()->nombre); ?>">
                </div>

                <div>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" value="<?php echo e(Auth::user()->apellido); ?>">
                </div>

                <button type="submit">Guardar</button>
            </form>
        </div>
</div>  
</section>

<section>
    <div class="container infoMembresia">
        <div class="row col-lg-7 col-sm-12 mx-auto">
            <h2 class="mb-4">Información relevante</h2>
            <div class="col-lg-6 col-sm-12 p-2">
                <div class="border rounded p-4">
                <h3>
                    Está suscrito a la membresía
                </h3>
                <p>
                    <?php echo e(Auth::user()->es_miembro ? 'Sí' : 'No'); ?>

                </p>
                <?php if(!Auth::user()->es_miembro): ?>
                    <a href="<?php echo e(url('/membresia')); ?>" class="cta">Suscribirme</a>
                <?php else: ?>
                    <form action="<?php echo e(url('/api/usuarios/' . Auth::user()->id . '/desuscribirse')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="cta">Desuscribirme</button>
                    </form>    
                <?php endif; ?>
            </div>
        </div>
             <div class="col-lg-6 col-sm-12 p-3 h-100">
                <div class="border rounded p-4 h-100">
                    <h3>
                        Historial de subscripción
                    </h3>
                    <?php if(Auth::user()->es_miembro): ?>
                        <?php
                            $fecha = new DateTime(Auth::user()->subscribed_at);
                        ?>
                        <p>
                           subscrito desde <?php echo e($fecha->format('d/m/Y')); ?> a las <?php echo e($fecha->format('H:i:s')); ?>

                        </p>
                    <?php else: ?>
                        <p>
                            Nunca se ha subscripto
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\historia\resources\views/perfil.blade.php ENDPATH**/ ?>