<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('css'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            
            <div class="wrap-content-main">
                <div class="row">
                    <div class="col-sm-12">
						<div class="card-header">
							<h3 class="card-title">Danh sách thu nhập</h3>
						</div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Thu nhập</th>
                                    <!-- <th>Thuế thu nhập cá nhân tại nguồn</th>
                                    <th>Thu nhập còn lại được rút</th> -->
                                    <th>Từ tài khoản</th>
                                    <th>Thời gian</th>
                                    <th>Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php if(isset($data)): ?>
                                    <?php if($data->count()>0): ?>
                                        <?php
                                            $totalPoint = 0;
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $totalPoint += $item->point;
                                            ?>
                                            <tr>
                                                <td><?php echo e($item->point); ?></td>
                                                
                                            
                                                <td>
                                                
                                                    <?php if($item->userorigin_id): ?>
                                                    <?php echo e($item->userOriginPoint->name); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date_format($item->created_at,'d/m/Y H:i:s')); ?></td>
                                                <?php if($item->type==8): ?>
                                                <td><?php echo e($typePoint[8]['name']); ?></td>
                                                <?php else: ?>
                                                <td><?php echo e($typePoint[$item->type]['name']); ?></td>
                                                <?php endif; ?>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td colspan="4"><strong>Tổng: <?php echo e($totalPoint); ?> = <?php echo e(number_format($totalPoint * 1000)); ?> VNĐ</strong></td>
                                        </tr>
                                    <?php else: ?>
                                    <tr><td colspan="4" class="text-center p-3">Bạn chưa được nhận thu nhập nào</td></tr>
                                    <?php endif; ?>

                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/pages/profile-list-rose.blade.php ENDPATH**/ ?>