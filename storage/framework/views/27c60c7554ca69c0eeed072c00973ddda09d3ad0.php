<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            
            <div class="wrap-content-main wrap-template-product template-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Danh sách hoa hồng</h1>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Hoa hồng</th>
                                      <th>Nhận từ</th>
                                      <th>Thời gian</th>
                                      <th>Ghi chú</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                      <?php if(isset($data)): ?>
                                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                <td><?php echo e($item->point); ?></td>
                                                <td>
                                                    <?php if($item->userorigin_id): ?>

                                                        <?php echo e($item->userOriginPoint->name); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date_format($item->created_at,'d/m/Y H:i:s')); ?></td>
                                                <td><?php echo e($typePoint[$item->type]['name']); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

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

<?php echo $__env->make('frontend.layouts.main-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/frontend/pages/profile-list-rose.blade.php ENDPATH**/ ?>