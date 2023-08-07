<?php $__env->startSection('title',"Danh sách danh mục ".$categoryConfig['type'].""); ?>
<?php $__env->startSection('css'); ?>

    <style>
         .card-header  {
            color: #4c4d5a;
            border-color: #dcdcdc;
            background: #f6f6f6;
            text-shadow: 0 -1px 0 rgb(50 50 50 / 0%);
        }
        .title-card-recusive{
            font-size: 13px;
            background: #ECF0F5;
        }
        .lb_list_category{
            font-size: 13px;
            margin-bottom: 0;
        }
        .fa-check-circle{
            color: #169F85;
            font-size: 18px;
        }
        .fa-check-circle{
            color: #169F85;
            font-size: 18px;
        }
        .fa-times-circle{
            color: #f23b3b;
           font-size: 18px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Danh mục ".$categoryConfig['type']."","key"=>"Danh sách danh mục ".$categoryConfig['type'].""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(route($categoryConfig['routeNameAdd'],['parent_id'=>request()->parent_id])); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                    
                </div>
                <div class="card card-outline card-info">
                    <div class="card-header pt-2 pb-2">
                        <div class="cart-title">
                            <i class="fas fa-list"></i> Danh mục
                        </div>
                    </div>
                </div>
                <?php if(isset($parentBr)&&$parentBr): ?>
                <ol class="breadcrumb">
                  <li><a href="<?php echo e(route($categoryConfig['routeNameIndex'],['parent_id'=>0])); ?>">Root</a></li>

                  <?php $__currentLoopData = $parentBr->breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><a href="<?php echo e(route($categoryConfig['routeNameIndex'],['parent_id'=>$item['id']])); ?>"><?php echo e($item['name']); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(route($categoryConfig['routeNameIndex'],['parent_id'=>$parentBr->id])); ?>"><?php echo e($parentBr->name); ?></a></li>
                </ol>
                <?php endif; ?>

                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive lb-list-category" style="padding: 0; font-size:13px;">
                        <?php echo $__env->make('admin.components.category', [
                            'data' => $data,
                            'routeNameEdit'=> $categoryConfig['routeNameEdit'],
                            'routeNameAdd'=> $categoryConfig['routeNameAdd'],
                            'routeNameDelete'=> $categoryConfig['routeNameDelete'],
                            'routeNameOrder'=>'admin.loadOrderVeryModel',
                            'table'=> $categoryConfig['table'],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo e($data->appends(request()->input())->links()); ?>

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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/admin/pages/category/list.blade.php ENDPATH**/ ?>