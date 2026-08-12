<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website resmi TK Mekar Tigo Jangko">
    <meta name="author" content="TK Mekar Tigo Jangko">

    <title><?php echo $__env->yieldContent('title', 'TK Mekar Tigo Jangko'); ?></title>

    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logo-tk.jpg')); ?>" type="image/x-icon">
    <link href="<?php echo e(asset('assets/libs/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <?php echo $__env->yieldContent('styles'); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>

    
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html>
<?php /**PATH D:\laragon\www\tk-mekar-tigo-jangko\resources\views/layouts/app.blade.php ENDPATH**/ ?>