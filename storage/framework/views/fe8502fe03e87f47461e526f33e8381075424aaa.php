<?php $__env->startSection('title',"Thêm đại lý"); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Đại lý","key"=>"Thêm đại lý"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <form action="<?php echo e(route('admin.agency.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Thêm đại lý
                                </h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <div class="form-group">
                                    <label for="">Tên đại lý</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="<?php echo e(old('name')); ?>"
                                    name="name"
                                    required
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="<?php echo e(old('phone')); ?>"
                                    name="phone"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input
                                    type="email"
                                    class="form-control"
                                    value="<?php echo e(old('email')); ?>"
                                    name="email"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Ngân hàng</label>
                                    <select name="bank_id" class="form-control">
                                        <option value="0">Chọn ngân hàng</option>
                                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bank->id); ?>" <?php echo e(old('bank_id') == $bank->id ?'selected':''); ?>><?php echo e($bank->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php $__errorArgs = ['bank_id'];
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
                                    <label for="">Số tài khoản</label>
                                    <input
                                    type="number"
                                    class="form-control"
                                    value="<?php echo e(old('so_tai_khoan')); ?>"
                                    name="so_tai_khoan"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Căn cước</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="<?php echo e(old('can_cuoc')); ?>"
                                    name="can_cuoc"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="<?php echo e(old('address')); ?>"
                                    name="address"
                                    required
                                    >
                                </div>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/agency/add.blade.php ENDPATH**/ ?>