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
                        <div class="col-lg-9 col-sm-12  block-content-right">
                            <h3 class="title-template-news"><?php echo e($category->name??""); ?></h3>
                            <?php if(isset($data)): ?>
                                <div class="wrap-list-product">
                                    <div class="list-product-card">
                                        <div class="row">
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 col-sm-4 col-xs-6">
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
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if(count($data)): ?>
                                        <?php echo e($data->links()); ?>

                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="col-lg-3 col-sm-12 col-xs-12 block-content-left">
                            <?php if(isset($sidebar)): ?>
                                <?php echo $__env->make('frontend.components.sidebar',[
                                    "categoryProduct"=>$sidebar['categoryProduct'],
                                    "categoryPost"=>$sidebar['categoryPost'],
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
<script>
    $(function(){
        $(document).on('click','.pt_icon_right',function(){
            event.preventDefault();
            $(this).parentsUntil('ul','li').children("ul").slideToggle();
            $(this).parentsUntil('ul','li').toggleClass('active');
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/frontend/pages/product.blade.php ENDPATH**/ ?>