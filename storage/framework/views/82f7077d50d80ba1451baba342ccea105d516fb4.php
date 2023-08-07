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

            <div class="block-product">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-sm-12  block-content-right">
                            <div class="slide">
                                <?php if(isset($slider)): ?>
                                <div class="box-slide faded cate-arrows-1">
                                    <?php $__currentLoopData = $slider->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item-slide">
                                        <a href=""><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <h3 class="title-template">
                               <span class="title-inner"> <?php echo e($category->name??""); ?> </span>
                               <div class="orderby">
                                <select name="orderby" id="" class="form-control" form="search-product">
                                    <option value="0">Sắp sếp theo</option>
                                    <option value="1">Giá tăng dần</option>
                                    <option value="2">Giá giảm dần</option>
                                </select>
                               </div>

                            </h3>
                            <?php if(isset($data)): ?>
                                <div class="wrap-list-product">
                                    <div class="list-product-card">
                                        <div class="row">
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 col-product-card">
                                                <div class="product-card">
                                                    <div class="box">
                                                        <div class="image">
                                                            <a href="<?php echo e($product->slug_full); ?>"><img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e(asset($product->name)); ?>"></a>
                                                            <span class="hot">New</span>
                                                            <?php if($product->sale): ?>
                                                            <span class="sale">-<?php echo e($product->sale); ?>%</span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="name"><a href="<?php echo e($product->slug_full); ?>"><?php echo e($product->name); ?></a></h3>
                                                            <div class="box-price">
                                                                <span class="new-price"><?php echo e($product->price_after_sale?$product->price_after_sale:"Liên hệ"); ?> <?php echo e($unit); ?></span>
                                                                <?php if($product->sale>0): ?>
                                                                <span class="old-price"><?php echo e($product->price); ?> <?php echo e($unit); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <ul>
                                                                <li class="a-cart"><a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>"><i class="fas fa-cart-plus"></i></a></li>
                                                                <li class="a-view"><a href="<?php echo e($product->slug_full); ?>"><i class="fas fa-eye"></i></a></li>
                                                                <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                            </ul>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\mayphotophuson.vn\resources\views/frontend/pages/product-by-category.blade.php ENDPATH**/ ?>