<?php $__env->startSection('title', 'Editar copia'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Actualizar copia</div>

                <div class="card-body">
                <form method="POST" action="<?php echo e('/copias/' . $copia->id); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group row mt-2">
                        <label for="cota" class="col-md-4 col-form-label text-md-right">Cota</label>
                        
                        <div class="col-md-6 mt">
                            <input id="cota" type="text" class="form-control <?php $__errorArgs = ['cota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cota" value="<?php echo e($copia->cota); ?>" required autofocus>

                            <?php $__errorArgs = ['cota'];
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


                        <div class="form-group row mt-2">
                            <label for="libro" class="col-md-4 col-form-label text-md-right">Libro</label>

                            <div class="col-md-6">
                                <select name="libro" class="form-control col-md-12 text-md-center">
                                    <?php $__empty_1 = true; $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($libro->id); ?>" <?php if($copia->libro->id == $libro->id): ?> selected="selected" <?php endif; ?> ><?php echo e($libro->titulo); ?></option> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value="">No se encontraron libros.</option>
                                    <?php endif; ?>
                                </select> 
                                <?php $__errorArgs = ['libro'];
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

                        <div class="form-group row mt-2">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <select name="estado" class="form-control col-md-12 text-md-center">
                                    <?php $__empty_1 = true; $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($estado->id); ?>" <?php if($copia->estado->id == $estado->id): ?> selected="selected" <?php endif; ?> ><?php echo e($estado->estado); ?></option> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value="">No se encontraron estados.</option>
                                    <?php endif; ?>
                                </select> 
                                <?php $__errorArgs = ['estado'];
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
                            <a class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%" href="<?php echo e('/copias/' . $copia->id); ?>">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary col-md-2 ml-1" style="max-width: 35%">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views/copias/editar.blade.php ENDPATH**/ ?>