<?php if(isset($data)): ?>
    <?php if(isset($countProduct)&&$countProduct): ?>
        <h2 class="count-search">Đã tìm thấy <?php echo e($countProduct??0); ?> sản phẩm</h2>
    <?php else: ?>
    <h2 class="count-search">Không tìm thấy sản phẩm nào</h2>
    <?php endif; ?>
    <div class="list-product-card">
        <div class="row">
            <?php if(isset($data)&&$data): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-12">
        <?php if(count($data)): ?>
        <?php echo e($data->appends(request()->all())->links()); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/nabei.vn/httpdocs/resources/views/frontend/components/load-product-search.blade.php ENDPATH**/ ?>