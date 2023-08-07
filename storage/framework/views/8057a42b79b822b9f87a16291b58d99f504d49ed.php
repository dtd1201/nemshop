
    <div class="menu_fix_mobile">
        <div class="close-menu">
            <a href="javascript:;" id="close-menu-button">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
        <ul class="nav-main">
            <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/')); ?>"><span>Trang chủ</span></a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(URL::to('/gioi-thieu.html')); ?>"> <span>Giới thiệu</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(URL::to('/product/category-product/76-dich-vu')); ?>"> <span>Dịch vụ</span></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item"><a href="<?php echo e(URL::to('/product/category-product/79-dich-vu-logistic')); ?>"> Dịch vụ LOGISTIC</a></li>
                    <li class="nav-sub-item"><a href="<?php echo e(URL::to('/product/category-product/80-dich-vu-van-chuyen')); ?>"> Dịch vụ vận chuyển</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(URL::to('/post/category-post/21-tin-tuc')); ?>"><span>Tin tức</span></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item"><a href="<?php echo e(URL::to('/post/category-post/37-tin-tuc-noi-bat')); ?>">Tin tức nổi bật</a></li>
                    <li class="nav-sub-item"><a href="<?php echo e(URL::to('/post/category-post/38-tin-tuc-moi')); ?>">Tin tức mới</a></li>
                </ul>
            </li>

            <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/tuyen-dung.html')); ?>"><span>Tuyển dụng</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/lien-he.html')); ?>"><span>Liên hệ</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/bao-gia.html')); ?>"><span>Báo giá/Hợp tác</span></a></li>
        </ul>
    </div>

    <div id="header" class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="box-header-top">
                            <div class="box-social-header-top">
                                <div class="box-info">
                                    <ul>
                                        <li><a href="tel:<?php echo e($header['hotline']->value); ?>" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> Hotline: <strong><?php echo e($header["hotline"]->value); ?></strong></a></li>
                                        <li class="hidden-xs">
                                            <span id="current_day"></span> | <span id="time"></span>
                                        </li>
                                        <li class="hidden-xs hidden-sm hidden-md" id="hours"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="language_mobile">
                                <a class="language_selected_mb" href="javascript:;">
                                    <img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ">Tiếng Việt<i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <div class="language_change_mb">
                                    <a href="<?php echo e(URL::to('/')); ?>"><img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ">Tiếng Hàn</a>
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
                    <div class="hotline-mobile hidden-lg">
                        <a href="<?php echo e($header['hotline']->slug); ?>"><?php echo e($header["hotline"]->value); ?></a>
                    </div>
                    <div class="menu menu-desktop">
                        <ul class="nav-main">
                            <?php echo $__env->make('frontend.components.menu',[
                                'limit'=>7,
                                'icon_d'=>'<i class="fa fa-angle-down"></i>',
                                'icon_r'=>"<i class='fa fa-angle-right'></i>",
                                'data'=>$header['menu'],
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <li class="nav-item lang">
                                <a class="language_selected" href="javascript:;"> <img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ">Tiếng Việt<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <div class="language_change">
                                    <a href="<?php echo e(URL::to('/')); ?>"><img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ">Tiếng Hàn</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function myTimer(){
            // Khai báo đối tượng today
            var today = new Date();
            // Lấy số thứ tự của ngày hiện tại
            var current_day = today.getDay();
             
            // Biến lưu tên của thứ
            var day_name = '';

            var minustesin = today.getMinutes();

            var hoursin = today.getHours();

            if (minustesin < 10) {
                minustesin = "0" + minustesin;
            }

            if (hoursin < 10) {
                hoursin = "0" + hoursin;
            }

            // Lấy số thứ tự của ngày hiện tại
            var hours = hoursin +':'+ minustesin;

            // Lấy ngày hiện tại
            var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();

            // Gán lại value vào id time
            document.getElementById("time").innerHTML = date;

            document.getElementById("hours").innerHTML = hours;
            // Lấy tên thứ của ngày hiện tại
            switch (current_day) {
            case 0:
                day_name = "Chủ nhật";
                break;
            case 1:
                day_name = "Thứ hai";
                break;
            case 2:
                day_name = "Thứ ba";
                break;
            case 3:
                day_name = "Thứ tư";
                break;
            case 4:
                day_name = "Thứ năm";
                break;
            case 5:
                day_name = "Thứ sáu";
                break;
            case 6:
                day_name = "Thứ bảy";
            }
            
            document.getElementById("current_day").innerHTML = day_name;
        }
        

        var myVar = setInterval(myTimer, 1000);
    </script>
<?php /**PATH /var/www/vhosts/vision.vsscorp.vn/httpdocs/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>