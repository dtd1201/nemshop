<?php $__env->startSection('title',"Thêm kho"); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   <?php echo $__env->make('admin.partials.content-header',['name'=>"Kho","key"=>"Thêm kho"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               <?php if(session("alert")): ?>
               <div class="alert alert-success">
                  <?php echo e(session("alert")); ?>

               </div>
               <?php elseif(session('error')): ?>
               <div class="alert alert-warning">
                  <?php echo e(session("error")); ?>

               </div>
               <?php endif; ?>
               <form action="<?php echo e(route('admin.store.store',['type'=>$request->type??0])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="card card-outline card-primary">
                     <div class="card-header">
                        <h3 class="card-title">
                            <?php if($request->type==1): ?>
                                Nhập kho
                            <?php elseif($request->type==3): ?>
                                Xuất kho
                            <?php else: ?>
                            Thông tin kho
                            <?php endif; ?>
                        </h3>
                     </div>
                     <div class="card-body table-responsive p-3">
                        <?php if($request->type==1): ?>
                        <div class="form-group">
                            <label for="">Mã sản phẩm</label>
                            <input
                               type="text"
                               class="form-control"
                               id="masp"
                               value="<?php echo e(old('masp')); ?>"  name="masp"
                               placeholder="Nhập mã sản phẩm"
                               >
                            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                         </div>

                         <div class="form-group">
                            <label for="">Nhập số lượng sản phẩm</label>
                            <input
                               type="number"
                               class="form-control"
                               id="name"
                               value="<?php echo e(old('quantity')); ?>"  name="quantity"
                               placeholder="Nhập số lượng sản phẩm"
                               >
                            <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                         </div>

                        <?php endif; ?>

                        <?php if($request->type==3): ?>
                        <div class="form-group">
                            <label for="">Nhập mã đơn hàng</label>
                            <input
                               type="text"
                               class="form-control"
                               id="name"
                               value="<?php echo e(old('transaction_code')); ?>"  name="transaction_code"
                               placeholder="Nhập mã đơn hàng"
                               >
                            <?php $__errorArgs = ['transaction_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                         </div>
                        <?php endif; ?>


                        <div class="form-group">
                           <div class="form-check-inline">
                              <label class="form-check-label">
                                    <input
                                    type="radio"
                                    class="form-check-input"
                                    value="1"
                                    name="active"
                                    <?php if(old('active')==="1"||old('active')===null): ?> <?php echo e('checked'); ?>  <?php endif; ?>
                                    >
                                    Hiện
                              </label>
                           </div>
                           <div class="form-check-inline">
                              <label class="form-check-label">
                                    <input
                                    type="radio"
                                    class="form-check-input"
                                    value="0"
                                    <?php if(old('active')==="0"): ?><?php echo e('checked'); ?>  <?php endif; ?>
                                    name="active"
                                    >
                                    Ẩn
                              </label>
                           </div>
                        </div>
                        <?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-group form-check">
                           <input type="checkbox" class="form-check-input" name="checkrobot" id="checkrobot" required>
                           <label class="form-check-label" for="checkrobot" required>Tôi đồng ý</label>
                        </div>
                        <?php $__errorArgs = ['checkrobot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary">Chấp nhận</button>
                           <button type="reset" class="btn btn-danger">Làm lại</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/admin/pages/store/add.blade.php ENDPATH**/ ?>