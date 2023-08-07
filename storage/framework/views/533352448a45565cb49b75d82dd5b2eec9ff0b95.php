<?php $__env->startSection('title',"thêm category"); ?>
<?php $__env->startSection('css'); ?>
    <style>
         .lb_template_categoryproduct_edit img{
            width: 200px;
            height: auto;
            object-fit: cover;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.categoryproduct.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="content-wrapper lb_template_categoryproduct_edit">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Admin","key"=>"Edit"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
              <form action="<?php echo e(route('admin.categoryproduct.postEdit',['id'=>$data->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input
                        type="text"
                        class="form-control"
                        id=""
                        value="<?php echo e($data->name); ?>"
                        name="name"
                        placeholder="Nhập tên danh mục sản phẩm"
                        required="required"
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
                        <label for="">slug</label>
                        <input
                            type="text"
                            class="form-control"
                            id=""
                            value="<?php echo e($data->slug); ?>"
                            name="slug"
                            placeholder="Nhập slug"
                            required="required"
                        >
                  </div>
                  <?php $__errorArgs = ['slug'];
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
                        <label for="">icon</label>
                        <input
                            type="file"
                            class="form-control"
                            id=""
                            value=""
                            name="icon_path"
                        >
                        <img src="<?php echo e(asset($data->icon_path)); ?>" alt="<?php echo e($data->name); ?>">
                  </div>
                  <?php $__errorArgs = ['icon_path'];
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
                        <label for="">avatar</label>
                        <input
                            type="file"
                            class="form-control"
                            id="" value=""
                            name="avatar_path"
                        >
                        <img src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e($data->name); ?>">
                  </div>
                  <?php $__errorArgs = ['avatar_path'];
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
                    <select class="form-control custom-select" id=""  name="parentId">
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
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <input
                                type="radio"
                                class="form-check-input"
                                value="1"
                                name="active"
                                <?php if( $data->active=="1"||old('active')==="1"): ?> <?php echo e('checked'); ?>  <?php endif; ?>
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
                                <?php if( $data->active==="0"||old('active')==="0"): ?><?php echo e('checked'); ?>  <?php endif; ?>
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
                  <input type="checkbox" class="form-check-input" name="checkrobot" id="">
                  <label class="form-check-label" for="" required="required">Check me out</label>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/categoryproduct/edit.blade.php ENDPATH**/ ?>