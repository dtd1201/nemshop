<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="notify-item box-b-1">
    <div class="u-flex">
        <div class="item-img">
            <a href="<?php echo e($cartItem['slug_full'] ?? ''); ?>">
                <img
                    src="<?php echo e($cartItem['avatar_path']); ?>"
                    alt="<?php echo e($cartItem['name']); ?>"
                />
            </a>
        </div>
        <div class="item-info">
            <a href="<?php echo e($cartItem['slug_full'] ?? ''); ?>" class="txt-gray-700 truncate2">
                <?php echo e($cartItem['name']); ?>

            </a>
            <div class="d-flex justify-between align-items-center mt-4">
                <div class="product-count d-flex">
                    <div class="quantity-cart cart-item">
                        
                        <input class="number-cart form-control" data-popup="popup" max="10" data-url="<?php echo e(route('cart.update',[
                            'id'=> $cartItem['id'],
                            'option'=>$cartItem['option_id'],
                            'type' => 'popup'
                            ])); ?>" value="<?php echo e($cartItem['quantity']); ?>" type="number" id="" name="quantity">
                    </div>
                </div>
                <div class="d-flex justify-end align-items-center flex-wrap">
                    <strong class="txt-gray-700 new-price-cart"><?php echo e(number_format($cartItem['totalPriceOneItem'])); ?>đ</strong>

                    <span class="txt-gray-400 p-x-8">|</span>
                    <a data-url="<?php echo e(route('cart.remove',[
                        'id'=> $cartItem['id'],
                        'option'=>$cartItem['option_id'],
                        'type' => 'popup'
                        ])); ?>" data-popup="popup" class="cursor-pointer btnRemoveHeader remove-cart">Xóa
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/frontend/components/load-cart-product.blade.php ENDPATH**/ ?>