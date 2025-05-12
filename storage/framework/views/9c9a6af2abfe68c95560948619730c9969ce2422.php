
<?php $__env->startSection('body'); ?>

<section id="seccionRegistrarse">
    <div class="divIngresar">
        <h1>Registrarse</h1>
        <form class="mt-4 mb-5" action="<?= url('/api/usuarios');?>" method="post"> 
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <?php if(session('usuario')): ?>
                <input type="text" name="nombre" value="<?php echo e(session('nombre')); ?>" class="form-control">
                <?php else: ?>
                <input type="text" name="nombre" class="form-control">
                <?php endif; ?>
                
                <?php if(session('nombreVacio')): ?>
                <div class="hayErrores">
                    <p>El nombre no puede quedar vacío</p>
                </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <?php if(session('usuario')): ?>
                <input type="text" name="apellido" value="<?php echo e(session('apellido')); ?>" class="form-control">
                <?php else: ?>
                <input type="text" name="apellido" class="form-control">
                <?php endif; ?>
                
                <?php if(session('apellidoVacio')): ?>
                <div class="hayErrores">
                    <p>El apellido no puede quedar vacío</p>
                </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <?php if(session('usuario')): ?>
                <input type="email" name="email" value="<?php echo e(session('email')); ?>" class="form-control">
                <?php else: ?>
                <input type="email" name="email" class="form-control">
                <?php endif; ?>
                
                <?php if(session('emailVacio')): ?>
                <div class="hayErrores">
                    <p>El email no puede quedar vacío</p>
                </div>
                <?php elseif(session('emailSinArroba')): ?>
                <div class="hayErrores">
                    <p>El email debe de contener una arroba</p>
                </div>
                <?php elseif(session('emailRepetido')): ?>
                <div class="hayErrores">
                    <p>Este email ya se encuentra registrado, intenta con otro</p>
                </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <?php if(session('usuario')): ?>
                <input type="text" name="username" value="<?php echo e(session('usuario')); ?>" class="form-control">
                <?php else: ?>
                <input type="text" name="username" class="form-control">
                <?php endif; ?>
                
                <?php if(session('usuarioVacio')): ?>
                <div class="hayErrores">
                    <p>El usuario no puede quedar vacío</p>
                </div>
                <?php elseif(session('usuarioRepetido')): ?>
                <div class="hayErrores">
                    <p>Este nombre de usuario ya se encuentra registrado, intenta con otro</p>
                </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control">
                <?php if(session('contraseniaVacio')): ?>
                <div class="hayErrores">
                    <p>La contraseña no puede quedar vacía</p>
                </div>
                <?php endif; ?>
            </div>
            <div class="text-center">
            <button type="submit" class="mt-3 cta">Registrarse</button>
            </div>
            </form>
            <p class="aviso">Si ya tienes cuenta, inicia sesión <a href="<?= url('iniciarsesion');?>">aquí</a></p>
    </div>  
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portales\resources\views/registrarse.blade.php ENDPATH**/ ?>