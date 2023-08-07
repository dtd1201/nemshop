<?php $__env->startSection('title',"danh sach category"); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.setting.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('lib/sweetalert2/css/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Setting","key"=>"list"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <a href="<?php echo e(route('admin.setting.getAdd')); ?>" class="btn btn-success">Add</a>

            </div>

            <div class="col-md-12">
                <div class="lb-list-category">
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>config key</th>
                                <th>config value</th>
                                <th>slug</th>
                                <th>description</th>
                                
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settingItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index); ?></td>
                                <td><?php echo e($settingItem->id); ?></td>
                                <td><?php echo e($settingItem->config_key); ?></td>
                                <td><?php echo e($settingItem->config_value); ?></td>
                                <td><?php echo e($settingItem->slug); ?></td>
                                <td><?php echo e($settingItem->description); ?></td>
                                
                                <td>
                                    <a href="<?php echo e(route('admin.setting.getEdit',['id'=>$settingItem->id])); ?>" class="btn btn-success">Edit</a>
                                    <a data-url="<?php echo e(route('admin.setting.getDelete',['id'=>$settingItem->id])); ?>" class="btn btn-danger lb_delete">Delete</a>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/setting/list.blade.php ENDPATH**/ ?>