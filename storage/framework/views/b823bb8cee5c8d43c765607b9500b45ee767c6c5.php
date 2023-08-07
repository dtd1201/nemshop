
<?php $__env->startSection('title',"danh sach category"); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.category.product.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Admin","key"=>"list"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <a href="<?php echo e(route('admin.category.product.getAdd')); ?>" class="btn btn-success">Add</a>
            </div>
            <div class="col-md-12">           
                <div class="lb-list-category">
                    <table class="table table-hover">
                    
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>c_pro_name</th>
                                <th>c_pro_slug</th>
                                <th>c_pro_icon</th>
                                <th>c_pro_avatar</th>
                                <th>c_pro_active</th>
                                <th>c_pro_parent_id</th>
                                <th>c_pro_author_id</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index); ?></td>
                                <td><?php echo e($key->id); ?></td>
                                <td><?php echo e($key->name); ?></td>
                                <td><?php echo e($key->slug); ?></td>
                                <td><?php echo e($key->icon); ?></td>
                                <td><?php echo e($key->avatar); ?></td>
                                <td><?php echo e($key->active); ?></td>
                                <td><?php echo e($key->parent_id); ?></td>
                                <td><?php echo e($key->author_id); ?></td>
                                <td><?php echo e($key->created_at); ?></td>
                                <td><?php echo e($key->updated_at); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.category.product.getEdit',['id'=>$key->id])); ?>" class="btn btn-success">Edit</a>
                                <a href="<?php echo e(route('admin.category.product.getDelete',['id'=>$key->id])); ?>" class="btn btn-danger">Delete</a>
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


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/categoryproduct/list.blade.php ENDPATH**/ ?>