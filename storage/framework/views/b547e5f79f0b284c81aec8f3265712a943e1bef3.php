
<?php $__env->startSection('title',"Danh sách sản phẩm hoàn trả"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Kho","key"=>"Danh sách sản phẩm hoàn trả"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <div class="">
                        <div class="card-tools w-100 mb-3">
                            <form action="<?php echo e(route('admin.store.listDefectiveProduct')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">

                                            <div class="form-group col-md-6 mb-0">
                                                <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Mã SP">
                                                <div id="keyword_feedback" class="invalid-feedback">

                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC" <?php echo e($order_with == 'dateASC' ? 'selected' : ''); ?>>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" <?php echo e($order_with == 'dateDESC' ? 'selected' : ''); ?>>Ngày tạo giảm dần</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0 text-right">
                                        <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                        <a class="btn btn-danger " href="<?php echo e(route('admin.store.listDefectiveProduct')); ?>">Làm mới</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="50px">Mã SP</th>
                                        <th width="200px">Tên sản phẩm</th>
                                        <th width="100px" class="text-right">Giá nhập</th>
                                        <th width="100px" class="text-right">Số lượng</th>
                                        <th width="100px">Hạn sử dụng</th>
                                        <th width="100px">Lô hàng</th>
                                        <th width="100px">Ngày tạo</th>
                                        <td width="100px">Hành động</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index); ?></td>
                                            <td><?php echo e($item->masp); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td class="text-right"><?php echo e($item->cost); ?></td>
                                            <td class="text-right"><?php echo e($item->quantity); ?></td>
                                            <td><?php echo e(Carbon::parse($item->han_su_dung)->format('d-m-Y')); ?></td>
                                            <td><?php echo e($item->lohang->name); ?></td>
                                            <td><?php echo e(Carbon::parse($item->created_at)->format('d-m-Y')); ?></td>
                                            <td>
                                                <a data-url="<?php echo e(route('admin.store.destroyDefectiveProduct',['id'=>$item->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/kho/san-pham-loi.blade.php ENDPATH**/ ?>