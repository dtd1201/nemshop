
    <div class="menu_fix_mobile">
        <div class="close-menu">
            <a href="javascript:;" id="close-menu-button">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>

        <?php echo $__env->make('frontend.components.menu',[
            'limit'=>4,
            'icon_d'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'icon_r'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'data'=>$header['menu'],
            'active'=>false
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div id="header" class="header">

        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header-top">
                            <div class="box-social-header-top">
                                <div class="box-info   d-none d-lg-block">
                                    <ul>
                                        <li><a href="" class="phone">
                                            <strong><?php echo e($header['title']->value); ?></strong></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-social-header-top">
                                <div class="box-info hidden-xs hidden-sm">
                                    <ul>
                                        <li><a href="tel:<?php echo e($header['hotline']->value); ?>" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> Hotline: <strong><?php echo e($header["hotline"]->value); ?></strong></a></li>
                                        <li class=" mr-0 d-none d-sm-block"><a href="mailto:<?php echo e($header['email']->value); ?>" class="phone"><i class="fas fa-envelope"></i> Email: <strong><?php echo e($header["email"]->value); ?></strong></a></li>
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
                            <a href="<?php echo e(makeLink('home')); ?>"><img src="<?php echo e($header['logo']->image_path); ?>"></a>
                        </div>
                    </div>
                    <div class="wrap-search-header-main  d-none d-xl-block">
                        <div class="box-search-header-main">
                            <div class="dropdown">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                  Dropdown button
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">Link 1</a>
                                  <a class="dropdown-item" href="#">Link 2</a>
                                  <a class="dropdown-item" href="#">Link 3</a>
                                </div>
                            </div>
                            <div class="search-header">
                                <form id="form1" name="form1" method="POST" action="<?php echo e(makeLink('search')); ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" name="gone22" id="gone22" type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                   <div class="compare">
                        <ul>
                            <li>
                                <a href="">
                                    <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg>
                                    <span>Compare</span>
                                </a>
                            </li>
                        </ul>
                   </div>
                    <div class="box-header-main-right">
                        <ul>
                            <li class="icon-search show_search d-xl-none"><a><i class="fas fa-search"></i></a></li>
                            <li class="cart">
                                <a href="<?php echo e(route("cart.list")); ?>">

                                    
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                                        <g>
                                        <g id="Bag">
                                        <g>
                                        <path d="M27.996,8.91C27.949,8.395,27.519,8,27,8h-5V6c0-3.309-2.69-6-6-6c-3.309,0-6,2.691-6,6v2H5
                                        C4.482,8,4.051,8.395,4.004,8.91l-2,22c-0.025,0.279,0.068,0.557,0.258,0.764C2.451,31.882,2.719,32,3,32h26
                                        c0.281,0,0.549-0.118,0.738-0.326c0.188-0.207,0.283-0.484,0.258-0.764L27.996,8.91z M12,6c0-2.206,1.795-4,4-4s4,1.794,4,4v2h-8
                                        V6z M4.096,30l1.817-20H10v2.277C9.404,12.624,9,13.262,9,14c0,1.104,0.896,2,2,2s2-0.896,2-2c0-0.738-0.404-1.376-1-1.723V10h8
                                        v2.277c-0.596,0.347-1,0.984-1,1.723c0,1.104,0.896,2,2,2c1.104,0,2-0.896,2-2c0-0.738-0.403-1.376-1-1.723V10h4.087l1.817,20
                                        H4.096z"></path>
                                       </svg>
                                    <span class="number-cart"><?php echo e($header['totalQuantity']); ?></span></a> <span class="d-none d-xl-inline-block">Giỏ hàng</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header-bottom">
                            <div class="dropdown">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                                    Shop by Category <i class="fas fa-chevron-circle-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#"><i class="fas fa-angle-right"></i> Link 1</a>
                                  <a class="dropdown-item" href="#"><i class="fas fa-angle-right"></i> Link 2</a>
                                  <a class="dropdown-item" href="#"><i class="fas fa-angle-right"></i> Link 3</a>
                                </div>
                              </div>
                            <div class="menu menu-desktop">

                                    <?php echo $__env->make('frontend.components.menu',[
                                        'limit'=>7,
                                        'icon_d'=>'<i class="fa fa-angle-down"></i>',
                                        'icon_r'=>"<i class='fa fa-angle-right'></i>",
                                        'data'=>$header['menu'],
                                        'active'=>true
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div  id="search">
            <div class="wrap-search-header-main  search-mobile" >
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box-search-header-main">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Dropdown button
                                    </button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Link 1</a>
                                    <a class="dropdown-item" href="#">Link 2</a>
                                    <a class="dropdown-item" href="#">Link 3</a>
                                    </div>
                                </div>
                                <div class="search-header">
                                    <form id="form1" name="form1" method="POST" action="<?php echo e(makeLink('search')); ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" name="gone22" id="gone22" type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button class="form-control close-search" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>

            </div>
        </div>
    </div>


<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\mayphotophuson.vn\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>