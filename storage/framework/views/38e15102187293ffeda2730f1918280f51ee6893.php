<?php $__env->startSection('title',"Danh sánh slider"); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper lb_template_list_slider">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Slider","key"=>"Danh sách slider"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <a href="<?php echo e(route('admin.slider.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                <div class="card-header">
                    <div class="card-tools w-100 mb-3">
                        <form action="<?php echo e(route('admin.slider.index')); ?>" method="GET">
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
                                    <button type="submit" class="btn btn-success w-100">Tìm kiếm</button>
                                </div>
                                <div class="col-md-1 mb-0">
                                    <a  class="btn btn-danger w-100" href="<?php echo e(route('admin.slider.index')); ?>">Làm lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    
                                     <th class="white-space-nowrap">Hình ảnh</th>
                                     <th class="white-space-nowrap">Hiển thị</th>
                                     <th class="white-space-nowrap">Danh mục</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index); ?></td>
                                    <td><?php echo e($sliderItem->id); ?></td>
                                    <td><?php echo e($sliderItem->name); ?></td>
                                    
                                    <td><img src="<?php echo e(asset($sliderItem->image_path)); ?>" alt="<?php echo e($sliderItem->name); ?>" style="width:80px;"></td>
                                    <td class="wrap-load-active" data-url="<?php echo e(route('admin.slider.load.active',['id'=>$sliderItem->id])); ?>">
                                        <?php echo $__env->make('admin.components.load-change-active',['data'=>$sliderItem,'type'=>'slider'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     </td>
                                     <td>
                                         <?php echo e($sliderItem->category->name ?? ''); ?>

                                     </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.slider.edit',['id'=>$sliderItem->id])); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <a data-url="<?php echo e(route('admin.slider.destroy',['id'=>$sliderItem->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/admin/pages/slider/list.blade.php ENDPATH**/ ?>