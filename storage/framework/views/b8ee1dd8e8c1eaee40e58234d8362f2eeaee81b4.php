<table class="table table-bordered">
    <thead>
       <tr>
          <th style="width: 10px">STT</th>
          <th>Avatar</th>
          <th>Name</th>
          <th class="text-nowrap">Số lượng</th>
          <th class="text-nowrap">Total</th>
          
       </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->index); ?></td>
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
<?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/components/transaction-detail.blade.php ENDPATH**/ ?>