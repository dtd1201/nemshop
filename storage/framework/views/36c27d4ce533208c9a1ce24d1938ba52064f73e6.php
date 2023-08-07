<?php $__env->startSection('title',"Thêm menu"); ?>

<?php $__env->startSection('content'); ?>

  <div class="content-wrapper">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Menu","key"=>"Sửa menu"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                <form action="<?php echo e(route('admin.menu.update',['id'=>$data->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Thông tin danh mục menu</h3>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" value="<?php echo e($data->name); ?>"  name="name" placeholder="Nhập tên menu">
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
                                <label for="">Slug</label>
                                <input type="text" class="form-control" id="slug" value="<?php echo e($data->slug); ?>" name="slug" placeholder="Nhập slug">
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
                                <input type="radio" class="form-check-input" value="1" name="active" <?php if( $data->active==="1"||old('active')===null||old('active')==="1"): ?> <?php echo e('checked'); ?>  <?php endif; ?>>Hiện
                                </label>
                                </div>
                                <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" <?php if( $data->active==="0"||old('active')==="0"): ?><?php echo e('checked'); ?>  <?php endif; ?> name="active">Ẩn
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
                            <input type="checkbox" class="form-check-input" name="checkrobot" id="checkrobot">
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
                                <button type="reset" class="btn btn-danger">Làm mới</button>
                                <button type="submit" class="btn btn-primary">Chấp nhận</button>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/admin/pages/menu/edit.blade.php ENDPATH**/ ?>