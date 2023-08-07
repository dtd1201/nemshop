<?php $__env->startSection('title',"danh sach category"); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('lib/sweetalert2/css/sweetalert2.min.css')); ?>">
<style>
 .lb_template_list_product img{
     width: 200px;
     height: auto;
     object-fit: cover;
 }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.product.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper lb_template_list_product">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Product","key"=>"list"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <a href="<?php echo e(route('admin.product.getAdd')); ?>" class="btn btn-success">Add</a>
            </div>
            <div class="col-md-12">
                <div class="lb-list-category">
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>name</th>
                                
                                <th>price</th>
                                
                                
                                
                                <th>avatar</th>
                                
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                                <td><?php echo e($loop->index); ?></td>
                                <td><?php echo e($productItem->id); ?></td>
                                <td><?php echo e($productItem->name); ?></td>
                                
                                <td><?php echo e(number_format($productItem->price)); ?></td>
                                
                            <td><img src="<?php echo e(asset($productItem->avatar_path)); ?>" alt="<?php echo e($productItem->name); ?>"></td>
                                
                                <td><?php echo e(optional($productItem->getCategoryProduct)->name); ?></td>
                                
                            <td>
                                
                                <a href="<?php echo e(route('admin.product.getEdit',['id'=>$productItem->id])); ?>" class="btn btn-success">Edit</a>
                                <a data-url="<?php echo e(route('admin.product.getDelete',['id'=>$productItem->id])); ?>" class="btn btn-danger lb_delete">Delete</a>
                            </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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

<script src="<?php echo e(asset('lib/sweetalert2/js/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/ajax/deleteAdminAjax.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/product/list.blade.php ENDPATH**/ ?>