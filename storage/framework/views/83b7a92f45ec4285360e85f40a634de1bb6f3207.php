<?php $__env->startSection('title', 'Nueva categoria'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Nueva categoria</div>

                <div class="card-body">
                <form method="POST" action="<?php echo e('/categorias'); ?>">
                        <?php echo e(csrf_field()); ?>

                        
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text" class="form-control col-md-12 <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="categoria" value="" required autofocus>

                                <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row mb-0 col-md-12 d-flex justify-content-center">
                            <a class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%" href="/categorias">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary col-md-2 ml-1" style="max-width: 35%">
                                Agregar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views/categorias/crear.blade.php ENDPATH**/ ?>