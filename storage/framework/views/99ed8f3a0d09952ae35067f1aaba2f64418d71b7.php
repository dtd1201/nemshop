<?php if(isset($data)): ?>
    <?php if(isset($countProduct)&&$countProduct): ?>
        <h2 class="count-search"><?php echo e(__('home.co')); ?> <?php echo e($countProduct??0); ?> <?php echo e(__('home.ket_qua_tim_kiem_voi_tu_khoa')); ?></h2>
    <?php else: ?>
    <h2 class="count-search"><?php echo e(__('home.khong_tim_thay_san_pham')); ?></h2>
    <?php endif; ?>
    <div class="list-product-card">
        <div class="row">
            <?php if(isset($data)&&$data): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $tran=$product->translationsLanguage()->first();
                        $link=$product->slug_full;
                    ?>
                    <div class="col-product-item col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="product-item">
                                                            <div class="box">
                                                                <div class="image">
                                                                    <a href="<?php echo e($link); ?>">
                                                                        <img src="<?php echo e($product->avatar_path != null ? asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                                        <?php if($product->sale): ?>
                                                                        <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                                        <?php endif; ?>

                                                                        <?php if($product->baohanh): ?>
                                                                            <div class="km">
                                                                                <?php echo e($product->baohanh); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </a>
                                                                    <div class="headline_superheadline">
                                                                        <span>
                                                                            <span>
                                                                                <a href="<?php echo e(route('product.productByCategory',['san-pham'])); ?>" class="btArticleCategory may-tro-thinh">Sản phẩm</a>
                                                                                <a href="<?php echo e(route('product.productByCategory',[$product->category->slug])); ?>" class="btArticleCategory san-pham"><?php echo e($product->category->name); ?></a>
                                                                                
                                                                            </span>
                                                                        </span>
                                                                    </div>
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
                                                                        

                                                                        <span class="new-price"><?php echo e($product->price?number_format($product->price)." ".$unit:"Liên hệ"); ?></span>
                                                                        <?php if($product->old_price>0): ?>
                                                                            <span class="old-price"><?php echo e(number_format($product->old_price)); ?> <?php echo e($unit); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
																	<div class="xemthem_home">
																		<a href="<?php echo e($link); ?>">Xem chi tiết</a>
																	</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-12">
        <?php if(count($data)): ?>
        <?php echo e($data->appends(request()->all())->links()); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/demo9.dkcauto.net/httpdocs/resources/views/frontend/components/load-product-search.blade.php ENDPATH**/ ?>