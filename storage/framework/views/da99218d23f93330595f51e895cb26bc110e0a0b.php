<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php echo $__env->make('frontend.components.breadcrumbs',[
                'breadcrumbs'=>$breadcrumbs,
                'breadcrumbs'=>$breadcrumbs,
                'type'=>$typeBreadcrumb,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="blog-about-us">

                <div class="wrap-about-us">
                    <div class="container">
                        <div class="row d-flex before-after-unset">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="about-text">
                                    <div class="group-title">
                                        <div class="title title-red text-left">
                                            <?php echo e($about_us->name); ?>

                                        </div>
                                    </div>
                                    <div class="desc-about">
                                       <?php echo $about_us->content; ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="image-about-us">
                                    <img src="<?php echo e($about_us->avatar_path); ?>" alt="<?php echo e($about_us->name); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-tam-nhin" style="background-image: url(<?php echo e($bgtamnhin->avatar_path); ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box-tam-nhin">

                                    <?php if(isset($tamnhin)): ?>
                                    <?php $__currentLoopData = $tamnhin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item-tam-nhin wow <?php echo e($item->description); ?>" data-wow-duration="0.5s" data-wow-delay="0.3s">
                                        <div class="title-tam-nhin">
                                            <img src="<?php echo e($item->avatar_path); ?>" alt="<?php echo e($item->name); ?>"><?php echo e($item->name); ?>

                                        </div>
                                        <div class="desc">
                                            <?php echo $item->content; ?>

                                        </div>
                                        <div class="line-tam-nhin"></div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-ls">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="group-title">
                                    <div class="title title-red text-center">
                                        <?php echo e($history->name); ?>

                                    </div>
                                </div>
                                <div class="slider slider-single slide-ls">
                                    <?php if(isset($historyList)): ?>
                                    <?php $__currentLoopData = $historyList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item-ls">
                                        <div class="row">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="image-ls">
                                                    <img src="<?php echo e($item->avatar_path); ?>" alt="<?php echo e($item->name); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="ls-text">
                                                    <div class="title-ls"><?php echo e($item->name); ?></div>
                                                    <div class="desc-ls">
                                                        <?php echo $item->content; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                                <div class="bg-line"></div>

                                <div class="slider slider-nav slide-ls-sm cate-arrows-1 cate-arrows-1-sm">
                                    <?php if(isset($historyList)): ?>
                                    <?php $__currentLoopData = $historyList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item-ls-sm">
                                        <div class="box">
                                            <?php echo e($item->description); ?>

                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="wrap-partner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="group-title">
                                    <h3 class="title title-while text-left"><?php echo e(__('about-us.doi_tac_chien_luoc')); ?></h3>
                                </div>
                                <div class="list-item autoplay3-doitac cate-dot-1  cate-dot-while-1 cate-arrows-1">

                                    <?php if(isset($partner)): ?>
                                    <?php $__currentLoopData = $partner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <div class="box">
                                            <a href="<?php echo e($item->slug); ?>">
                                                <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.slider-single').slick({
                slidesToShow: 1,
                autoplay: true,
                slidesToScroll: 1,
                arrows: false,
                dot: false,

                fade: false, //lam phai màu mờ dần
                adaptiveHeight: true,
                autoplaySpeed: 3000, // default 3000 tu dong chay sau 2000milisecon
                infinite: true,
                useTransform: true,
                speed: 400,
                cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',

            });

            $('.slider-nav')
                .on('init', function(event, slick) {
                    $('.slider-nav .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: 9,
                    slidesToScroll: 1,
                    dots: false,
                    focusOnSelect: false,
                    infinite: true,
                    arrows: true,
                    center: true,
                    autoplay: false,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 6,
                        }
                    }, {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 4,
                        }
                    }, {
                        breakpoint: 420,
                        settings: {
                            slidesToShow: 3,
                        }
                    }],
                });
            $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
                $('.slider-nav').slick('slickGoTo', currentSlide);
                var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
                $('.slider-nav .slick-slide.is-active').removeClass('is-active');
                $(currrentNavSlideElem).addClass('is-active');
            });
            $('.slider-nav').on('click', '.slick-slide', function(event) {
                event.preventDefault();
                var goToSingleSlide = $(this).data('slick-index');
                $('.slider-single').slick('slickGoTo', goToSingleSlide);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/pages/about-us.blade.php ENDPATH**/ ?>