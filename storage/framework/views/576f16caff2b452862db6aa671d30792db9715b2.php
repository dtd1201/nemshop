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
                                    <h3 class="title-template-news">Kết quả tìm kiếm sản phẩm  </h3>
                                    <div class="wrap-list-product">
                                        <div class="list-product-card">
                                            <div class="row">
                                                <?php $__currentLoopData = $dataProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="product-card">
                                                        <div class="box">
                                                            <div class="card-top">
                                                                <div class="image">
                                                                    <a href="<?php echo e(route('product.detail',['id'=>$product->id,'slug'=>$product->slug])); ?>">
                                                                        <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="Sofa phòng khách SF08" class="image-card image-default">
                                                                    </a>
                                                                    <?php if($product->sale): ?>
                                                                    <span class="sale-1">-<?php echo e($product->sale); ?>%</span>
                                                                    <?php endif; ?>

                                                                </div>
                                                                <ul class="list-quick">
                                                                    <li class="quick-view">
                                                                        <a href="<?php echo e(route('product.detail',['id'=>$product->id,'slug'=>$product->slug])); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li class="cart quick-cart">
                                                                        <a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>"><i class="fas fa-cart-plus"></i></a>
                                                                     </li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-name"><a href="<?php echo e(route('product.detail',['id'=>$product->id,'slug'=>$product->slug])); ?>"><?php echo e($product->name); ?></a></h4>
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
                        <div class="col-lg-12 col-sm-12">
                            <?php if(isset($dataPost)): ?>
                                <?php if($dataPost): ?>
                                    <?php if($dataPost->count()): ?>
                                        <h3 class="title-template-news">Kết quả tìm kiếm tin tức</h3>
                                        <div class="list-news">
                                            <div class="row">
                                                <?php $__currentLoopData = $dataPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="fo-03-news col-lg-4 col-md-6 col-sm-6">
                                                    <div class="box">
                                                        <div class="image">
                                                            <a href="<?php echo e(makeLink("post",$post->id,$post->slug)); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>"></a>
                                                        </div>
                                                        <h3><a href="<?php echo e(makeLink("post",$post->id,$post->slug)); ?>"><?php echo e($post->name); ?></a></h3>
                                                        <div class="date"><?php echo e(date_format($post->updated_at,"d/m/Y")); ?> - Admin Bivaco</div>
                                                        <div class="desc">
                                                            <?php echo $post->description; ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <?php if(count($dataPost)): ?>
                                        <?php echo e($dataPost->links()); ?>

                                        <?php endif; ?>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/vision.vsscorp.vn/httpdocs/resources/views/frontend/pages/search.blade.php ENDPATH**/ ?>