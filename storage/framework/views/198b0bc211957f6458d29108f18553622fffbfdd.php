<?php $__env->startSection('title',"Danh sach xuất nhập kho"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Kho","key"=>"Danh sách xuất nhập kho"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <a href="<?php echo e(route('admin.store.create',['type'=>1])); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>

                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Kiểu</th>
                                        <th>Số lượng</th>
                                        <th>Mã giao dịch (nếu có)</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index); ?></td>
                                            <td><?php echo e($item->product->name); ?></td>
                                            <td><?php echo e($typeStore[$item->type]['name']); ?></td>
                                            <td><?php echo e($item->quantity); ?></td>
                                            <td>
                                                <?php if($item->transaction_id): ?>
                                                <?php echo e($item->transaction->code); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->type==1): ?>
                                                <a href="<?php echo e(route('admin.store.edit',['id'=>$item->id])); ?>" class="btn btn-sm  btn-success"><i class="fas fa-edit"></i></a>
                                                <a data-url="<?php echo e(route('admin.store.destroy',['id'=>$item->id])); ?>" class="btn btn-sm  btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                                <?php endif; ?>

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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/admin/pages/store/list.blade.php ENDPATH**/ ?>