


<?php $__env->startSection('body'); ?>

        <section id="seccionEscribir">
            <div id="divEscribir">
                <?php if(!$noticia): ?>
                <h1 class="mb-3">
                    Creá tu noticia
                </h1>
                <?php else: ?>
                <h1 class="mb-3">
                    Editá tu noticia
                </h1>
                <?php endif; ?>
            <?php if($noticia): ?>
            <form action="<?= url('/historias/' . $noticia->id . '/edit');?>" method="post" enctype="multipart/form-data">
            <?php else: ?>
            <form action="<?= url('/api/historias');?>" method="post" enctype="multipart/form-data">
            <?php endif; ?>
            <?php echo csrf_field(); ?>
            
                <div class="mb-3">
                    <label class="mb-2" for="categorias">Elegí una categoría</label>
                    <div>
                        <select name="categoria" id="categorias">
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($noticia && $noticia->categoria_id == $categoria->id): ?>
                        <option value="<?php echo e($categoria->id); ?>" selected><?php echo e($categoria->nombre); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tituloNoticia" class="form-label">Título</label>
                    <?php if($noticia): ?>
                    <input type="text" id="tituloNoticia" name="titulo" value="<?php echo e($noticia->titulo); ?>" class="form-control" placeholder="Ej: Mis especies de plantas favoritas">
                    <?php elseif(session('titulo')): ?>
                    <input type="text" id="tituloNoticia" name="titulo" value="<?php echo e(session('titulo')); ?>" class="form-control" placeholder="Ej: Mis especies de plantas favoritas">
                    <?php else: ?>
                    <input type="text" id="tituloNoticia" name="titulo" class="form-control" placeholder="Ej: Mis especies de plantas favoritas">
                    <?php endif; ?>

                    <?php if(session('tituloIncompleto')): ?>
                    <div class="hayErrores">
                        <p>El título debe tener más de 10 caracteres.</p>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen de portada</label>
                    <div>
                    <input type="file" id="imagen" name="imagen" accept="image/*"/>
                    </div>

                    <?php if(session('imagenVacia')): ?>
                    <div class="hayErrores">
                        <p>Debes de elegir una imagen para publicar tu noticia.</p>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="pb-5 separador">
                    <label for="descripcion" class="form-label mt-4">Descripción</label>
                    <?php if($noticia): ?>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Esta es una descripción que suele ser corta, la cual acompaña a la noticia y es un breve resumen de lo que trata."><?php echo e($noticia->descripcion); ?></textarea>
                    <?php elseif(session('descripcion')): ?>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Esta es una descripción que suele ser corta, la cual acompaña a la noticia y es un breve resumen de lo que trata."><?php echo e(session('descripcion')); ?></textarea>
                    <?php else: ?>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Esta es una descripción que suele ser corta, la cual acompaña a la noticia y es un breve resumen de lo que trata."></textarea>
                    <?php endif; ?>

                    <?php if(session('descripcionIncompleto')): ?>
                    <div class="hayErrores">
                        <p>La descripción debe tener más de 20 caracteres.</p>
                    </div>
                    <?php endif; ?>
                </div>
                <div id="noticia-container">
                    <label class="form-label">Cuerpo de la noticia</label>
                    <?php if($noticia): ?>
                    <?php $__currentLoopData = $noticia->bloques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input id="cuerpo" type="hidden" value="<?php echo e($bloque->texto); ?>" class="js-block">
                    </input>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="text-center mt-3">
                    <button class="cta" type="submit">Publicar</button>
                </div>
            </form>
            </div>
        </section>


        <script src="<?php echo e(URL::to('js/noticias_escribir.js')); ?>">
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\historia\resources\views/nuevahistoria.blade.php ENDPATH**/ ?>