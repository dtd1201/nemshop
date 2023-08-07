<?php $__env->startSection('title', 'Trang chủ'); ?>
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
        .bg-address{
            background: #eee;
            padding: 10px;
        }
        .form-buy{
            padding: 30px;
        }
        .buy-more:before {
            content: "";
            width: 8px;
            height: 8px;
            border-top: 1px solid #288ad6;
            border-left: 1px solid #288ad6;
            display: inline-block;
            vertical-align: middle;
            margin: 0 3px 2px 0;
            transform: rotate(-45deg);
        }
        .buy-more {
          color:  #288ad6;
        }
   </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <div class="container container-cart">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between align-item-center pt-3 pb-3">
                            <a href="<?php echo e(route('home.index')); ?>" class="buy-more">Xem thêm sản phẩm</a>
                            <a data-url="<?php echo e(route('cart.clear')); ?>" class="clear-cart">Xóa tất cả</a>
                        </div>
                        <div class="bg-cart">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="panel panel-danger">
                                        <?php echo $__env->make('frontend.components.cart-component', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-buy">
                                        <form action="<?php echo e(route('cart.order.submit')); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <h2 class="title-cart">
                                                Điền thông tin người mua
                                            </h2>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Họ và tên</label>
                                                        <input type="text" class="form-control" id="" name="name" placeholder="Họ và tên">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" class="form-control" id="" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Số điện thoại</label>
                                                        <input type="text" class="form-control" id="" name="phone" placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-address">
                                                <h2 class="title-cart">
                                                    Địa chỉ người nhận
                                                </h2>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Tỉnh/Thành phố</label>
                                                            <select name="city_id" id="city" class="form-control" required="required" data-url="<?php echo e(route('ajax.address.districts')); ?>">
                                                                <option value="">Chọn tỉnh/thành phố</option>
                                                                <?php echo $cities; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Quận/huyện</label>
                                                            <select name="district_id" id="district" class="form-control" required="required" data-url="<?php echo e(route('ajax.address.communes')); ?>">
                                                                <option value="">Chọn quận/huyện</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Xã/phường/thị trấn </label>
                                                            <select name="commune_id" id="commune" class="form-control" required="required">
                                                                <option value="">Chọn xã/phường/thị trấn</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Địa chỉ cụ thể </label>
                                                            <input type="text" name="address_detail" class="form-control" id="" placeholder="Địa chỉ cụ thể">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Yêu cầu khác </label>

                                                            <input type="text" name="note" class="form-control" id="" placeholder="Yêu cầu khác (không bắt buộc)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="area-total pt-3 pb-3 pl-0 pr-0 border-bottom">
                                                <div class="total pb-0 d-flex align-items-center justify-content-between">
                                                    <span class="name">Tổng tiền</span>
                                                    <span class="total-price" id="total-price-cart"><?php echo e($totalPrice); ?></span>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary d-block w-100">Submit</button>
                                        </form>
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
<script src="<?php echo e(asset('frontend/js/load-address.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/frontend/pages/cart.blade.php ENDPATH**/ ?>