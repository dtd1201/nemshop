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

<?php $__env->startSection('content'); ?>


  <div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"User","key"=>"Thêm user"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

              <form action="<?php echo e(route('admin.user_frontend.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Thông tin user</h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <div class="form-group">
                                    <label for="">Họ và tên</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id=""
                                        value="<?php echo e(old('name')); ?>"  name="name"
                                        placeholder="Nhập admin user"
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
                                    <label for="">Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id=""
                                        value="<?php echo e(old('username')); ?>"  name="username"
                                        placeholder="Nhập username"
                                    >
                                    <?php $__errorArgs = ['username'];
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
                                    <label for="">Số điểm đã nap</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id=""
                                        value="<?php echo e(old('startpoint')); ?>"  name="startpoint"
                                        placeholder="Nhập số điểm đã nạp"
                                        required
                                    >
                                    <?php $__errorArgs = ['startpoint'];
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/admin/pages/user_frontend/add.blade.php ENDPATH**/ ?>