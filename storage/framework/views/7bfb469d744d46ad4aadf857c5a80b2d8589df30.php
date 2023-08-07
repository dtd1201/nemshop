<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin đặt hàng</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/bootstrap-4.5.3-dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/reset.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/stylesheet-2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/header.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/footer.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/cart.css')); ?>">
    <style>
        .container{
            max-width: 800px;
            margin: 0 auto;
            background-color: #eee;
            padding:40px;
            border-radius: 10px;
        }
        h1{
            font-size: 20px;
            color: #000;
            font-weight: bold;
            margin: 0 0;
            text-align: center;
        }
        ul,li{
            list-style: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="wrap-email">
        <div class="container">
            <div class="row">
      
                <div class="col-sm-12">
                    <h1 style="text-align:center; text-transform: uppercase;">Thông tin đặt hàng</h1>
                    <ul style="padding: 0; margin-bottom: 20px;">
						<li>Chúng tôi đã xác nhận thông tin đặt hàng cho quý khách hàng với những nội dung sau:</li>
                        <li>Họ tên: <?php echo e($transaction->name); ?></li>
                        <li>Số điện thoại: <?php echo e($transaction->phone); ?></li>
                        <li>Email: <?php echo e($transaction->email); ?></li>
                        <li>Địa chỉ giao hàng: <?php echo e($transaction->address_detail); ?>, <?php echo e($transaction->commune->name); ?>, <?php echo e($transaction->district->name); ?>, <?php echo e($transaction->city->name); ?></li>
                        
                        <li>Ghi chú: <?php echo e($transaction->note ?? 'Không'); ?></li>
                    </ul>
                    <table class="table table-bordered" style="border: solid 1px #eee">
                        <thead>
                           <tr>
                              <th style="width: 10px">STT</th>
                         
                              <th>Tên sản phẩm</th>
                              <th class="text-nowrap">Số lượng</th>
                              <th class="text-nowrap">Thành tiền</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = $transaction->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $i++;
                                ?>
                            <tr>
                                <td><?php echo e($i); ?></td>
                    
                                <td>
                                    <?php echo e($order->name); ?>

                                </td>
                                <td><?php echo e($order->quantity); ?></td>
                                <td><?php echo e(number_format($order->new_price)); ?></td>
                            </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="3">Tổng tiền:</td>
                                <td><?php echo e(number_format($transaction->total)); ?> đ</td>
                            </tr>
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH /var/www/vhosts/kingphar.vn/httpdocs/resources/views/emails/transaction.blade.php ENDPATH**/ ?>