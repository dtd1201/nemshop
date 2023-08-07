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

             <div class="wrap-content-main wrap-template-product-detail template-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- START BLOCK : chitiet -->
                            <div class="wrap-top">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                <div class="product-detail-left-content">
                                                    <div class="image">
                                                        <a class="hrefImg" href="<?php echo e(asset($data->avatar_path)); ?>" data-lightbox="image"><img id="expandedImg" src="<?php echo e(asset($data->avatar_path)); ?>"></a>
                                                        <?php if($data->sale): ?>
                                                        <?php echo e($data->sale." %"); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="list-image-small">
                                                        <div class="slider slide_small">
                                                           <?php $__currentLoopData = $data->getImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <div class="column">
                                                                 <img src="<?php echo e(asset($image->image_path)); ?>" alt="{name}">
                                                            </div>
                                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-12 col-sm-12">
                                                <div class="product-information">
                                                    <h1 class="name-product"><?php echo e($data->name); ?></h1>
                                                    <div class="box-price-detail">
                                                        <span class="new-price"><?php echo e($data->price." ".$unit); ?></span>
                                                        <div class="desc-price"><?php echo e(( $data->sale? $data->price*(100- $data->sale)/100:$data->price) ." ".$unit); ?></div>
                                                    </div>
                                                    <div class="gioi_thieu">
                                                        <?php echo $data->description; ?>

                                                    </div>

                                                    <div class="product-action">
                                                        <div class="list-btn-action clearfix">
                                                           <a class="btn-add-cart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $data->id,])); ?>">Thêm Vào Giỏ Hàng</a>
                                                           <a class="btn-buynow addnow" href="<?php echo e(route('cart.buy',['id' => $data->id,])); ?>">Mua Ngay</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="wrap-tab-product-detail tab-category-1">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <!-- <div class="title">Daily Deals</div> -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Chi tiết sản phẩm</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active show" id="tab-1">
                                            <div class="tab-text">
                                               <?php echo $data->content; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END BLOCK : chitiet -->
                            <div class="product-relate">
                                <div class="title-1">Sản phẩm liên quan</div>
                                <?php if(isset($dataRelate)): ?>
                                    <?php if($dataRelate->count()): ?>
                                        <div class="list-product-card autoplay4">
                                            <!-- START BLOCK : cungloai -->
                                                <?php $__currentLoopData = $dataRelate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-12">
                                                        <div class="product-card">
                                                            <div class="box">
                                                                <div class="card-top">
                                                                    <div class="image">
                                                                        <a href="<?php echo e($product->slug_full); ?>">
                                                                            <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="Sofa phòng khách SF08" class="image-card image-default">
                                                                        </a>
                                                                        <?php if($product->sale): ?>
                                                                        <span class="sale-1">-<?php echo e($product->sale); ?>%</span>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                    <ul class="list-quick">
                                                                        <li class="quick-view">
                                                                            <a href="<?php echo e($product->slug_full); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                        </li>
                                                                        <li class="cart quick-cart">
                                                                            <a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>"><i class="fas fa-cart-plus"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h4 class="card-name"><a href="<?php echo e($product->slug_full); ?>"><?php echo e($product->name); ?></a></h4>
                                                                    <div class="card-price">
                                                                        <span class="new-price"><?php echo e($product->price_after_sale); ?> <?php echo e($unit); ?></span>
                                                                        <?php if($product->sale>0): ?>
                                                                        <span class="old-price"><?php echo e($product->price); ?> <?php echo e($unit); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <!-- END BLOCK : cungloai -->
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>

                            <!-- <div class="wrap-banner-product">
                                <a href="" class="image-banner">
                                    <img src="../images/banner2.png" alt="">
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>