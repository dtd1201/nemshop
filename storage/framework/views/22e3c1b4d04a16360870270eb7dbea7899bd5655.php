<?php if(isset($data)): ?>
<?php if(isset($data)&&$data->count() > 0): ?>

    <?php
        $chunk = $data->chunk(5);
    ?>
    <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-12">
        <div class="list_nowrap">
            <div class="row">
                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $unit = 'đ';
                        $tran=$product->translationsLanguage()->first();
                        $link= route('product.detail',['category'=>$product->category->slug, 'slug'=>$product->slug]);
                    ?>
                    <div class="col-product-item box_sp_home col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="product-item">
                            <div class="box">
                                <div class="image">
                                    <a href="<?php echo e($link); ?>">
                                        <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($tran->name); ?>">
                                        <?php if($product->old_price && $product->price): ?>
                                            <span class="sale">  <?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                        <?php endif; ?>
                                        <?php if($product->baohanh): ?>
                                            <div class="km">
                                                <?php echo e($product->baohanh); ?>

                                            </div>
                                        <?php endif; ?>
                                    </a>
                                    <div class="cart">
                                        <span class="addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                            <img class="lazy" src="<?php echo e(asset('images/icon_add_cart.png')); ?>" width="30" height="35"> Thêm vào giỏ
                                        </span>
                                    </div>
                                    
                                </div>
                                <div class="content">
                                    <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
                                    <div class="box-price">
                                        <?php if($product->price): ?>
                                        <span class="new-price"><?php echo e(number_format($product->price)); ?>đ</span>
                                            <?php if($product->size): ?>
                                            <?php echo e('/ '.$product->size); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                        <span class="new-price">Liên hệ</span>
                                        <?php endif; ?>
                                        <?php if($product->old_price>0): ?>
                                        <span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="col-md-12">
    <div class="empty__cate-img">
        <picture>
            <img src="<?php echo e(asset('frontend/images/cate-empty.png')); ?>" alt="">
        </picture>
    </div>
    <h4 class="text-center empty__cate-title">Không tìm thấy sản phẩm phù hợp</h4>
</div>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/components/load-product-filter.blade.php ENDPATH**/ ?>