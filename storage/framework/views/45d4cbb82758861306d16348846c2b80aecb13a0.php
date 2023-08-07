<?php $__env->startSection('title',"danh sach danh mục sản phẩm"); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Danh mục sản phẩm","key"=>"Danh sách danh mục"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <div class="d-flex justify-content-between ">
                    <a href="<?php echo e(route('admin.categoryproduct.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                    <div class="group-button-right d-flex">
                        <form action="<?php echo e(route('admin.categoryproduct.import.excel.database')); ?>" class="form-inline" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group" style="max-width: 250px">
                                <input type="file" class="form-control-file" name="fileExcel" accept=".xlsx" required>
                              </div>
                            <input type="submit" value="Import Execel" class=" btn btn-info ml-1">
                        </form>
                        <form class="form-inline ml-3" action="<?php echo e(route('admin.categoryproduct.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Export Execel" class=" btn btn-danger">
                        </form>
                    </div>
                </div>


                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive lb-list-category">
                        <?php echo $__env->make('admin.components.category', [
                            'data' => $data,
                            'routeNameEdit'=>'admin.categoryproduct.edit',
                            'routeNameAdd'=>'admin.categoryproduct.create',
                            'routeNameDelete'=>'admin.categoryproduct.destroy',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo e($data->links()); ?>

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/pages/categoryproduct/list.blade.php ENDPATH**/ ?>