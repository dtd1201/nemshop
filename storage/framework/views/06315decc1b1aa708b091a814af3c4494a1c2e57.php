<?php $__env->startSection('title',"Danh sach biến thể"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Biến thể","key"=>"Danh sách biến thể"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <a href="<?php echo e(route('admin.variant-value.create',['parent_id'=>request()->parent_id??0])); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                </div>
                <div class="card card-outline card-info">
                    <div class="card-header pt-2 pb-2">
                        <div class="cart-title">
                            <i class="fas fa-list"></i> Biến thể
                        </div>
                    </div>
                </div>

                <?php if(isset($parentBr)&&$parentBr): ?>
                <ol class="breadcrumb">
                  <li><a href="<?php echo e(route('admin.variant-value.index',['parent_id'=>0])); ?>">Root</a></li>

                  <?php $__currentLoopData = $parentBr->breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><a href="<?php echo e(route('admin.variant-value.index',['parent_id'=>$item['id']])); ?>"><?php echo e($item['name']); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <li><a href="<?php echo e(route('admin.variant-value.index',['parent_id'=>$parentBr->id])); ?>"><?php echo e($parentBr->name); ?></a></li>
                </ol>
                <?php endif; ?>
                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Giá trị biến thể</th>
                                        <th>Biến thể</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="lb_item_delete">
                                        <td><?php echo e($value->id); ?></td>
                                        <td><?php echo e($value->value); ?></td>
                                        <td>
                                            <?php if($value->variant): ?>
                                                <span class="badge badge-primary">
                                                <?php echo e($value->variant->name); ?>

                                                   </span>
        
                                            <?php endif; ?>
                                        </td>
                                        <td class="lb_list_action_recusive">
                                            <a href="<?php echo e(route('admin.variant-value.edit',['id'=>$value->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                            
                                            <a data-url="<?php echo e(route('admin.variant-value.destroy',['id'=>$value->id])); ?>" class="btn btn-sm btn-danger lb_delete_recusive"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/admin/pages/variant-value/list.blade.php ENDPATH**/ ?>