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

            <div class="wrap-content-main wrap-template-product template-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <?php if(isset($dataProduct)): ?>
                                <?php if($dataProduct): ?>
                                    <?php if($dataProduct->count()): ?>
                                    <h3 class="title-template">Kết quả tìm kiếm </h3>
                                    <div class="wrap-list-product">
                                        <div class="list-product-card">
                                            <div class="row">
                                                <?php $__currentLoopData = $dataProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $tran=$product->translationsLanguage()->first();
                                                    $link=$product->slug_full;
                                                ?>
                                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e($link); ?>">
                                                                    <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($tran->name); ?>">
                                                                    <?php if($product->sale): ?>
                                                                    <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h3>
                                                                    <a href="<?php echo e($link); ?>">
                                                                       <?php echo e($tran->name); ?>

                                                                    </a>
                                                                </h3>
                                                                <div class="box-price">
                                                                    <?php if($product->price_after_sale): ?>
                                                                    <span><?php echo e(number_format($product->price_after_sale)); ?> vnđ</span>
                                                                    <?php else: ?>
                                                                    <span>Liên hệ</span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php if(count($dataProduct)): ?>
                                            <?php echo e($dataProduct->links()); ?>

                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/nabei.vn/httpdocs/resources/views/frontend/pages/search.blade.php ENDPATH**/ ?>