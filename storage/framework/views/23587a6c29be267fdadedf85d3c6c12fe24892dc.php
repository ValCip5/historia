
<?php $__env->startSection('body'); ?>

<section id="seccionRegistrarse">
<div class="divIngresar">
        <h1 class="mb-4">Iniciar Sesión</h1>
        <?php if(isset($message)): ?>
            <div>
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <form class="mb-5" action="<?= url('iniciarsesion');?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <?php if(session('usuario')): ?>
                <input type="text" class="form-control" value="<?php echo e(session('usuario')); ?>" name="usuario"/>
                <?php else: ?>
                <input type="text" class="form-control" name="usuario"/>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control"/>
            </div>
            <div class="text-center">
            <button type="submit" class="cta mt-3">Ingresar</button>
            </div>
            <?php if(session('errores')): ?>
                <div class="hayErrores">
                    <?php $__currentLoopData = session('errores'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>    
            </form>

            <p class="aviso">Si no tienes cuenta, regístrate <a href="<?= url('registrar');?>">aquí</a></p>
    </div>  
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\historia\resources\views/iniciarsesion.blade.php ENDPATH**/ ?>