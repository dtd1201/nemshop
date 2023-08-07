<?php $__env->startSection('title', 'VISION SHIPPING'); ?>

<?php $__env->startSection('image', 'http://vision.vsscorp.vn/frontend/images/logo.jpg'); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <!-- <h1 class="d-none">
                {h1trangchu}
            </h1>
            <h2 class="d-none">
                {h2trangchu}
            </h2> -->

            <div class="wrap-slide-home">
                <div class="slide">
                    <?php if(isset($slider)): ?>
                    <div class="box-slide faded cate-arrows-1">
                        <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-slide">
                            <a href=""><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="wrap-service">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-left">
                                <a href="<?php echo e(URL::to('/')); ?>" class="link-service">Trang chủ <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </div>
                            <div class="row pd-10">
                                <div class="col-md-3 col-xs-6 text-service">
                                    <div class="title-service">
                                        Dịch vụ <br> chính
                                    </div>
                                    <a class="service-view" href="<?php echo e(URL::to('/product/category-product/76-dich-vu')); ?>">
                                        Xem tất cả
                                    </a>
                                </div>
                                <?php if(isset($listCategoryHome)): ?>
                                <?php $__currentLoopData = $listCategoryHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 col-xs-6 col-service-item">
                                    <div class="service-item">
                                        <div class="box">
                                            <div class="image">
                                                <img src="<?php echo e($category->avatar_path); ?>" alt="<?php echo e($category->name); ?>">
                                            </div>
                                            <div class="name">
                                                <a href="<?php echo e($category->slug_full); ?>">
                                                    <span><?php echo e($category->name); ?></span>
                                                    <div class="icon-dv-right">
                                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                
                                <?php if(isset($listCategoryHome2)): ?>
                                <?php $__currentLoopData = $listCategoryHome2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 col-xs-6  col-service-item">
                                    <div class="service-item">
                                        <div class="box">
                                            <div class="image">
                                                <img src="<?php echo e($category->image_path); ?>" alt="<?php echo e($category->name); ?>">
                                            </div>
                                            <div class="name">
                                                <a href="<?php echo e(URL::to('/product/category-product/80-dich-vu-van-chuyen')); ?>">
                                                    <span><?php echo e($category->name); ?></span>
                                                    <div class="icon-dv-right">
                                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap-system">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="group-title">
                                <div class="title">
                                    <?php echo e($system->name); ?>

                                </div>
                            </div>
                            <div class="wrap-system">
                                <div class="box-system">
                                    <div class="image-sytem">
                                        <img src="<?php echo e(asset($system->image_path)); ?>" alt="<?php echo e($system->name); ?>">
                                    </div>
                                    <div class="list-icon">
                                        <?php if(isset($systemChilds)): ?>
                                        <?php $__currentLoopData = $systemChilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span style="<?php echo e($system_item->value); ?>" data-icon="map" data-image="<?php echo e(asset($system_item->image_path)); ?>"></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="bg-image-load">
                                        <div class="image-load">
                                            <div class="box-image-load">
                                                <img src="" alt="map">
                                                <span class="close-map" data-icon="close"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="text-center">
                                <a href="<?php echo e(URL::to('/bao-gia.html')); ?>" class="btn-view"><i class="fa fa-paper-plane" aria-hidden="true"></i> Nhận tư vấn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(function() {
                    $(document).on("click", "[data-icon='map']", function() {
                        let src = $(this).attr('data-image');
                        $(this).addClass("active");
                        $(".bg-image-load").addClass("active");
                        $(".bg-image-load img").attr("src", src);
                    });
                    $(document).on("click", "[data-icon='close']", function() {
                        $(".bg-image-load").removeClass("active");
                        $("[data-icon='map']").removeClass("active");
                    });
                });
            </script>

            <div class="wrap-count">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="group-title">
                                <div class="title title-red">
                                    <?php echo e($aboutTitle->value); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 image-about">
                                    <div class="image">
                                        <img src="<?php echo e(asset($aboutTitle->image_path)); ?>" alt="<?php echo e($aboutTitle->value); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="list_count" id="counter">
                                        <div class="row">
                                            <?php if(isset($aboutList)): ?>
                                            <?php $__currentLoopData = $aboutList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="item_count">
                                                    <div class="box_count">
                                                        <div class="counter-value number_ok" data-count="<?php echo e($about_item->value); ?>" data-unit="+"></div>
                                                        <p><?php echo e($about_item->name); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="link_about">
                                        <a href="<?php echo e(URL::to('/gioi-thieu.html')); ?>">
                                            Xem tất cả
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                $(document).ready(function() {
                    var a = 0;
                    var ooTop = $('#counter').offset().top - window.innerHeight;
                    if (ooTop < 0) {
                        $('.counter-value').each(function() {
                            var $this = $(this);
                            let unit = $this.attr("data-unit") + "";
                            let data_count = parseInt($this.attr("data-count"));
                            $({
                                countNum: 0
                            }).animate({
                                countNum: data_count
                            }, {
                                duration: 4000,
                                easing: 'swing',
                                step: function() {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function() {
                                    $this.text(this.countNum + unit);
                                }
                            });
                        });
                        a = 1;
                    }

                    $(window).scroll(function() {
                        var ooTop = $('#counter').offset().top - window.innerHeight;
                        if (a == 0 && $(window).scrollTop() > ooTop) {
                            $('.counter-value').each(function() {

                                var $this = $(this);
                                let unit = $this.attr("data-unit") + "";
                                let data_count = parseInt($this.attr("data-count"));
                                $({
                                    countNum: 0
                                }).animate({
                                    countNum: data_count
                                }, {
                                    duration: 4000,
                                    easing: 'swing',
                                    step: function() {
                                        $this.text(Math.floor(this.countNum));
                                    },
                                    complete: function() {
                                        $this.text(this.countNum + unit);
                                    }
                                });
                            });
                            a = 1;
                        }
                    });
                });
            </script>

            <div class="wrap-news-home wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="group-title">
                                <div class="title text-left title-red">
                                    Tin tức mới
                                    <a href="<?php echo e(URL::to('/post/category-post/38-tin-tuc-moi')); ?>" class="title-xemthem">Xem thêm</a>
                                </div>
                            </div>
                            <?php if(isset($postNew)): ?>
                            <div class="list-news-home autoplay3-news cate-dot-1 cate-arrows-1">
                                <?php $__currentLoopData = $postNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="fo-03-news col-xs-12 col-sm-6 col-md-3">
                                    <div class="box">
                                        <div class="image">
                                            <a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>">
                                                <img src="<?php echo e(asset($post_item->avatar_path)); ?>" alt="<?php echo e($post_item->name); ?>">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h3><a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>"><?php echo e($post_item->name); ?></a></h3>
                                            <div class="desc">
                                                <?php echo e($post_item->description); ?>

                                            </div>
                                            <div class="text-center">
                                                <a class="service-view" href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>">
                                                    Xem thêm
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/vision.vsscorp.vn/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>