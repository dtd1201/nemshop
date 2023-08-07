<?php $__env->startSection('title',"danh sach category post"); ?>
<?php $__env->startSection('css'); ?>
<style>
    @import  url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
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
    body {
		font-family: 'Open Sans', sans-serif;
		background-color: #fff!important;
	}

	.justify-content-between {
		text-align: right;
	}
	.justify-content-between a {
		text-align: right;
	}
	.content-header h1 {
		font-size: 25px;
		margin: 0;
	}
	.card-primary.card-outline {
		border-top: 3px solid #333;
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Quản lý tin tức","key"=>"Danh mục"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                  <div class="text-right w-100">
                    <a href="<?php echo e(route('admin.categorypost.create',['parent_id'=>request()->parent_id??0])); ?>" class="btn btn-info btn-md mb-2 ">+ Thêm mới</a>
                  </div>

                    
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
                  <li><a href="<?php echo e(route('admin.categorypost.index',['parent_id'=>0])); ?>">Root</a></li>

                  <?php $__currentLoopData = $parentBr->breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><a href="<?php echo e(route('admin.categorypost.index',['parent_id'=>$item['id']])); ?>"><?php echo e($item['name']); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(route('admin.categorypost.index',['parent_id'=>$parentBr->id])); ?>"><?php echo e($parentBr->name); ?></a></li>
                </ol>
                <?php endif; ?>

                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive lb-list-category">
                        <?php echo $__env->make('admin.components.category', [
                            'data' => $data,
                            'routeNameEdit'=>'admin.categorypost.edit',
                            'routeNameAdd'=>'admin.categorypost.create',
                            'routeNameDelete'=>'admin.categorypost.destroy',
                            'routeNameOrder'=>'admin.loadOrderVeryModel',
                            'table'=>'category_posts',
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/sieuthithoitrangcaocap.com/httpdocs/resources/views/admin/pages/categorypost/list.blade.php ENDPATH**/ ?>