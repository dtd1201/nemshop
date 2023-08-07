
<?php $__env->startSection('title',"Danh sách đại lý"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Đại lý","key"=>"Danh sách đại lý"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <div class="col-md-12">
                    <a href="<?php echo e(route('admin.agency.create')); ?>" class="btn  btn-info btn-md mb-2">Thêm đại lý +</a>

                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="220px">Họ tên</th>
                                        <th width="220px">Mã đại lý</th>
                                        <th width="200px">Điện thoại</th>
                                        <th width="200px">Email</th>
                                        <th width="200px">Số tài khoản</th>
                                        <th width="200px">Ngân hàng</th>
                                        <th width="200px">Số căn cước</th>
                                        <th width="500px">Địa chỉ</th>
                                        <th width="50px">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->ma_daily); ?></td>
                                            <td><?php echo e($item->phone); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->so_tai_khoan); ?></td>
                                            <td>
                                            
                                                <?php if($item->bank_id): ?>
                                                    <?php echo e($item->bank->name); ?>

                                                <?php else: ?>
                                                    Chưa cập nhật
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->can_cuoc); ?></td>
                                            <td><?php echo e($item->address); ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?php echo e(route('admin.agency.edit',['id'=>$item->id])); ?>" class="btn btn-sm btn-info mr-1"><i class="fas fa-edit"></i></a>
                                                    <a data-url="<?php echo e(route('admin.agency.destroy',['id'=>$item->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo e($data->links()); ?>

            </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/agency/list.blade.php ENDPATH**/ ?>