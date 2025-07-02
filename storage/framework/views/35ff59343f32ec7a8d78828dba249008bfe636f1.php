
<?php $__env->startSection('body'); ?>

<section id="seccionPanelAdmin">

            <div class="container">
            <h1 class="mb-5">
                    Panel de administración de usuarios
            </h1>

            <div class="deTablaAdmin">
            <table>
            <tr>
                <th>Foto de perfil</th>
                <th>Usuario</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>Tiene membresía</th>
                <th>Fecha de subscripción</th>
                <th>Fecha de registro</th>
            </tr>
            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="noBordeAbajo"><img width="40" class="me-2" src="<?php echo e(URL::to('img/usuarios/' . $usuario->foto_url)); ?>" alt="Perfil de <?php echo e($usuario->username); ?>"></td>
                <td class="noBordeAbajo"><?php echo e($usuario->username); ?></td>
                <td class="noBordeAbajo"><?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellido); ?></td>
                <td class="noBordeAbajo"><?php echo e($usuario->email); ?></td>
                <td class="noBordeAbajo"><?php echo e($usuario->es_miembro ? 'Sí' : 'No'); ?></td>
                <td class="noBordeAbajo"><?php echo e($usuario->subscribed_at); ?></td>
                <td class="noBordeAbajo"><?php echo e($usuario->created_at); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
            </div>
        </section>

        <script src="<?php echo e(URL::to('js/eliminar_noticia.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\historia\resources\views/paneladminmembresia.blade.php ENDPATH**/ ?>