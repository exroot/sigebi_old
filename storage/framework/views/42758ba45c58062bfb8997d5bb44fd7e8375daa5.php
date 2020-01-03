<?php $__env->startSection('title', 'SIGEBI | Libros | ' . $libro->titulo); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="head d-flex" style="padding-top: 15px;">
            <h2><?php echo e($libro->titulo); ?></h2>
            <div class="actions ml-auto">
                <a href="/libros">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="<?php echo e('/libros/' . $libro->id . '/editar'); ?>">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Descripción</h4>
                <p><?php echo e($libro->descripcion); ?></p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                    <h4>Data:</h4>
                    <p>Autor: <a href=<?php echo e('/autores/' . $libro->autor->id); ?>> <?php echo e($libro->autor->nombre); ?> </a></p>
                    <p>Categoria: <?php echo e($libro->categoria->categoria); ?></p>
                    <p>Estado: <span class=<?php echo e($disponible ? 'status-icon-sucess' : 'status-icon-danger'); ?>> <?php echo e($disponible ? 'Disponibe' : 'No disponible'); ?></span></p>
            </div>
        </div>
        <hr>
            <h4>Libros similares:</h4>
            <ul>
                
                <?php $__empty_1 = true; $__currentLoopData = $libro->categoria->libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libroSimilar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                    <?php if( count($libro->categoria->libros) > 1): ?>
                        <?php if($libroSimilar->id != $libro->id): ?>
                            
                            <li>
                                <a href=<?php echo e('/libros/' . $libroSimilar->id); ?>><?php echo e($libroSimilar->titulo); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>No hay libros similares o que compartan  la misma categoría.</p>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
            </ul>
        <hr>
        <h4>( <?php echo e(count($copias)); ?> )  <?php echo e(count($copias) <= 1 ? 'Copia:' : 'Copias: '); ?> </h4>
        <ul>
            <?php $__empty_1 = true; $__currentLoopData = $copias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $copia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li>
                    <?php echo e($copia->estado_id == 1 ? 'Disponible' : 'Prestada'); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li>
                    No hay copias de este libro en biblioteca.
                </li>
            <?php endif; ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views/libros/libro.blade.php ENDPATH**/ ?>