<?php $__env->startSection('title', __('contact.gio_hang')); ?>
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
                                    <a href="<?php echo e(makeLink('home')); ?>"><?php echo e(__('home.home')); ?></a>
                                </li>
                                <li class="breadcrumbs-item active"><a href="#" class="currentcat"><?php echo e(__('contact.gio_hang')); ?></a></li>
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
                                                <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                                    <h2 class="title-cart">
                                                        <?php echo e(__('contact.thong_tin_khach_hang')); ?>

                                                    </h2>

                                                     <div class="form-group row">
                                                        <label for="" class="col-sm-3"><?php echo e(__('contact.name')); ?> <strong>*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control   <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="name" placeholder="<?php echo e(__('contact.name')); ?>">
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
                                                            <label for="" class="col-sm-3"><?php echo e(__('contact.email')); ?> <strong>*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="email" placeholder="<?php echo e(__('contact.name')); ?>">
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
                                                            <label for="" class="col-sm-3"><?php echo e(__('contact.phone')); ?> <strong>*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control   <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="phone" placeholder="<?php echo e(__('contact.phone')); ?>">
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
                                                            <label for="" class="col-sm-3">Tỉnh/TP <strong>*</strong></label>
                                                            <div class="col-sm-9">
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
                                                            <label for="" class="col-sm-3">Quận/huyện <strong>*</strong></label>
                                                            <div class="col-sm-9">
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
                                                            <label for="" class="col-sm-3">Xã/phường <strong>*</strong></label>
                                                            <div class="col-sm-9">
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
                                                            <label for="" class="col-sm-3"><?php echo e(__('contact.address')); ?> </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="address_detail" class="form-control    <?php $__errorArgs = ['address_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" placeholder="<?php echo e(__('contact.address')); ?>">
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
                                                            <label for="" class="col-sm-3"><?php echo e(__('contact.yeu_cau_khac')); ?> </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="note" class="form-control   <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" placeholder="<?php echo e(__('contact.yeu_cau_khac')); ?> (<?php echo e(__('contact.khong_bat_buoc')); ?>)">
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
                                                        <div class="group-btn">
                                                            <button type="submit" class="btn btn-primary"><?php echo e(__('contact.hoan_tat')); ?></button>
                                                        </div>
                                                </div>
                                                <div class="col-md-6 ol-sm-12 col-xs-12 col-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 col-12">

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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo9.dkcauto.net/httpdocs/resources/views/frontend/pages/cart.blade.php ENDPATH**/ ?>