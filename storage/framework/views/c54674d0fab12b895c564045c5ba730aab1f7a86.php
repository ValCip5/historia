
<?php $__env->startSection('body'); ?>

<section id="seccionRegistrarse">
<div class="divIngresar">
        <h1 class="mb-2">Perfil</h1>
        <p class="mb-5 perfilP">La foto será mostrada hasta una resolución máxima de 100x100.
        Fuera del perfil, se verá a 40x40.</p>
        <div class="text-center">
        <img class="fotoDePerfil mb-3" src="<?php echo e(URL::to('img/usuarios/' . Auth::user()->foto_url)); ?>" alt="Perfil del usuario">
        <form class="mb-5" enctype="multipart/form-data" action="<?= url('usuarios/' . Auth::user()->id);?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="file" id="imagen" name="imagen" accept="image/*">
            <button id="cambiar" type="submit">Cambiar</button>
            </form>
</div>

    </div>  
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portales\resources\views/perfil.blade.php ENDPATH**/ ?>