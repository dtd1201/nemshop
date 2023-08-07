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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    
    <meta property="og:url" content="<?php echo e(makeLink('home')); ?>" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('description'); ?>">
    <link rel="canonical" href="<?php echo e(makeLink('home')); ?>" />
    <link rel="shortcut icon" href="<?php echo e(URL::to('/favicon.ico')); ?>" />
    <script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery-3.2.1.min.js')); ?> "></script>




    <!--
    <link rel="stylesheet" href="{linkhost}/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{linkhost}/css/lightbox.min.css" type="text/css" />
    <link rel="stylesheet" href="{linkhost}/css/animate.css" type="text/css" />
    <link href="{linkhost}/css/slick.css" rel="stylesheet" />
    <link href="{linkhost}/css/slick-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="{linkhost}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    -->

    <!--
    <link rel="stylesheet" href="{linkhost}/css/stylesheet-2.css" type="text/css" />
    <link rel="stylesheet" href="{linkhost}/css/header.css" type="text/css" />
    <link rel="stylesheet" href="{linkhost}/css/footer.css" type="text/css" />
    <link rel="stylesheet" href="{linkhost}/css/cart.css" type="text/css" />
    -->


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/bootstrap-3.4.1-dist/css/bootstrap.min.css')); ?>">

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('font/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/wow/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/css/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/css/slick-theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/lightbox-plus/css/lightbox.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/reset.css')); ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/stylesheet.css')); ?>"> -->
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
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    

    <script type="text/javascript" src="<?php echo e(asset('lib/lightbox-plus/js/lightbox-plus-jquery.min.js')); ?>"></script>

    <!-- Bootstrap 3 -->
    <script type="text/javascript" src="<?php echo e(asset('lib/bootstrap-3.4.1-dist/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/wow/js/wow.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/slick-1.8.1/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/sweetalert2/js/sweetalert2.all.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/components/js/Cart.js')); ?>"></script>
    <script>
        new WOW().init();
        $(function() {

            $('.btn-dathangngay').click(function() {
                $(this).parents('.modal').find('.close').trigger('click');
            })

            $('.pt_icon_share .btn-share').click(function() {
                $(this).parents('.pt_icon_share').find('.share').toggle();
            })
            $('.wrap-tab-pig-meat .wrap-navbar-tab .nav-tabs>li>a').click(function() {
                let url = $(this).attr('image');
                $("#image-pig").attr("src", "" + url);
            })
            $('.wrap-product-popup .wrap-navbar-tab .nav-tabs>li>a').click(function() {
                let url = $(this).attr('image');
                $("#image-pig-2").attr("src", "" + url);

                $(this).parents('.nav-tabs').find('li').removeClass('active');
                $(this).parent('li').addClass('active');
                console.log(url);
            })
            $('.quantity .prev').click(function() {
                let input = $(this).parents('.number').find("input[type='number']");
                let value = parseFloat(input.val());
                if (value < 1) {
                    input.val(0);
                } else {
                    input.val(value - 1);
                }
            })
            $('.quantity .next').click(function() {
                let input = $(this).parents('.number').find("input[type='number']");
                let value = parseFloat(input.val());
                input.val(value + 1);
            })

            $(".side-bar .menu-side-bar-leve-2").each(function() {
                let length = $(this).find(".nav_item1").length;
                if (length) {
                    $(this).prev("a").append("<i class='fa fa-angle-right pt_icon_right'></i>");
                }
            })
            $(".pt_icon_right").click(function() {
                event.preventDefault();
                $(this).parents(".menu-side-bar .nav_item").find(".menu-side-bar-leve-2").slideToggle();
                $(this).parents(".menu-side-bar .nav_item").toggleClass('active');
            })

            $(".side-bar .menu-side-bar-leve-3").each(function() {
                let length = $(this).find(".nav_item2").length;
                if (length) {
                    $(this).prev("a").append("<i class='fa fa-angle-right pt_icon_right2'></i>");
                }
            })
            $(".pt_icon_right2").click(function() {
                event.preventDefault();
                $(this).parents(".menu-side-bar .nav_item1").find(".menu-side-bar-leve-3").slideToggle();
                $(this).parents(".menu-side-bar .nav_item1").toggleClass('active');
            })
            $('.user>a').click(function() {
                event.preventDefault();
                $(this).parents('.user').find('.dropdown-menu-list').slideToggle();
            });

        })
    </script>
    <?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/frontend/layouts/main.blade.php ENDPATH**/ ?>