<?php $__env->startSection('title',"thêm user"); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('lib/select2/css/select2.min.css')); ?>" rel="stylesheet" />
<style>
  .select2-container--default .select2-selection--multiple .select2-selection__choice{
    background-color: #000 !important;
  }
  .select2-container .select2-selection--single{
    height: auto;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.user.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


  <div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"User","key"=>"add"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
              <form action="<?php echo e(route('admin.user.postAdd')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <label for="">Tên user</label>
                    <input
                        type="text"
                        class="form-control"
                        id=""
                        value="<?php echo e(old('name')); ?>"  name="name"
                        placeholder="Nhập user"
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
                    <label for="">Email</label>
                    <input
                        type="text"
                        class="form-control"
                        id=""
                        value="<?php echo e(old('email')); ?>"  name="email"
                        placeholder="Email"
                    >
                    <?php $__errorArgs = ['email'];
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
                    <label for="">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id=""
                        value="<?php echo e(old('password')); ?>"  name="password"
                        placeholder="Password"
                    >
                    <?php $__errorArgs = ['password'];
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
                    <label for="">password confirmation</label>
                    <input
                        type="password"
                        class="form-control"
                        id=""
                        value="<?php echo e(old('password_confirmation')); ?>"  name="password_confirmation"
                        placeholder="password_confirmation"
                    >
                    <?php $__errorArgs = ['password_confirmation'];
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
                    <label for="">Chọn vai trò</label>
                    <select name="role_id[]" class="form-control select-2-init" id="" multiple>
                        <option value=""></option>
                        <?php $__currentLoopData = $dataRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roleItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($roleItem->id); ?>"><?php echo e($roleItem->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['role_id'];
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
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input
                            type="radio"
                            class="form-check-input"
                            value="1"
                            name="active"
                            <?php if(old('active')==="1"||old('active')===null): ?> <?php echo e('checked'); ?>  <?php endif; ?>
                        >
                        Active
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
                            Disable
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
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('lib/select2/js/select2.min.js')); ?>"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
  $(function(){
    $(".select-2-init").select2({
      placeholder: "Chọn role",
      allowClear: true
    })
  })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/user/add.blade.php ENDPATH**/ ?>