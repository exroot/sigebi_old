<?php $__env->startSection('title', 'SIGEBI | Iniciar sesión'); ?>

<?php $__env->startSection('content'); ?>
<div class="container" id="auth">
    <h2 class="row justify-content-center mt-4" id="title">Iniciar sesión</h2>
    <div class="row justify-content-center">
        <div class="ml-auto mr-auto mt-5" id="card-container">
            <div class="card card-login shadow">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="cedula" class="col-md-12 col-form-label text-md-left"><?php echo e(__('Cédula')); ?></label>
                            <div class="col-md-12">
                                <input id="cedula" type="text" class="form-control <?php $__errorArgs = ['cedula'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cedula" value="<?php echo e(old('cedula')); ?>" required autocomplete="cedula" autofocus>

                                <?php $__errorArgs = ['cedula'];
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

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-left"><?php echo e(__('Contraseña')); ?></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                <?php $__errorArgs = ['password'];
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
                        <div class="form-group row mt-4 mb-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12" >
                                        <!-- Correct -->
                                    <?php echo e(__('Entrar')); ?>

                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 mt-1 d-flex justify-content-between">
                                <div>
                                    <?php if(Route::has('password.request')): ?>
                                        <p>
                                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                                <?php echo e(__('Olvidé mi contraseña')); ?>

                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <p>No te has registrado?
                                        <a class="btn btn-link" href="/register">
                                            Registrate
                                        </a>
                                    <p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views/auth/login.blade.php ENDPATH**/ ?>