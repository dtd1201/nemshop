<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>" />
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />
    <meta name="abstract" content="<?php echo $__env->yieldContent('abstract'); ?>" />
    <meta name="ROBOTS" content="Metaflow" />
    <meta name="ROBOTS" content="noindex, nofollow, all" />
    <meta name="AUTHOR" content="Bivaco" />
    <meta name="revisit-after" content="1 days" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:image" content="<?php echo $__env->yieldContent('image'); ?>" />
    <meta property="og:image:alt" content="<?php echo $__env->yieldContent('image'); ?>" />
	<meta name="google-site-verification" content="Rp0rKQX7aGO3qmBXosgmP6JK5pMpvmywzagSB1rqxpA" />

    <meta property="og:url" content="<?php echo e(makeLink('home')); ?>" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('description'); ?>">
    <link rel="canonical" href="<?php echo e(makeLink('home')); ?>" />
    <link rel="shortcut icon" href="<?php echo e(URL::to('/favicon.ico')); ?>" />
    <script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery-3.2.1.min.js')); ?> "></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/bootstrap-4.5.3-dist/css/bootstrap.min.css')); ?>">
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('font/fontawesome-5.13.1/css/all.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/wow/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/css/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/css/slick-theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/lightbox-plus/css/lightbox.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/reset.css')); ?>">
     
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/stylesheet-2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/header.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/footer.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/cart.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="template-search">
    <div class="wrapper home">
        
                                    
                                    
        <!-- Navbar -->
        <?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.navbar -->

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    </div>
    <script type="text/javascript" src="<?php echo e(asset('lib/lightbox-plus/js/lightbox-plus-jquery.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/wow/js/wow.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/slick-1.8.1/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/sweetalert2/js/sweetalert2.all.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/components/js/Cart.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/components/js/Compare.js')); ?>"></script>
    <script>
        new WOW().init();
        $(function() {
            $(document).on('click','.pt_icon_right',function(){
                event.preventDefault();
                $(this).parent('a').parent('li').children("ul").slideToggle();
                $(this).parent('a').parent('li').toggleClass('active');
            });
            $(document).on('click','.btn-sb-toogle',function(){
                $(this).parents('.box-list-fill').find('.fill-list-item').slideToggle();
                $(this).toggleClass('active');
            });
        })
    </script>
    
    <?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH /var/www/vhosts/cus01.largevendor.com/httpdocs/resources/views/frontend/layouts/main.blade.php ENDPATH**/ ?>