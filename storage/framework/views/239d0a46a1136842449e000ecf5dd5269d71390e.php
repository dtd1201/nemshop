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
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-12">
        <?php if(count($data)): ?>
        <?php echo e($data->appends(request()->all())->links()); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/demo15.dkcauto.net/httpdocs/resources/views/frontend/components/load-product-search.blade.php ENDPATH**/ ?>