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
    <meta name="AUTHOR" content="Phan văn tân" />
    <meta name="revisit-after" content="1 days" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:image" content="<?php echo $__env->yieldContent('image'); ?>" />
    <meta property="og:url" content="<?php echo e(makeLink("home")); ?>" />
    <link rel="canonical" href="<?php echo e(makeLink("home")); ?>" />
    <link rel="shortcut icon" href="../favicon.ico" />
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/header.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/stylesheet-2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/stylesheet2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/footer.css')); ?>">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/bootstrap-4.5.3-dist/css/bootstrap.min.css')); ?>">

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('font/fontawesome-5.13.1/css/all.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/wow/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/css/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/css/slick-theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/lightbox-plus/css/lightbox.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/reset.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/stylesheet.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>
    <style>
        #sidebar-profile{
            background-color:white;
        }
        .avatar{

        }
        .avatar h4{
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        .avatar .media img{
            margin-top:0;
        }
        .avatar .media{
            align-items: center;
        }
        .wrap-profile-container{
            background-color: #f4f6f9;
            padding: 30px 0;
        }
        #sidebar-profile nav .nav-item{
            white-space: nowrap;
            border-bottom: 1px solid #e5e5e5;
        }
        #sidebar-profile nav .nav-item:last-child{
            border: unset;
        }
        .bg-left{
            
        }
        #sidebar-profile nav{
            padding: 0px 15px;
        }
        #sidebar-profile nav .nav-item .nav-link{
            white-space: nowrap;
            overflow: hidden;
        }
        #sidebar-profile nav .nav-item .nav-link p   {
            display: inline-block;
           margin: 0;
        }
        #sidebar-profile nav .nav-item .nav-link i{
            margin-right: 5px;
        }
        h1{
            font-size: 25px;
            font-weight: bold;
            margin-top: 0;
        }
        .card-title{
            margin: 0;
        }
        .card-title h3{
            margin: 0;
            font-size: 25px;
            font-weight: bold;
        }
    </style>
</head>

<body class="template-search">
    <div class="wrapper home">

        <!-- Navbar -->
        <?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.navbar -->
        <div class="wrap-profile-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 bg-left">
                        <div id="sidebar-profile" class="pt-3 pb-3">
                            <div class="avatar text-center p-3">
                               <a href="<?php echo e(route('profile.index')); ?>">
                                <img src="<?php echo e($user->avatar_path?$user->avatar_path: $shareFrontend['userNoImage']); ?>" alt="<?php echo e($user->name); ?>" class="mb-3 rounded-circle" style="width:100px;">
                                <h4><?php echo e($user->name); ?></h4>
                               </a>
                            </div>

                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <li class="nav-item">
                                      <a class="nav-link" href="<?php echo e(route('profile.editInfo')); ?>">
                                        <i class="fas fa-edit"></i>
                                        <p> Chỉnh sửa thông tin</p>
                                       </a>
                                   </li>
                                   <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('profile.listRose')); ?>">
                                        <i class="fas fa-list"></i>
                                        <p>  Danh sách hoa hồng</p>
                                      </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('profile.listMember')); ?>">
                                        <i class="fas fa-user-friends"></i>
                                       <p> Danh sách thành viên</p>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('profile.createMember')); ?>">
                                        <i class="fas fa-user-plus"></i>
                                       <p> Thêm thành viên</p>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('profile.editPassWord')); ?>">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Thay đổi mật khẩu</p>
                                    </a>
                                 </li>
                                 
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('profile.history')); ?>">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Lịch sử mua hàng</p>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link js_doihang" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Đổi trả hàng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('profile.pointThuongPhat')); ?>">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Điểm thưởng phạt</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('profile.history-draw-point')); ?>">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Lịch sử rút điểm</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('logout')); ?>" onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Thoát tài khoản</p>
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="GET" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                 </li>
                                </ul>
                             </nav>
                             
                            <?php if(($user->type == 2 && $user->chuc_danh == 4) || $user->type == 3 || $user->point_sale == 0): ?>
                                
                            <?php else: ?>
                            
                            <div class="alert alert-success mt-4 hidden-scroll " style="overflow: auto;">
                                <input type="text" value="<?php echo e(route('profile.register-referral.create',['code'=>$user->code])); ?>" id="myInput" style="background-color: transparent; border:unset;">
                            </div>

                            <button class="btn btn-info btn-coppy-link" onclick="myFunction()">Copy link</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>

        </div>


        <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery-3.2.1.min.js')); ?> "></script>

    <script type="text/javascript" src="<?php echo e(asset('lib/lightbox-plus/js/lightbox-plus-jquery.min.js')); ?>"></script>

    <!-- Bootstrap 4 -->
    <script type="text/javascript" src="<?php echo e(asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/wow/js/wow.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/slick-1.8.1/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/sweetalert2/js/sweetalert2.all.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/components/js/Cart.js')); ?>"></script>
    <script>
        $(document).on('click','.dropdown-toggle', function(){
            $(this).addClass('show');
            $('.dropdown-menu').addClass('show');
        })
        $(document).on('click','.dropdown-toggle.show', function(){
            $(this).removeClass('show');
            $('.dropdown-menu').removeClass('show');
        })
    </script>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
         //   alert("Copied the text: " + copyText.value);
        }

        $('.js_doihang').click(function(){
            $('#modal_doihang').modal('show');
        });

    </script>
    <?php echo $__env->yieldContent('js'); ?>

</body>

</html>
<?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/layouts/main-profile.blade.php ENDPATH**/ ?>