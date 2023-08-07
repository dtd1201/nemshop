<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/bootstrap-4.5.3-dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('font/fontawesome-5.13.1/css/all.min.css')); ?>">
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/stylesheet.css')); ?>">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
</head>
<body>

    <?php echo $__env->yieldContent('content'); ?>

    <script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery-3.2.1.min.js')); ?> "></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')); ?>"></script>
    
</body>

</html><?php /**PATH C:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/master/main2.blade.php ENDPATH**/ ?>