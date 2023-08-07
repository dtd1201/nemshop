<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('css'); ?>
   <style>
       .btn-light{
        color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    background-color: #a3a3a3;
       }
   </style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <div class="text-left wrap-breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="<?php echo e(makeLink('home')); ?>">Trang chủ</a>
                                </li>
                                <li class="breadcrumbs-item active"><a href="#" class="currentcat">Giỏ hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-cart">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-danger">
                            <?php echo $__env->make('frontend.components.cart-component',[
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>



                        <div class="bg-cart">
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-buy">
                                        <form action="<?php echo e(route('cart.order.submit')); ?>" method="POST" enctype="multipart/form-data" id="buynow">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h2 class="title-cart">
                                                        Thông tin khách hàng
                                                     </h2>

                                                     <div class="form-group row">
                                                        <label for="" class="col-sm-4">Họ và tên <strong>*</strong></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control   <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="name" placeholder="Họ và tên">
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                            <label for="" class="col-sm-4">Email <strong>*</strong></label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="email" placeholder="Email">
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>

                                                       </div>
                                                       <div class="form-group row">
                                                            <label for="" class="col-sm-4">Số điện thoại <strong>*</strong></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control   <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="phone" placeholder="Số điện thoại">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4">Tỉnh/TP <strong>*</strong></label>
                                                            <div class="col-sm-8">
                                                                <select name="city_id" id="city" class="form-control <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  data-url="<?php echo e(route('ajax.address.districts')); ?>" required="required">
                                                                    <option value="">Chọn tỉnh/Thành phố</option>
                                                                    <?php echo $cities; ?>

                                                                </select>
                                                            </div>

                                                           <div class="col-sm-12">
                                                                <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                           </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4">Quận/huyện <strong>*</strong></label>
                                                            <div class="col-sm-8">
                                                                <select name="district_id" id="district" class="form-control    <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  data-url="<?php echo e(route('ajax.address.communes')); ?>"  required="required">
                                                                    <option value="">Chọn quận/huyện</option>
                                                                </select>
                                                            </div>

                                                            <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4">Xã/phường <strong>*</strong></label>
                                                            <div class="col-sm-8">
                                                                <select name="commune_id" id="commune" class="form-control   <?php $__errorArgs = ['commune_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  required="required">
                                                                    <option value="">Chọn xã/phường/thị trấn</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <?php $__errorArgs = ['commune_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4">Địa chỉ cụ thể </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="address_detail" class="form-control    <?php $__errorArgs = ['address_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" placeholder="Địa chỉ cụ thể">
                                                            </div>
                                                            <?php $__errorArgs = ['address_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4">Yêu cầu khác </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="note" class="form-control   <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" placeholder="Yêu cầu khác (không bắt buộc)">
                                                            </div>

                                                           <div class="col-sm-12">
                                                                <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                           </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <?php if(isset($vanchuyen)&&$vanchuyen): ?>
                                                            <h2 class="title-cart">
                                                               <?php echo e($vanchuyen->name); ?>

                                                             </h2>
                                                              <div class="desc-collapse">
                                                                <?php echo $vanchuyen->description; ?>

                                                              </div>
                                                              <?php endif; ?>
                                                              <h2 class="title-cart">
                                                                <?php echo e($thanhtoan->name); ?>

                                                               </h2>
                                                               <?php if(isset($thanhtoan)&&$thanhtoan): ?>
                                                               <input type="hidden"  name="httt" id="hinhthuc" required value="<?php echo e(optional($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->first())->id); ?>">
                                                               <?php endif; ?>
                                                              <div id="list-thanhtoan">
                                                                  <?php if(isset($thanhtoan)&&$thanhtoan): ?>
                                                                      <?php $__currentLoopData = $thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                      <div class="card colsap <?php if($loop->first): ?> active <?php endif; ?>" data-value='<?php echo e($item->id); ?>'>
                                                                        <div class="card-header btn-colsap <?php if($loop->first): ?> active <?php endif; ?>">
                                                                            <?php echo e($item->name); ?>

                                                                        </div>
                                                                        <div class="card-body content-colsap">
                                                                            <?php echo $item->description; ?>

                                                                        </div>
                                                                    </div>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                  <?php endif; ?>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <select name="cn" id="chinhanh" class="form-control" required>
                                                                <option value="0">Chọn chi nhánh *</option>
                                                                <?php if(isset($chinhanh)&&$chinhanh): ?>
                                                                    <?php $__currentLoopData = $chinhanh->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                            <div class="list-chinhanh">
                                                                <?php if(isset($chinhanh)&&$chinhanh): ?>
                                                                    <?php $__currentLoopData = $chinhanh->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="item" id="cn_<?php echo e($item->id); ?>">
                                                                        <div class="name"><?php echo e($item->name); ?></div>
                                                                        <div class="diachi">
                                                                           <?php echo $item->description; ?>

                                                                        </div>
                                                                    </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="group-btn">
                                                                <a href="<?php echo e(route('home.index')); ?>" class="btn btn-light">Tiếp tục mua hàng</a>
                                                                <button type="submit" class="btn btn-primary">Gửi đơn hàng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
<script>
    $(document).on('click','.btn-colsap',function(){
        $('#list-thanhtoan').find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parent('.colsap').addClass('active');
        let value= $(this).parent('.colsap.active').data('value');
        $('#hinhthuc').val(value);
        console.log(value);
        $('#list-thanhtoan').find('.colsap:not(".active") .content-colsap').slideUp();
            $(this).parent('.colsap.active').find('.content-colsap').slideDown();
    });
    $("#chinhanh").change(function () {
        var id = $(this).val();
        if (id != "0") {
            $(".list-chinhanh #cn_" + id).addClass("active").siblings().removeClass("active");
        }
        else
            $(".list-chinhanh .item").removeClass("active");
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/pages/cart.blade.php ENDPATH**/ ?>