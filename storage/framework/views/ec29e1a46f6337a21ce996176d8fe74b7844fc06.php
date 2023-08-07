<style>
    .cart-item   {
        display: block;
        padding: 10px 30px;
        width: 100%;
        box-sizing: border-box;
        border-bottom: 1px solid #ccc;
        background: #fff;
    }
    .cart-item .image{

    }
    .cart-item  .remove-cart  {
        display: block;
        overflow: hidden;
        margin: 15px auto 0;
        border: 0;
        background: #fff;
        color: #999;
        font-size: 12px;
        width: auto;
        width: 50px;
        padding: 0;
    }
    .cart-item  .media-body{
        justify-content: space-between;
        align-items: flex-start;
    }
    .cart-item  .media-body .content{
        width: auto;
        padding-left: 15px;
    }
    .cart-item  .media-body .content h4  {
        width: 70%;
        font-size: 14px;
        color: #333;
        font-weight: 700;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .cart-item  .media-body .content p {
        overflow: hidden;
        font-size: 12px;
        color: #666;
        padding: 6px 0 0 0px;
    }
    .cart-item  .media-body .box-price{
        width: auto;
    }
    .cart-item  .media-body .box-price >span{
        display: block;
        font-size: 14px;
        text-align: right;
        margin-bottom: 2px;
    }
    .cart-item  .media-body .box-price .new-price-cart{
        color: #f30c28;

    }
    .cart-item  .media-body .box-price .old-price-cart{
        color: #666;
        text-decoration: line-through;
    }
    .cart-item  .quantity-cart{
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }
    .cart-item  .quantity-cart .box-quantity {
        display: flex;
        justify-content: center;
        align-items: center;
    }
.cart-item  .quantity-cart .box-quantity span {
    font-size: 23px;
    border-radius: 0;
    color: #333;
    background-color: #fff;
    border: 1px #ebebeb solid;
    height: 30px;
    line-height: 29px;
    width: 30px;
    padding: 0;
    -webkit-transition: background-color ease 0.3s;
    -moz-transition: background-color ease 0.3s;
    -ms-transition: background-color ease 0.3s;
    -o-transition: background-color ease 0.3s;
    transition: background-color ease 0.3s;
    cursor: pointer;
}
.cart-item  .quantity-cart .box-quantity .prev-cart {

}
.cart-item  .quantity-cart .box-quantity  input {
    width: 40px;
    line-height: 28px;
    font-size: 14px;
    margin: 0 5px;
    text-align: center;
    -moz-appearance: textfield;
    margin: 0 5px;
    float: left;
    border-radius: 0;
    border: 1px #ebebeb solid;
    height: 30px;
}
.cart-item  .quantity-cart .box-quantity .next-cart {

}
.cart-item  .quantity-cart .box-quantity input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
    .sale-cart{
        top:0;
        right: 0;
    }

    .cart-item  .remove-cart span {
        float: left;
        background: #ccc;
        border-radius: 50%;
        width: 12px;
        height: 12px;
        position: relative;
        margin: 2px 3px 0 0;
    }
.cart-item  .remove-cart span:after,
.cart-item  .remove-cart span:before {
    content: "";
    width: 2px;
    height: 8px;
    background: #fff;
    position: absolute;
    transform: rotate(45deg);
    top: 2px;
    left: 5px;
}
.cart-item  .remove-cart  span:after {
    transform: rotate(-45deg);
}
label,input.form-control,select.form-control{
    font-size: 12px;
}

.area-total{padding:20px 30px;}
.area-total .total{
    padding-bottom: 10px;
    font-weight: 600;
}
.area-total .total span{}
.area-total  .total-price{
    font-size: 14px;
    color: red;
}
.area-total  .total-provisional{
    font-size: 12px;
}
.area-total  .total-provisional-price{
    padding-bottom: 10px;

}
</style>
<?php if(count($data)>0): ?>
<div class="cart-wrapper">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="cart-item mt-2  pt-3 pb-3">
        <div class="media p-0">
            <div class="image position-relative">
                <img src="<?php echo e($cartItem['avatar_path']); ?>" alt="<?php echo e($cartItem['name']); ?>" class="mr-3 mt-3" style="width:80px;">
                <span class="badge badge-pill badge-danger position-absolute sale-cart"><?php echo e($cartItem['sale']); ?>%</span>
                <a data-url="<?php echo e(route('cart.remove',[
                    'id'=> $cartItem['id']
                    ])); ?>" class="btn btn-danger remove-cart mx-auto"><span></span> Xóa</a>

            </div>
            <div class="media-body d-flex">
                <div class="content">
                    <h4><?php echo e($cartItem['name']); ?> </h4>
                    
                </div>
                <div class="box-price">
                    <span class="new-price-cart"><?php echo e(number_format($cartItem['totalPriceOneItem'])); ?> <?php echo e($unit??""); ?></span>
                    <span class="old-price-cart"><?php echo e($cartItem['totalOldPriceOneItem']); ?> <?php echo e($unit??""); ?></span>
                </div>
            </div>
        </div>
        <div class="action">
            <div class="quantity-cart">
                <div class="box-quantity text-center">
                    <span class="prev-cart">-</span>
                    <input class="number-cart" data-url="<?php echo e(route('cart.update',[
                        'id'=> $cartItem['id']
                        ])); ?>" value="<?php echo e($cartItem['quantity']); ?>" type="number" id="" name="quantity" disabled="disabled">
                    <span class="next-cart">+</span>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="area-total border-bottom">
        


        <div class="total-point d-flex align-items-center justify-content-between mb-2 ">
            <span class="name">Tổng Điểm hiện có</span>
            <span class="total-point-number"> <?php echo e(number_format($sumPointCurrent)); ?> <strong><?php echo e($pointUnit??""); ?></strong></span>
        </div>
        <div class="wrap-user-point">
            <div class="form-inline justify-content-end" >
                <label for="" class="mr-sm-2">Sử dụng điểm:</label>
                <div class="d-inline-block">
                    <input type="number" class="form-control mr-sm-2  <?php if(isset($errorNumberPoint)): ?>  <?php if($errorNumberPoint): ?><?php echo e('is-invalid'); ?> <?php endif; ?>   <?php endif; ?>" placeholder="Nhập số điểm"
                        data-url="<?php echo e(route('cart.update',[
                        'id'=> 0
                        ])); ?>"
                        value="<?php echo e($usePoint??""); ?>"
                    name="usePoint"
                    id="usePoint"
                    form="buynow"
                    >
                    <?php if(isset($errorNumberPoint)): ?>
                        <?php if($errorNumberPoint): ?>

                        <div class="invalid-feedback"><?php echo e($errorNumberPoint); ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <span></span>
                <label  class=""><?php echo e($pointUnit??""); ?></label>

            </div>

        </div>

        <div class="area-total pt-3 pb-3 pl-0 pr-0 border-bottom">
            <div class="total pb-0 d-flex align-items-center justify-content-between">
                <span class="name">Tổng giá trị đơn hàng</span>
                <span class="total-price" > <span id="total-price-cart" style="font-size: 150%;"><?php echo e(number_format($totalPrice)); ?></span> <?php echo e($unit??""); ?></span>
            </div>
            <div class="total-provisional d-flex align-item-center justify-content-between">
                <span class="name"></span>
                <span class="total-provisional-price text-line-through" style="text-decoration: line-through;"><?php echo e(number_format($totalOldPrice??0)); ?> <?php echo e($unit??""); ?></span>
            </div>
            <div class="total pb-0 d-flex align-items-center justify-content-between">
                <span class="name"><small>Tri trả bằng tiền mặt</small></span>
                <span class="total-price" > <span id="total-price-money-cart"><?php echo e(number_format($totalPriceMoney??0)); ?></span> <?php echo e($unit??""); ?></span>
            </div>
            <div class="total pb-0 d-flex align-items-center justify-content-between">
                <span class="name"><small>Sử dụng điểm</small></span>
                <span class="total-price" > <span id="total-price-point-cart"><?php echo e(number_format($totalPricePoint??0)); ?></span> <?php echo e($pointUnit??""); ?></span>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<style>
    .form-buy{
        display: none;
    }
</style>
<div class="wrap-no-product p-5">
   <div class="text-center">
    <i class="fas fa-cart-plus" style="font-size: 50px; color:red"></i>
    <p>Không có sản phẩm nào được chọn</p>
    <a href="<?php echo e(makeLink('home')); ?>" class="btn btn btn-outline-primary w-100 mt-2 mb-2" >Về trang chủ</a>
    <p>Vui long đi đi đến <a href="<?php echo e(makeLink('contact')); ?>" style="color:red;">liên hệ</a> để được hỗ trợ</p>
   </div>
</div>

<?php endif; ?>

<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/frontend/components/cart-component.blade.php ENDPATH**/ ?>