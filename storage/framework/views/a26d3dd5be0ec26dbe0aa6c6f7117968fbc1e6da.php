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
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12 block-content-right">
                            <?php if(isset($dataProduct)): ?>
                                <?php if($dataProduct): ?>
                                    <?php if($dataProduct->count()): ?>
                                    <h3 class="title-template"><?php echo e(__('search.ket_qua_tim_kiem')); ?></h3>
                                    <div class="wrap-list-product">
                                        <div class="list-product-card">
                                            <div class="row">
                                                <?php $__currentLoopData = $dataProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $tran=$product->translationsLanguage()->first();
                                                    $link=$product->slug_full;
                                                ?>
                                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e($link); ?>">
                                                                    <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($tran->name); ?>">
                                                                    <?php if($product->sale): ?>
                                                                    <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                                    <?php endif; ?>

                                                                    <?php if($product->baohanh): ?>
                                                                        <div class="km">
                                                                            <?php echo e($product->baohanh); ?>

                                                                        </div>
                                                                    <?php endif; ?>
                                                                </a>
                                                                <div class="actionss">
                                                                    <div class="btn-cart-products">
                                                                        <a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                                            <i class="fas fa-cart-plus"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="view-details">
                                                                        <a href="<?php echo e($link); ?>" class="view-detail"> 
                                                                            <span>
                                                                                <i class="far fa-clone"></i>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <h3>
                                                                    <a href="<?php echo e($link); ?>">
                                                                       <?php echo e($tran->name); ?>

                                                                    </a>
                                                                </h3>
                                                                <div class="box-price">
                                                                    <span class="new-price"><?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit: __('home.lien_he')); ?></span>
                                                                    <?php if($product->sale>0): ?>
                                                                        <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
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
                                            <?php echo e($dataProduct->appends(request()->input())->links()); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
						<div class="col-lg-3 col-sm-12 content-left">
							<?php if(isset($sidebar)): ?>

                            <?php echo $__env->make('frontend.components.sidebar',[
                                "categoryProduct"=>$sidebar['categoryProduct'],
                                "categoryPost"=>$sidebar['categoryPost'],
                                "categoryProductActive"=>$categoryProductActive  ?? null,
                                "postsHot"=>$sidebar['postsHot'],
                                "support_online"=>$sidebar['support_online'],
                                'fill'=>true,
                                'product'=>true,
                                'post'=>false,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kimvietplywood.com/httpdocs/resources/views/frontend/pages/search.blade.php ENDPATH**/ ?>