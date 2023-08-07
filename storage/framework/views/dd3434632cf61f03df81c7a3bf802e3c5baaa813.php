<?php if(!empty($data) && $totalQuantity > 0): ?>

<div class="col-lg-8 col-sm-12 col-12">

<div class="cart-bottom cart-bottom-v3">
    <div class="cart-bottom__title bg-white">
        <h3 class="ttile">CÓ <?php echo e($totalQuantity); ?> SẢN PHẨM TRONG GIỎ HÀNG</h3></div>
    <div class="cart-bottom__product">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart-product">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="u-flex no-gutters">
                            <div class="cart-img m-r-8">
                                <a href="<?php echo e($cartItem['slug_full'] ?? ''); ?>">
                                    <img
                                        src="<?php echo e($cartItem['avatar_path']); ?>"
                                        alt="<?php echo e($cartItem['name'] ?? ''); ?>"
                                    />
                                </a>
                            </div>
                            <div class="col cart-info">
                                <h3 class="cart-tit truncate2 m-b-8 m-b-md-0">
                                    <a href="<?php echo e($cartItem['slug_full'] ?? ''); ?>" class="txt-primary-700"><?php echo e($cartItem['name'] ?? ''); ?></a>
                                </h3>
                                <div class="none-block m-t-8 m-b-12">
                                    <div class="u-flex no-gutters justify-content-between">
                                        <div class="col">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-select cart-spon-md js-select is_desktop">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto"><span class="txt-gray-600 fs-p-16">Đơn vị bán:</span></div>
                                        <div class="col">
                                            <div class="u-flex flex-wrap align-items-center no-gutters">
                                                <div class="col-auto"><p class="f-w-500 fs-p-16 txt-gray-600"><?php echo e(isset($cartItem['size'])?$cartItem['size']:''); ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="col-right block-none cart-item">
                            <div class="wrapper-cart-mobile">
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
                                <div class="cart-prices txt-right new-price-cart"><?php echo e(number_format($cartItem['totalPriceOneItem'])); ?>đ</div>
                            </div>
                            <div class="link-group m-t-6">
                                <div class="u-flex no-gutters justify-end">
                                    
                                    
                                    <div class="col-auto"><span class="link js-remove"> 
                                        <a data-url="<?php echo e(route('cart.remove',[
                                        'id'=> $cartItem['id'],
                                        'option'=>$cartItem['option_id'],
                                        ])); ?>" class="remove-cart"><i class="fa fa-trash"></i> Xóa</a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-select cart-spon-md js-select is_mobile">
                            <div class="row align-items-center no-gutters">
                                <div class="col-auto"><span class="txt-gray-600 fs-p-16">Đơn vị bán:</span></div>
                                <div class="col">
                                    <div class="u-flex flex-wrap align-items-center no-gutters">
                                        <div class="col-auto"><p class="f-w-500 fs-p-16 txt-gray-600"><?php echo e(isset($cartItem['size'])?$cartItem['size']:''); ?></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="cart-bottom__form bg-white">
        <form action="" id="shoppingCart">
            <div class="row">
    
                <div class="col-12">
                
                    <div class="form-err txt-left" id="errorGender" style="display: none;">
                        <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                             <i class="fas fa-minus alert-ic bg-danger"></i>
                            <span class="">Thông tin bắt buộc</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <!-- <input type="text" name="nameCart" class="form-control radius-8-mb" placeholder="Nhập họ và tên" id="nameCart" maxlength="50"> -->
                        <input type="text" class="form-control radius-8-mb  <?php $__errorArgs = ['nameCart'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        <?php if(Auth::guard('web')->check()): ?>
                            value="<?php echo e(auth()->user()->name); ?>"
                        <?php endif; ?>
                        id="" name="nameCart" required placeholder="Họ và tên">
                    </div>
                    <div class="form-err txt-left" id="errorNameCart" style="display: none;">
                        <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                             <i class="fas fa-minus alert-ic bg-danger"></i>
                            <span class="">Thông tin bắt buộc</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="tel" maxlength="10" name="phoneCart" class="form-control radius-8-mb" placeholder="Nhập số điện thoại" id="phoneCart"
                        <?php if(Auth::guard('web')->check()): ?>
                        value="<?php echo e(auth()->user()->phone); ?>"
                        <?php endif; ?>
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        min="123456789" maxlength="10" name="phoneCart" required placeholder="Số điện thoại"
                        >
                    </div>
                    <div class="form-err txt-left" id="errorPhoneCart" style="display: none;">
                        <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                             <i class="fas fa-minus alert-ic bg-danger"></i>
                            <span class="error-phone-cart--text">Thông tin bắt buộc</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <!-- <input type="email" name="emailCart" id="emailCart" class="form-control" placeholder="Nhập email (Không bắt buộc)"> -->
                        <input type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        <?php if(Auth::guard('web')->check()): ?>
                            value="<?php echo e(auth()->user()->email); ?>"
                        <?php endif; ?>
                            id="" name="emailCart" required placeholder="Email">
                    </div>
                    <div class="form-err txt-left email-error" id="errorEmailCart" style="display: none;">
                        <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                             <i class="fas fa-minus alert-ic bg-danger"></i>
                            <span class="">Email không hợp lệ</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="cart-tax m-t-16">
                <div class="form-groups">
                    <div class="checkbox checkbox-sm form-check-error align-items-center check-tax js-check-tax">
                        <input type="checkbox" name="tax" id="tax" /><label for="tax">Yêu cầu xuất hoá đơn công ty</label>
                    </div>
                </div>
            </div>
    
            <div id="bill" style="display :none;">
                <div class="row">
                    <div class="col-12">
                        <div class="u-flex flex-wrap no-gutters check-form-create-comment">
                            <div class="radio radio-sm danh-xung-comment danh-xung-eInvoiceType">
                                <label class="d-flex align-items-center">
                                    <input type="radio" name="eInvoiceType" value="1">
                                    Công ty
                                </label>
                            </div>
                            <div class="radio radio-sm danh-xung-comment danh-xung-eInvoiceType" data-id="2">
                                <label class="d-flex align-items-center">
                                    <input type="radio" name="eInvoiceType" value="2">
                                    Cá nhân
                                </label>
                            </div>
                        </div>
                        <div class="form-err txt-left" id="erroreInvoiceType" style="display: none;">
                            <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                 <i class="fas fa-minus alert-ic bg-danger"></i>
                                <span class="">Thông tin bắt buộc</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" name="companyName" class="form-control radius-8-mb" placeholder="Nhập tên công ty" id="companyName" maxlength="50">
                        </div>
                        <div class="form-err txt-left" id="errorCompanyName" style="display: none;">
                            <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                 <i class="fas fa-minus alert-ic bg-danger"></i>
                                <span class="">Thông tin bắt buộc</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="tel" maxlength="10" name="companyTax" class="form-control radius-8-mb" placeholder="Nhập mã số thuế" id="companyTax">
                        </div>
                        <div class="form-err txt-left" id="errorCompanyTax" style="display: none;">
                            <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                 <i class="fas fa-minus alert-ic bg-danger"></i>
                                <span class="text-phone-error-comment">Thông tin bắt buộc</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="companyAddress" id="companyAddress" class="form-control" placeholder="Nhập địa chỉ công ty">
                        </div>
                        <div class="form-err txt-left email-error" id="errorCompanyAddress" style="display: none;">
                            <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                                 <i class="fas fa-minus alert-ic bg-danger"></i>
                                <span class="">Thông tin bắt buộc</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="hinhthuc_thanhtoan">
                    <div class="col-12">
                        <div class="ttile">Chọn hình thức nhận hàng</div>
                        <div class="u-flex flex-wrap no-gutters check-form-create-comment">
                            <div class="radio radio-sm danh-xung-comment danh-xung-hiddenLocation">
                                <label class="d-flex align-items-center">
                                    <input type="radio" name="hiddenLocation" value="1">
                                    Nhận tại nhà thuốc
                                </label>
                            </div>
                            <div class="radio radio-sm danh-xung-comment danh-xung-hiddenLocation">
                                <label class="d-flex align-items-center">
                                    <input type="radio" name="hiddenLocation" value="2">
                                    Giao hàng tận nơi
                                </label>
                            </div>
                        </div>
                        <div class="form-err txt-left" id="errorhiddenLocation" style="display: none;">
                            <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                 <i class="fas fa-minus alert-ic bg-danger"></i>
                                <span class="">Thông tin bắt buộc</span>
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-12">
                        <div class="address">
                            <div class="form-group">
                                <input type="text" name="addressCart" id="addressCart" class="form-control" placeholder="Nhập địa chỉ"
                                <?php if(Auth::guard('web')->check()): ?>
                                    value="<?php echo e(auth()->user()->address); ?>"
                                <?php endif; ?>
                                    id="" required >
                            </div>
                            <div class="form-err txt-left" id="errorAddressCart" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                     <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="hinhthuc_thanhtoan">
                    <div class="col-12">
                        <div class="ttile">Chọn hình thức thanh toán</div>
                        <div class="check-form-create-comment">
                            <div class="radio radio-sm danh-xung-comment danh-xung-payment">
                                <label class="d-flex align-items-center">
                                    <input type="radio" name="payment" value="1">
                                    Thanh toán tiền mặt khi nhận hàng
                                </label>
                            </div>
                        </div>
                        <div class="form-err txt-left" id="errorpayment" style="display: none;">
                            <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                 <i class="fas fa-minus alert-ic bg-danger"></i>
                                <span class="">Thông tin bắt buộc</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<div class="col-lg-4 col-sm-12 col-12">
    <div class="cart-cta radius-12 radius-none">
        <div class="cart-cta__title">
            <h3 class="u-flex">
                <i class="fa fa-shopping-bag" style="margin-right: 5px;"></i> THÔNG TIN ĐƠN HÀNG</h3>
        </div>
        <div class="cart-cta__total">
            <div class="u-flex"><span class="txt-gray">Tổng tiền</span>
            <span class="txt-gray total-price"><?php echo e(number_format($totalPrice)); ?>đ</span></div>
            <div class="u-flex">
                <span class="txt-gray">Khuyến mãi giảm</span><span class="txt-gray"><?php echo e(number_format($cartItem['old_price'] - $cartItem['price'])); ?>đ</span>
            </div>
            <div class="u-flex textCanThanhToan">
                <span class="txt-gray">Cần thanh toán</span>
                <span class="total-price"><?php echo e(number_format($totalPrice)); ?>đ</span>
            </div>
        </div>
        <div class="cart-cta__btn txt-center">
            <button class="btn btn-md btn-primary txt-red js-btn-shopping-cart" data-url="<?php echo e(route('cart.order.submit')); ?>"><span>HOÀN TẤT ĐẶT HÀNG</span></button>
            <div class="txt-gray block-none">
                Bằng cách đặt hàng, bạn đồng ý với <br />
                <a href="/tos" class="txt-gray underline">Điều khoản sử dụng</a> của Thuốc tốt
            </div>
        </div>
    </div>
    
</div>


<?php endif; ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/components/cart-component.blade.php ENDPATH**/ ?>