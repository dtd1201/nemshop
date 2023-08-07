
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
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                <a class="language_selected" href="javascript:;"> <img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ">
                                    <?php if(isset($langConfig[App::getLocale()])&&$langConfig[App::getLocale()]): ?>
                                        <?php echo e($langConfig[App::getLocale()]['name']); ?>

                                     <?php endif; ?>
                                <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <div class="language_change_mb">
                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key!=App::getLocale()): ?>
                                    <a href="<?php echo e(route('language.index',$key)); ?>"><img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ"><?php echo e($value['name']); ?></a>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                <a class="language_selected" href="javascript:;"> <img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ">
                                    <?php if(isset($langConfig[App::getLocale()])&&$langConfig[App::getLocale()]): ?>
                                        <?php echo e($langConfig[App::getLocale()]['name']); ?>

                                     <?php endif; ?>
                                <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <div class="language_change">
                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key!=App::getLocale()): ?>
                                    <a href="<?php echo e(route('language.index',$key)); ?>"><img src="<?php echo e(asset('/frontend/images/globe.png')); ?>" alt="Ngôn ngữ"><?php echo e($value['name']); ?></a>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                day_name = "<?php echo e(__('header.cn')); ?>";
                break;
            case 1:
                day_name = "<?php echo e(__('header.t2')); ?>";
                break;
            case 2:
                day_name = "<?php echo e(__('header.t3')); ?>";
                break;
            case 3:
                day_name = "<?php echo e(__('header.t4')); ?>";
                break;
            case 4:
                day_name = "<?php echo e(__('header.t5')); ?>";
                break;
            case 5:
                day_name = "<?php echo e(__('header.t6')); ?>";
                break;
            case 6:
                day_name = "<?php echo e(__('header.t7')); ?>";
            }

            document.getElementById("current_day").innerHTML = day_name;
        }

        var myVar = setInterval(myTimer, 1000);
    </script>

<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>