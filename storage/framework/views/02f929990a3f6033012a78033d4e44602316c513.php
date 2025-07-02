
<?php $__env->startSection('body'); ?>

<section id="seccionPanelAdmin">

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar noticia</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="equis" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                ¿Estás seguro que deseas eliminar tu historia? Esta acción no puede ser revertida.
                </div>
                <div class="modal-footer">
                    <button type="button" id="volver" data-bs-dismiss="modal">Volver</button>
                    <a id="eliminar" href="#" class="eliminar">Eliminar</a>
                </div>
                </div>
            </div>
            </div>


            <div class="container">
            <h1 class="mb-5">
                    Panel de administración de noticias
                </h1>
            <form class="mb-5" action="" method="get">
            <?php if(isset($busqueda)): ?>
            <input type="text" name="busqueda" value="<?php echo e($busqueda); ?>" id="titulo" placeholder="Título de la noticía">
            <?php else: ?>
            <input type="text" name="busqueda" id="titulo" placeholder="Título de la noticía">
            <?php endif; ?>
            <select class="me-2" id="categoria" name="categoria">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input id="buscarAdmin" value="Buscar" type="submit">
            </form>


            <div class="deTablaAdmin">
            <table>
            <tr>
                <th>Usuario</th>
                <th>Nombre completo</th>
                <th>Noticia</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th class="noBorde">Acciones</th>
            </tr>
            <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td class="noBordeAbajo"><?php echo e($noticia->usuario->username); ?></td>
                    <td class="noBordeAbajo"><?php echo e($noticia->usuario->nombre); ?> <?php echo e($noticia->usuario->apellido); ?></td>
                    <td class="noBordeAbajo"><?php echo e($noticia->titulo); ?></td>
                    <td class="noBordeAbajo"><?php echo e($noticia->descripcion); ?></td>
                    <td class="noBordeAbajo"><?php echo e($noticia->categoria->nombre); ?></td>
                    <td class="noBordeAbajo"><?php echo e($noticia->fecha); ?></td>
                    <td class="noBordeAbajo acciones"><div class="p-3"><a href="<?= url('historias/' . $noticia->id . '/editar');?>" class="editar">Editar</a></div><button id="<?php echo e($noticia->id); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?= url('historias/' . $noticia->id . '/eliminar');?>" class="noticia_eliminar eliminar">Eliminar</button></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
            </div>
        </section>

        <script src="<?php echo e(URL::to('js/eliminar_noticia.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\historia\resources\views/paneladmin.blade.php ENDPATH**/ ?>