<?php $__env->startSection('title',"Danh sách option"); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.product.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper lb_template_list_product">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"tab","key"=>"Danh sách option"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    
                    <a href="<?php echo e(route('admin.product.option.create',['product_id' => $product_id])); ?>" class="btn btn-info btn-md mb-2">+ Thêm mới</a>
                    
                    <a href="<?php echo e(route('admin.product.edit',['id'=>$product_id])); ?>" class="btn ml-2 btn-info btn-md mb-2">Sửa thông tin sản phẩm</a>
                </div>



                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th class="white-space-nowrap">Hình ảnh</th>
                         
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
                                <tr>
                                    <td><?php echo e($loop->index); ?></td>
                                    <td><?php echo e($tabItem->color); ?></td>
                                    <td>
                                        <img src="<?php echo e($tabItem->avatar_type?asset($tabItem->avatar_type): $shareFrontend['noImage']); ?>"
                                        alt="<?php echo e($tabItem->color); ?>" style="width:80px;"></td>
                            
                 
                                    <td>
                                        <a href="<?php echo e(route('admin.product.option.edit',['id'=>$tabItem->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a data-url="<?php echo e(route('admin.product.destroyOption',['id'=>$tabItem->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/sieuthithoitrangcaocap.com/httpdocs/resources/views/admin/pages/product/option-list.blade.php ENDPATH**/ ?>