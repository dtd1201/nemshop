<?php $__env->startSection('title',"danh sach category post"); ?>
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
<style>
	body {
		font-family: 'Open Sans', sans-serif;
		background-color: #fff!important;
	}
	@import  url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
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
                    <a href="<?php echo e(route('admin.categorypost.create')); ?>" class="btn btn-info btn-md mb-2">+ Thêm mới</a>
                    <!--<div class="group-button-right d-flex">
                        <form action="<?php echo e(route('admin.categorypost.import.excel.database')); ?>" class="form-inline" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group" style="max-width: 250px">
                                <input type="file" class="form-control-file" name="fileExcel" accept=".xlsx" required>
                              </div>
                            <input type="submit" value="Import Execel" class=" btn btn-info ml-1">
                        </form>
                        <form class="form-inline ml-3" action="<?php echo e(route('admin.categorypost.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Export Execel" class=" btn btn-danger">
                        </form>
                    </div>-->
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive lb-list-category">
                        <?php echo $__env->make('admin.components.category', [
                            'data' => $data,
                            'routeNameEdit'=>'admin.categorypost.edit',
                            'routeNameAdd'=>'admin.categorypost.create',
                            'routeNameDelete'=>'admin.categorypost.destroy',
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/vision.vsscorp.vn/httpdocs/resources/views/admin/pages/categorypost/list.blade.php ENDPATH**/ ?>