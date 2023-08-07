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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/slick/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/slick-1.8.1/slick/slick-theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/stylesheet.css')); ?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="lb-wrap-content-main d-flex align-items-start justify-content-between">
                    <div class="lb_sidebar">
                        <div class="lb_admin d-flex align-items-center justify-content-start">
                            <div class="lb_icon ">
                                <img class="rounded-circle" src="<?php echo e(asset('images/username.png')); ?>" alt="user">
                            </div>
                            <div class="lb_username ml-2">
                                Phan văn Tân
                            </div>
                        </div>
                        <ul class="lb-list-sidebar">
                            <li class="lb-sidebar-item">
                                <a href="">Danh mục sản phẩm</a>
                                <ul class="lb-sidebar-sub">
                                    <li class="lb-sidebar-sub-item"><a href="">Thể loại 1</a>
                                        <ul class="lb-sidebar-sub-child">
                                            <li><a href="">Thể loại con 1</a></li>
                                            <li><a href="">Thể loại con 1</a></li>
                                            <li><a href="">Thể loại con 1</a></li>
                                        </ul>
                                    </li>
                                    <li class="lb-sidebar-sub-item"><a href="">Thể loại 1</a></li>
                                    <li class="lb-sidebar-sub-item"><a href="">Thể loại 1</a></li>
                                    <li class="lb-sidebar-sub-item"><a href="">Thể loại 1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                
                    <div class="lb-content-main">
                        <header class="lb-header">
                            <div class="lb-nav-main">
                                <div class="lb-menu">
                                    <div class="lb-icon-menu"> <img src="<?php echo e(asset('images/menu.png')); ?>" alt=""></div>
                                   
                                </div>
                                <ul class="lb-list-navbar">
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                                <div class="lb-search">
                                    <form>
                                     
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Nhập keyword">
                                          <div class="input-group-append">
                                            <span class="input-group-text">search</span>
                                          </div>
                                        </div>
                                      </form>
                                </div>
                            </div>
                        </header>
                        <div class="lb-content">
                        <div class="lb-control mb-3">
                           <?php echo $__env->yieldContent('control'); ?>
                        </div>
                        <div class="lb-list-item">
                            <?php echo $__env->yieldContent('contentmain'); ?>
                        </div>
                        </div>
                        <footer class="lb-footer">

                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery-3.2.1.min.js')); ?> "></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/slick-1.8.1/slick/slick.min.js')); ?>"></script>
    <script>
        $(function(){
            $(".lb-sidebar-sub").each(function(){
                let lengm1=$(this).find("li").length;
                
                if(lengm1){
                    $(this).prev("a").append("<i class='fas fa-chevron-down lb-sidebar-icon-m1'></i>");
                }
            });
            $(".lb-sidebar-sub-child").each(function(){
                let lengm2=$(this).find("li")
               if(lengm2) {
                    $(this).prev("a").append("<i class='fas fa-chevron-down lb-sidebar-icon-m2'></i>");
                }
            })
            $(".lb-sidebar-icon-m1").click(function(){
                event.preventDefault();
                $(this).parent("a").next(".lb-sidebar-sub").slideToggle();
            })
            $(".lb-sidebar-icon-m2").click(function(){
                event.preventDefault();
                $(this).parent("a").next(".lb-sidebar-sub-child").slideToggle();
            })


            //js reset form
            // $("input[type='reset']").click(function(){
            //     alert("a");
            //     $(".contentmain").find("input[type='text']").each(function(){
            //         $(this).attr("value","");
            //     })
            // })
            // end reset form
        })
    </script>
    
</body>

</html><?php /**PATH C:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/master/main.blade.php ENDPATH**/ ?>