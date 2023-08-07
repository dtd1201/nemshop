<?php $__env->startSection('title',"Chi tiết đơn hàng"); ?>


<?php $__env->startSection('css'); ?>
   <style>
        .container-cart{
            max-width: 600px;
        }
        .template-search{
            background: #eee;
        }
        .title-cart{
            font-size: 15px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 20px;
        }
        .bg-cart{
            background: #fff;
        }
        .sucess-order{
            display: block;
            overflow: hidden;
            background-color: #f5f5f5;
            text-align: center;
            padding: 10px 0;
            color: #34c772;
            font-size: 25px;
            font-weight: bold;
        }
        .order-content{
            padding: 10px 30px;
        }
        .order-content .infor-order{}
        .thank-you{}
        .order-content  .list-infor{
            display: block;
            overflow: hidden;
            background-color: #f3f3f3;
            padding:10px;
        }
        .order-content  .list-infor li{
            line-height: 25px;
            padding: 5px 0;
        }
        .order-content  .list-infor li span{
            font-weight: 600;
            color: #000;
        }
        .order-content  .total-price{
            color: red;
        }
        .order-content  .total-price span{

        }
        .buy-more{}
        .buy-more a{
            overflow: hidden;
            border: 1px solid #288ad6;
            color: #288ad6;
            background-color: #fff;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
        }
        .order-item h4{
            margin: 0;
            font-size: 12px;
            font-weight: bold;
        }
        .title-order{
            font-size: 18px;
            font-weight: bold;

        }
   </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <div class="main">
            <div class="container container-cart">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bg-cart mt-5 mb-5">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="order-content">

                                        <div class="infor-order mb-3">
                                            <div class="text-center mb-3 title-order" style="font-size:25px;">
                                             Thông tin đơn hàng
                                            </div>
                                            <ul class="list-infor">
                                                <li><span>Người nhận hàng </span> <?php echo e($data->name); ?></li>
                                                <li><span>Giao đến </span> <?php echo e($data->address_detail); ?>, <?php echo e($data->commune->name); ?>, <?php echo e($data->district->name); ?>, <?php echo e($data->city->name); ?>.</li>
                                                <li class="total-price"><span>Tổng tiền </span> <?php echo e(number_format($data->total)); ?></li>
                                            </ul>
                                          <div class="list-order-product pt-4 pb-4">
                                            <div class="title-order  mb-3">
                                                Danh sách sản phẩm đã đặt
                                            </div>
                                            <div class="">


                                                <table class="table table-bordered">
                                                    <thead class="thead-dark">
                                                      <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Tên sản phẩm</th>
                                                        <th scope="col">Giá cũ</th>
                                                        <th scope="col">Giảm giá</th>
                                                        <th scope="col">Giá sau cùng</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $data->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($loop->index+1); ?></th>
                                                            <td><?php echo e($orderItem->name); ?></td>
                                                            <td><?php echo e($orderItem->old_price." ".$unit); ?></td>
                                                            <td><?php echo e($orderItem->sale."%"); ?></td>
                                                            <td> <strong style="color: red"><?php echo e($orderItem->new_price." ".$unit); ?></strong></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row" colspan="5" class="text-right">Tổng giá trị: <strong style="color: red"><?php echo e($data->total." ".$unit); ?></strong></th>
                                                        </tr>
                                                    </tbody>
                                                  </table>



                                            </div>
                                          </div>
                                         </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main_full', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/pages/transaction/show.blade.php ENDPATH**/ ?>