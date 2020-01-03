<?php $__env->startSection('title', 'SIGEBI | Copia | ' . $copia->id); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>Copia Numero: <?php echo e($copia->id); ?></h2>
            
            <div class="ml-auto">
                <a href="/categorias">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="<?php echo e('/copias/' . $copia->id . '/editar'); ?>">
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
                    Libro: <a href="<?php echo e('/libros/' . $copia->libro->id); ?>"><?php echo e($copia->libro->titulo); ?></a>
                </p>
                <p>
                    Cota: <?php echo e($copia->cota); ?>

                </p>
                <p>
                    Estado: <?php echo e($copia->estado->estado); ?>

                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views/copias/copia.blade.php ENDPATH**/ ?>