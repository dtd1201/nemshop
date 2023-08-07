<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
<style>
    .tab-content{
        display: none;
    }
    .tab-content.current{
        display: block;
    }
</style>
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
                        <div class="box_content" id="wrapSizeChange">
                            <div class="content-news">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12 col-12">
                                        <div class="content_mucluc">
                                            <div class="title_mucluc">
                                                <i class="fas fa-list"></i>
                                                <span>Giới thiệu Thuốc Tốt 365</span>
                                            </div>
                                            <div class="box-link-paragraph">
                                                <ul>
                                                    <?php if(isset($about_us) && $about_us): ?>
                                                        <?php $__currentLoopData = $about_us->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li >
                                                                <h2>
                                                                    <a data-tab="listTab<?php echo e($post->id); ?>" class="scrollLink tab-li <?php if($loop->first): ?> active <?php endif; ?>"><i class="fa fa-doc"></i>
                                                                        <?php echo e($post->name); ?></a>
                                                                </h2>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-12 col-12">
                                        <div class="list-content-paragraph">
                                            <div>
                                                <?php if(isset($about_us) && $about_us): ?>
                                                    <?php $__currentLoopData = $about_us->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="tab-content listTab<?php echo e($post->id); ?> <?php if($loop->first): ?> current <?php endif; ?>">
                                                        <div class="name-p"><?php echo e($post->name); ?></div>
                                                        <div class="content-p">
                                                            <?php echo $post->content; ?>

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
                
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(function() {
            $(document).on('click', '.tab-li', function() {
                //tab
                var tab_id = $(this).attr('data-tab');

                var el = $("#" + tab_id);
                $('.tab-li').removeClass('active');
                $(this).addClass('active');
                $('.tab-content').removeClass('current');

                $("." + tab_id).addClass('current');
            });
        });



        // $(function() {
        //     $('.slider-single').slick({
        //         slidesToShow: 1,
        //         autoplay: true,
        //         slidesToScroll: 1,
        //         arrows: false,
        //         dot: false,

        //         fade: false, //lam phai màu mờ dần
        //         adaptiveHeight: true,
        //         autoplaySpeed: 3000, // default 3000 tu dong chay sau 2000milisecon
        //         infinite: true,
        //         useTransform: true,
        //         speed: 400,
        //         cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',

        //     });

        //     $('.slider-nav')
        //         .on('init', function(event, slick) {
        //             $('.slider-nav .slick-slide.slick-current').addClass('is-active');
        //         })
        //         .slick({
        //             slidesToShow: 9,
        //             slidesToScroll: 1,
        //             dots: false,
        //             focusOnSelect: false,
        //             infinite: true,
        //             arrows: true,
        //             center: true,
        //             autoplay: false,
        //             responsive: [{
        //                 breakpoint: 1024,
        //                 settings: {
        //                     slidesToShow: 6,
        //                 }
        //             }, {
        //                 breakpoint: 640,
        //                 settings: {
        //                     slidesToShow: 4,
        //                 }
        //             }, {
        //                 breakpoint: 420,
        //                 settings: {
        //                     slidesToShow: 3,
        //                 }
        //             }],
        //         });
        //     $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
        //         $('.slider-nav').slick('slickGoTo', currentSlide);
        //         var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
        //         $('.slider-nav .slick-slide.is-active').removeClass('is-active');
        //         $(currrentNavSlideElem).addClass('is-active');
        //     });
        //     $('.slider-nav').on('click', '.slick-slide', function(event) {
        //         event.preventDefault();
        //         var goToSingleSlide = $(this).data('slick-index');
        //         $('.slider-single').slick('slickGoTo', goToSingleSlide);
        //     });
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo5.tiemthietke.com/httpdocs/resources/views/frontend/pages/about-us.blade.php ENDPATH**/ ?>