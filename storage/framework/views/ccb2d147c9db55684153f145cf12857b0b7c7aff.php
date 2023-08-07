
<?php
    $unit="đ";
?>
<div class="cart-wrapper">
    <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="cart-item">
                <td class="cart-image" data-title="Hình ảnh:">
                   <div class="image">
                    <img src="<?php echo e($cartItem['avatar_path']); ?>" alt="<?php echo e($cartItem['name']); ?>" >
                    <?php if($cartItem['sale']): ?>
                    <span class="badge badge-pill badge-danger position-absolute sale-cart"><?php echo e($cartItem['sale']); ?>%</span>
                    <?php endif; ?>
                   </div>
                </td>
                <td class="cart-name" data-title="Tên sản phẩm:"><span><?php echo e($cartItem['name']); ?> <?php echo e(isset($cartItem['size'])?'('.$cartItem['size'].')':''); ?></span></td>
                <td class="cart-quantity" data-title="Số lượng:">
                    <div class="quantity-cart">
                        <div class="box-quantity text-center">
                            <span class="prev-cart">-</span>
                            <input class="number-cart" data-url="<?php echo e(route('cart.update',[
                                'id'=> $cartItem['id'],
                                'option'=>$cartItem['option_id'],
                                ])); ?>" value="<?php echo e($cartItem['quantity']); ?>" type="number" id="" name="quantity" disabled="disabled">
                            <span class="next-cart">+</span>
                        </div>
                    </div>
                </td>
                <td class="cart-price" data-title="Giá bán:">
                    <div class="box-price">
                        <span class="new-price-cart"><?php echo e(number_format($cartItem['totalPriceOneItem'])); ?> <?php echo e($unit); ?></span>
                        <?php if($cartItem['sale']): ?>
                        <span class="old-price-cart"><?php echo e(number_format($cartItem['totalOldPriceOneItem'])); ?>  <?php echo e($unit); ?></span>
                        <?php endif; ?>
                    </div>
                </td>
                <td class="cart-action" data-title="Xóa:">
                    <a data-url="<?php echo e(route('cart.remove',[
                        'id'=> $cartItem['id'],
                        'option'=>$cartItem['option_id'],
                        ])); ?>" class="remove-cart"><i class="fas fa-times-circle"></i></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td colspan="5">
                <div class="d-flex justify-content-end align-item-center pt-1 pb-1">
                    <a data-url="<?php echo e(route('cart.clear')); ?>" class="clear-cart btn btn-danger">Xóa tất cả</a>
                </div>
              </td>
            </tr>
        </tbody>
        <tfoot>
            <tr style="border: unset;">
                <td colspan="5" style="border: unset;">
                    <div class="wrap-area">
                        <a href="<?php echo e(route('home.index')); ?>" class="buy-more btn btn-light">Tiếp tục mua hàng</a>
                        <div class="area-total">
                            <div class="total d-flex align-items-center justify-content-between">
                                <span class="name">Tổng tiền:</span>
                                <span class="total-price"><?php echo e(number_format($totalPrice)); ?> <?php echo e($unit); ?></span>
                            </div>
                            <?php if(isset($totalOldPrice)): ?>
                            <?php if($totalPrice!=$totalOldPrice): ?>
                            <div class="total-provisional d-flex align-item-center justify-content-end">
                                <span class="total-provisional-price"><?php echo e(number_format($totalOldPrice )); ?> <?php echo e($unit); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="total-provisional d-flex align-item-center justify-content-end">
                                <span class="name">Tổng <strong><?php echo e($totalQuantity); ?></strong> sản phẩm</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>


</div>
<?php /**PATH /var/www/vhosts/nabei.vn/httpdocs/resources/views/frontend/components/cart-component.blade.php ENDPATH**/ ?>