<?php $__env->startSection('title', 'SIGEBI | Estado | ' . $estado->estado); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2><?php echo e($estado->estado); ?></h2>
            
            <div class="ml-auto">
                <a href="/estados">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="<?php echo e('/estados/' . $estado->id . '/editar'); ?>">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Observaciones:</h4>
                <p>No tiene ninguna observación.</p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                <h4>Data:</h4>
                <p>
                    Libros: <?php echo e(count($estado->libros)); ?> 
                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views/estados/estado.blade.php ENDPATH**/ ?>