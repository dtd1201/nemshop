<table class="table table-bordered">
    <thead>
       <tr>
          <th style="width: 10px">#</th>
          <th>Avatar</th>
          <th>Name</th>
          <th class="text-nowrap">Số lượng</th>
          <th class="text-nowrap">Total</th>
          
       </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($order->id); ?></td>
            <td>
                <img src="<?php echo e($order->avatar_path); ?>" alt="<?php echo e($order->name); ?>" style="width:80px;">
            </td>
            <td><?php echo e($order->name); ?></td>
            <td><?php echo e($order->quantity); ?></td>
            <td><?php echo e(number_format($order->new_price)); ?></td>
            
        </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
 </table>
<?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/components/transaction-detail.blade.php ENDPATH**/ ?>