<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                <?php echo $__env->make('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            

            <div class="blog-product-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="group-title">
                                <div class="title title-red">
                                   <?php echo e(__('product-detail.danh_muc_cac_dich_vu')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-tab-service"
                style="background-image: url('<?php echo e(asset('/frontend/images/bg-sv.png')); ?>'">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs d-flex before-after-unset justify-center" role="tablist">
                                        <?php if(isset($categoryAll)): ?>
                                        <?php $__currentLoopData = $categoryAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li role="presentation" class="
                                            <?php if($item->id == $data->id): ?>
                                                active
                                            <?php endif; ?>
                                        ">
                                            <a href="#tab_<?php echo e($item->id); ?>" data-toggle="tab">
                                                <div class="icon-tab">
                                                    <img src="<?php echo e($item->avatar_path); ?>" alt="<?php echo e($item->name); ?>">
                                                </div>
                                            </a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                    <!-- Tab panes -->

                                    <div class="tab-content">
                                        <?php if(isset($categoryAll)): ?>
                                        <?php $__currentLoopData = $categoryAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div role="tabpanel" class="tab-pane fade
                                            <?php if($item->id == $data->id): ?>
                                                active in
                                            <?php endif; ?>

                                        " id="tab_<?php echo e($item->id); ?>">
                                            <h3 class="title-service-tab text-center">
                                                <?php echo e(__('product-detail.thong_tin_chi_tiet')); ?>

                                            </h3>
                                            <h4 class="title-service-tab-sm text-center"><?php echo e($item->name); ?></h4>
                                            <div class="desc-tab">
                                                <?php echo $item->content; ?>

                                            </div>
                                            <div class="tuvan_ct">
                                                <a href="<?php echo e(makeLinkToLanguage('bao-gia',null,null,App::getLocale())); ?>" class="btn-view"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo e(__('product-detail.nhan_tu_van')); ?></a>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.autoplay1').slick({
                dots: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                speed: 300,
                autoplaySpeed: 3000,
            });
            $('.column').click(function() {
                var src = $(this).find('img').attr('src');
                $(".hrefImg").attr("href", src);
                $("#expandedImg").attr("src", src);
            });
            $('.slide_small').slick({
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                }]
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>