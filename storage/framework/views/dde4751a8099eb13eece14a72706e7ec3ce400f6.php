<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Phúc Minh Group</title>

    <!-- Scripts -->
    
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery-3.2.1.min.js')); ?> "></script>
    <!-- Bootstrap 4 -->
    <script type="text/javascript" src="<?php echo e(asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('lib/adminlte/css/adminlte.min.css')); ?>">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    Phúc Minh Group
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    <?php if(Auth::guard('admin')->check()): ?>
                                    <?php echo e(Auth::guard('admin')->user()->name); ?>

                                    <?php elseif(Auth::guard('web')->check()): ?>
                                    <?php echo e(Auth::guard()->user()->name); ?>

                                    <?php endif; ?>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <?php if(Auth::guard('admin')->check()): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     <?php echo e(__('Logout')); ?>

                                     </a>
                                    <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-none">
                                    <?php elseif(Auth::guard('web')->check()): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     <?php echo e(__('Logout')); ?>

                                     </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php endif; ?>
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>

<?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/layouts/app.blade.php ENDPATH**/ ?>