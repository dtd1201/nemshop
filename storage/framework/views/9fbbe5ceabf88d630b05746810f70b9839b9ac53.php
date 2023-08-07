<?php $__env->startSection('title',"Danh sach sản phẩm"); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.product.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper lb_template_list_product">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Product","key"=>"Danh sách sản phẩm"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <a href="<?php echo e(route('admin.product.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                    <div class="group-button-right d-flex">
                        <form action="<?php echo e(route('admin.product.import.excel.database')); ?>" class="form-inline" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group" style="max-width: 250px">
                                <input type="file" class="form-control-file" name="fileExcel" accept=".xlsx" required>
                              </div>
                            <input type="submit" value="Import Execel" class=" btn btn-info ml-1">
                        </form>
                        <form class="form-inline ml-3" action="<?php echo e(route('admin.product.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Export Execel" class=" btn btn-danger">
                        </form>
                    </div>
                </div>

                 <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="card-tools w-100 mb-3">
                            <form action="<?php echo e(route('admin.product.index')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-0">
                                                <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Từ khóa">
                                                <div id="keyword_feedback" class="invalid-feedback">

                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC" <?php echo e($order_with=='dateASC'? 'selected':''); ?>>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" <?php echo e($order_with=='dateDESC'? 'selected':''); ?>>Ngày tạo giảm dần</option>
                                                    <option value="viewASC" <?php echo e($order_with=='viewASC'? 'selected':''); ?>>Lượt xem tăng dần</option>
                                                    <option value="viewDESC" <?php echo e($order_with=='viewDESC'? 'selected':''); ?>>Lượt xem giảm dần</option>
                                                    <option value="priceASC" <?php echo e($order_with=='priceASC'? 'selected':''); ?>>Giá tăng dần</option>
                                                    <option value="priceDESC" <?php echo e($order_with=='priceDESC'? 'selected':''); ?>>Giá giảm dần</option>
                                                    <option value="payASC" <?php echo e($order_with=='payASC'? 'selected':''); ?>>Số lượt mua tăng dần</option>
                                                    <option value="payDESC" <?php echo e($order_with=='payDESC'? 'selected':''); ?>>Số lượt mua giảm dần</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="" name="fill_action" class="form-control">
                                                    <option value="">-- Lọc --</option>
                                                    <option value="hot" <?php echo e($fill_action=='hot'? 'selected':''); ?>>Sản phẩm hot</option>
                                                    <option value="no_hot" <?php echo e($fill_action=='no_hot'? 'selected':''); ?>>Sản phẩm không hot</option>
                                                    <option value="active" <?php echo e($fill_action=='active'? 'selected':''); ?>>Sản phẩm hiển thị</option>
                                                    <option value="no_active" <?php echo e($fill_action=='no_active'? 'selected':''); ?>>Sản phẩm bị ẩn</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="categoryProduct" name="category" class="form-control">
                                                    <option value="">-- Tất cả danh mục --</option>
                                                    
                                                    <?php echo $option; ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 mb-0">
                                        <button type="submit" class="btn btn-success w-100">Search</button>
                                    </div>
                                    <div class="col-md-1 mb-0">
                                        <a  class="btn btn-danger w-100" href="<?php echo e(route('admin.product.index')); ?>">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                        <div class="count">
                            Tổng số bản ghi <strong><?php echo e($data->count()); ?></strong> / <?php echo e($totalProduct); ?>

                         </div>
                      </div>
                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Giá</th>
                                    <th class="white-space-nowrap">Số lượt xem</th>
                                    <th class="white-space-nowrap">Số lượt mua</th>
                                    <th class="white-space-nowrap">Avatar</th>
                                    <th class="white-space-nowrap">Active</th>
                                    <th class="white-space-nowrap">Nổi bật</th>
                                    <th class="white-space-nowrap">Danh mục</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                <tr>
                                    <td><?php echo e($loop->index); ?></td>
                                    <td><?php echo e($productItem->id); ?></td>
                                    <td><?php echo e($productItem->name); ?></td>

                                    <td class="text-nowrap"><strong><?php echo e(number_format($productItem->price)); ?></strong></td>
                                    <td class="text-nowrap"><?php echo e($productItem->view); ?></td>
                                    <td class="text-nowrap"><?php echo e($productItem->pay); ?></td>
                                    <td><img src="<?php echo e(asset($productItem->avatar_path)); ?>" alt="<?php echo e($productItem->name); ?>" style="width:80px;"></td>
                                    <td class="wrap-load-active" data-url="<?php echo e(route('admin.product.load.active',['id'=>$productItem->id])); ?>">
                                        <?php echo $__env->make('admin.components.load-change-active',['data'=>$productItem,'type'=>'sản phẩm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     </td>
                                     <td class="wrap-load-hot" data-url="<?php echo e(route('admin.product.load.hot',['id'=>$productItem->id])); ?>">
                                        <?php echo $__env->make('admin.components.load-change-hot',['data'=>$productItem,'type'=>'sản phẩm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     </td>
                                    <td><?php echo e(optional($productItem->getCategoryProduct)->name); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.product.edit',['id'=>$productItem->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a data-url="<?php echo e(route('admin.product.destroy',['id'=>$productItem->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo e($data->appends(request()->input())->links()); ?>

            </div>
        </div>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/pages/product/list.blade.php ENDPATH**/ ?>