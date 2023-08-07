<?php $__env->startSection('title',"Danh sach menu"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Menu","key"=>"Danh sách menu"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <div class="text-right">
                    <a href="<?php echo e(route('admin.menu.create',['parent_id'=>request()->parent_id??0])); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                </div>
                <div class="card card-outline card-info">
                    <div class="card-header pt-2 pb-2">
                        <div class="cart-title">
                            <i class="fas fa-list"></i> Menu
                        </div>
                    </div>
                </div>
                <?php if(isset($parentBr)&&$parentBr): ?>
                <ol class="breadcrumb">
                  <li><a href="<?php echo e(route('admin.menu.index',['parent_id'=>0])); ?>">Root</a></li>

                  <?php $__currentLoopData = $parentBr->breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><a href="<?php echo e(route('admin.menu.index',['parent_id'=>$item['id']])); ?>"><?php echo e($item['name']); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(route('admin.menu.index',['parent_id'=>$parentBr->id])); ?>"><?php echo e($parentBr->name); ?></a></li>
                </ol>
                <?php endif; ?>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive lb-list-category">
                            <?php echo $__env->make('admin.components.category', [
                                'data' => $data,
                                'routeNameEdit'=>'admin.menu.edit',
                                'routeNameAdd'=>'admin.menu.create',
                                'routeNameDelete'=>'admin.menu.destroy',
                                'routeNameOrder'=>'admin.loadOrderVeryModel',
                                 'table'=>'menus',
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/admin/pages/menu/list.blade.php ENDPATH**/ ?>