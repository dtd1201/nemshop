
<?php $__env->startSection('title',"Edit role"); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   <?php echo $__env->make('admin.partials.content-header',['name'=>"Vai trò","key"=>"Sửa vai trò"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <?php if(session("alert")): ?>
               <div class="alert alert-success">
                  <?php echo e(session("alert")); ?>

               </div>
               <?php elseif(session('error')): ?>
               <div class="alert alert-warning">
                  <?php echo e(session("error")); ?>

               </div>
               <?php endif; ?>
               <form action="<?php echo e(route('admin.role.update',['id'=>$data->id])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card card-outline card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Thông tin vai trò</h3>
                           </div>
                           <div class="card-body table-responsive p-3">
                              <div class="form-group">
                                 <label for="">Tên role</label>
                                 <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    value="<?php echo e($data->name); ?>"  name="name"
                                    placeholder="Nhập name"
                                    >
                                 <?php $__errorArgs = ['name'];
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
                                 <label for="">Mô tả</label>
                                 <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    value="<?php echo e($data->description); ?>"  name="description"
                                    placeholder="Nhập description"
                                    >
                                 <?php $__errorArgs = ['description'];
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
                              <div class="mt-3 mb-2 wrap-permission">
                                 <div class="item-permission mt-2 mb-2 ">
                                    <div class="form-check  permission-title">
                                       <label class="form-check-label p-3 ">
                                       <input  type="checkbox" class="form-check-input checkall" value="">Chọn tất cả
                                       </label>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <?php $__currentLoopData = $dataPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4">
                                       <div class="item-permission mt-2 mb-2">
                                          <div class="form-check  permission-title">
                                             <label class="form-check-label p-3">
                                             <input type="checkbox" class="form-check-input check-parent" value="<?php echo e($permissionsItem->id); ?>"><?php echo e($permissionsItem->name); ?>

                                             </label>
                                          </div>
                                          <div class="list-permission p-3">
                                             <div class="row">
                                                <?php $__currentLoopData = $permissionsItem->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionsChildrenItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                   <div class="form-check">
                                                      <label class="form-check-label">
                                                      <input
                                                      type="checkbox"
                                                      class="form-check-input check-children"
                                                      name="permission_id[]"
                                                      value="<?php echo e($permissionsChildrenItem->id); ?>"
                                                      <?php if($dataPermissionsOfRole->get()->contains($permissionsChildrenItem->id)): ?>
                                                      <?php echo e('checked'); ?>

                                                      <?php endif; ?>
                                                      >
                                                      <?php echo e($permissionsChildrenItem->name); ?>

                                                      </label>
                                                   </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </div>
                              </div>
                              <?php $__errorArgs = ['permission_id'];
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
                                 <input type="checkbox" class="form-check-input" name="checkrobot" id="checkrobot">
                                 <label class="form-check-label" for="checkrobot" required>Check me out</label>
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
                                 <button type="reset" class="btn btn-danger">Reset</button>
                                 <button type="submit" class="btn btn-primary">Chấp nhận</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\demola\resources\views/admin/pages/role/edit.blade.php ENDPATH**/ ?>