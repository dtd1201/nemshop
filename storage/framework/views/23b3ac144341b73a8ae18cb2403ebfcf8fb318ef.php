<?php $__env->startSection('title',"thêm category"); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.permission.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


  <div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Permission","key"=>"add"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
              <form action="<?php echo e(route('admin.permission.postAdd')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                  <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input
                        type="text"
                        class="form-control"
                        id=""
                        value="<?php echo e(old('name')); ?>"  name="name"
                        placeholder="Nhập tên permission"
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
                            value="<?php echo e(old('description')); ?>"
                            name="description"
                            placeholder="Nhập description"
                        >
                  </div>
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
                  <div class="form-group">
                    <label for="">Chọn danh mục cha</label>
                    <select class="form-control custom-select" id="" value="<?php echo e(old('parentId')); ?>" name="parentId">
                      <option value="0">Chọn danh mục cha</option>
                      <?php echo $option; ?>

                    </select>
                  </div>
                  <?php $__errorArgs = ['parentId'];
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
                        <label for="">key_code</label>
                        <input
                            type="text"
                            class="form-control"
                            id=""
                            value="<?php echo e(old('key_code')); ?>"
                            name="key_code"
                            placeholder="Nhập key_code"
                        >
                  </div>
                    <?php $__errorArgs = ['key_code'];
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
                  <label class="form-check-label" for="checkrobot">Check me out</label>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/permission/add.blade.php ENDPATH**/ ?>