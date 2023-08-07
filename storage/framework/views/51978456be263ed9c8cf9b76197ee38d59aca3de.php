<?php $__env->startSection('title',"Edit role"); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('lib/select2/css/select2.min.css')); ?>" rel="stylesheet" />
<style>
  .list-permission{
      background-color: #eee;
  }
  .permission-title{
      background-color: #cccccc;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.role.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="content-wrapper">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Role","key"=>"Edit"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <?php if(session("alert")): ?>
              <?php echo "<script>alert('".session("alert")."')</script>"; ?>

              <div class="alert alert-success">
                  <?php echo e(session("alert")); ?>

              </div>
              <?php endif; ?>
              <form action="<?php echo e(route('admin.role.postEdit',['id'=>$data->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
                    <label for="">description</label>
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

                <div class="form-group mt-5 mb-5 wrap-permission">
                    <div class="item-permission mt-2 mb-2 ">
                        <div class="form-check  permission-title">
                            <label class="form-check-label p-3 ">
                                <input  type="checkbox" class="form-check-input checkall" value="">checkall
                            </label>
                        </div>
                    </div>
                    <?php $__currentLoopData = $dataPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-permission mt-2 mb-2">
                        <div class="form-check  permission-title">
                            <label class="form-check-label p-3">
                                <input type="checkbox" class="form-check-input check-parent" value="<?php echo e($permissionsItem->id); ?>"><?php echo e($permissionsItem->name); ?>

                            </label>
                        </div>
                        <div class="list-permission p-3">
                            <div class="row">
                                <?php $__currentLoopData = $permissionsItem->getPermissionsChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionsChildrenItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
            </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('.checkall').on('click', function () {
        $(this).parents('.wrap-permission').find('.check-children,.check-parent').prop('checked',$(this).prop('checked'));
    })
    $('.check-parent').on('click', function () {
        $(this).parents('.item-permission').find('.check-children').prop('checked',$(this).prop('checked'));
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/role/edit.blade.php ENDPATH**/ ?>