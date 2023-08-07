<div class="menu_fix_mobile">
    <div class="close-menu">
        <!-- <div class="logo_menu">
            <img class="logo-desk" src="{linkhost}/upload/images/{banner_top}">
        </div> -->
        <a href="javascript:;" id="close-menu-button">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
    <ul class="nav-main">

        <?php echo $__env->make('frontend.components.menu',[
            'limit'=>4,
            'icon_d'=>'<i class="fas fa-chevron-down mn-icon"></i>',
            'icon_r'=>'<i class="fas fa-chevron-down mn-icon"></i>',
            'data'=>$header['menu'],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
</div>
<div id="header" class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box-header-top">
                        <div class="box-social-header-top">
                            <div class="box-info ">
                                <ul>
                                    <li><a href="tel:<?php echo e($header["hotline"]->slug); ?>" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e($header["hotline"]->value); ?></a></li>
                                    <li class="d-none  d-md-block"><a href="mailto:<?php echo e($header["email"]->slug); ?>" class="email"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo e($header["email"]->value); ?></a></li>
                                    <li class="d-none  d-lg-block"><a href="<?php echo e($header["address"]->slug); ?>" class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($header["address"]->value); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-social-header-top">
                            <div class="group-social">
                                <ul>
                                    <?php $__currentLoopData = $header["socialParent"]->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="social-item"><a href="<?php echo e($social->slug); ?>"><?php echo $social->value; ?> </a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="box-header-main">
                <div class="list-bar">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <div class="logo-head">
                    <div class="image">
                        <a href="<?php echo e(makeLink('home')); ?>"><img src="<?php echo e($header["logo"]->image_path); ?>"></a>
                    </div>
                </div>
                <div class="menu menu-desktop">
                    <?php echo $__env->make('frontend.components.menu',[
                        'limit'=>4,
                        'icon_d'=>'<i class="fas fa-chevron-down"></i>',
                        'icon_r'=>"<i class='fas fa-angle-right'></i>",
                        'data'=>$header['menu'],
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                        

                </div>
                <div class="search" id="search">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form_search" id="form1" name="form1" method="get" action="<?php echo e(makeLink('search')); ?>">
                                    <input class="form-control" type="text" name="keyword" placeholder="Nhập từ khóa" required="">
                                    <button class="form-control" type="submit" name="gone22" id="gone22"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    <button class="form-control close-search" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-header-main-right">
                    <ul>
                        <li class="icon-search show_search"><a><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li class="cart">
                            <a href="<?php echo e(route("cart.list")); ?>"><img src="<?php echo e(asset('frontend/images/bag.png')); ?>" alt="bag"><span class="number-cart"><?php echo e($header['totalQuantity']); ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>