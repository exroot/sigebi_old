<?php $__env->startSection('title', 'SIGEBI | Categorias | ' . $categoria->categoria); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2><?php echo e($categoria->categoria); ?></h2>
            
            <div class="ml-auto">
                <a href="/categorias">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="<?php echo e('/categorias/' . $categoria->id . '/editar'); ?>">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Descripcion</h4>
                <p>Información de categoría.</p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                    <h4>Libros sobre <?php echo e($categoria->categoria); ?>:</h4>
                    <ul>
                        <?php $__empty_1 = true; $__currentLoopData = $categoria->libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li>
                                <a href=<?php echo e('/libros/' . $libro->id); ?>><?php echo e($libro->titulo); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li>
                                Esta categoría no tiene libros.
                            </li>
                        <?php endif; ?>
                    </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views/categorias/categoria.blade.php ENDPATH**/ ?>