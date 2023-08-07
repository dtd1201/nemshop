<?php if(isset($data) && $data->count() > 0): ?>
    
    <div class="list-product-card">
        <div class="row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $tran=$product->translationsLanguage()->first();
                        $link= route('product.detail',['category'=>$product->category->slug, 'slug'=>$product->slug]);
                    ?>
                    <div class="col-product-item2 col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="product-item">
                            <div class="box">
                                <div class="image">
                                    <a href="<?php echo e($link); ?>">
                                        <img src="<?php echo e($product->avatar_path != null ? asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                        <?php if($product->old_price && $product->price): ?>
                                            <span class="sale">   <?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                        <?php endif; ?>

                                        <?php if($product->baohanh): ?>
                                            <div class="km">
                                                <?php echo e($product->baohanh); ?>

                                            </div>
                                        <?php endif; ?>
                                    </a>
                                    
                                    <div class="pro-item-star">
                                        <span class="pro-item-start-rating">
                                            <?php
                                                $avgRating = 0;
                                                $sumRating = array_sum(array_column($product->productStars->toArray(), 'star'));
                                                $countRating = count($product->productStars);
                                                if ($countRating != 0) {
                                                    $avgRating = $sumRating / $countRating;
                                                }
                                            ?>
                                            <?php for($i = 1; $i <= 5; $i++): ?>

                                                <?php if($i <= $avgRating): ?>
                                                    <i class="star-bold far fa-star"></i>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="<?php echo e($link); ?>">
                                           <?php echo e($tran->name); ?>

                                        </a>
                                    </h3>
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
    <div class="col-md-12">
        <?php if(count($data)): ?>
        <?php echo e($data->appends(request()->all())->links()); ?>

        <?php endif; ?>
    </div>
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
<?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/components/load-product-search.blade.php ENDPATH**/ ?>