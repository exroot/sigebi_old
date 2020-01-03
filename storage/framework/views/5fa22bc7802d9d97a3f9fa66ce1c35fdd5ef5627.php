<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <!-- Styles -->
    
    <link href="<?php echo e(asset('css/common.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/auth.css')); ?>" rel="stylesheet">
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link href="<?php echo e(asset('css/fonts/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sidebar.css')); ?>" rel="stylesheet">
    <!-- Extra styles -->
</head>
<body>
    <div id="app" class="<?php echo e(Auth::check() && Auth::user()->esAdmin() ? "wrapper" :  ""); ?>">
        <?php if(Auth::check() && Auth::user()->esAdmin()): ?>
            <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <main class="main__content">
            <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <?php if(Auth::check() && Auth::user()->esAdmin()): ?>
    <script >
        const button = document.getElementById("toggleBtn");
        button.addEventListener("click", () => {
            const wrapper = document.getElementById('app');
            const sidebar = document.querySelector('.sidebar');
            wrapper.classList.toggle('wrapper');
            sidebar.classList.toggle('hide');
        });
    </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\exroot\Documents\Projects\laravel\definitive\sigebi\resources\views////layouts/app.blade.php ENDPATH**/ ?>