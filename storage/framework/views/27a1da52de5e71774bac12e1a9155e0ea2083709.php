<table class="table table-hover cart-wrapper">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Sale %</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="cart-item">
            <td><?php echo e($loop->index); ?></td>
            <td><?php echo e($cartItem['name']); ?></td>
            <td><img src="<?php echo e($cartItem['avatar_path']); ?>" alt=""></td>
            <td><?php echo e($cartItem['price']); ?></td>
            <td><?php echo e($cartItem['sale']); ?> (%)</td>
            <td>

                <input type="number" value="<?php echo e($cartItem['quantity']); ?>" name="quantity">
            </td>
            <td><?php echo e($cartItem['totalPriceOneItem']); ?></td>
            <td>
                <a href="<?php echo e(route('cart.remove',[
                   'id'=> $cartItem['id']
                ])); ?>" class="btn btn-danger romove-cart">Remove</a>
                 <a data-url="<?php echo e(route('cart.update',[
                    'id'=> $cartItem['id']
                 ])); ?>" class="btn btn-success update-cart">Update</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/frontend/component/cart-component.blade.php ENDPATH**/ ?>