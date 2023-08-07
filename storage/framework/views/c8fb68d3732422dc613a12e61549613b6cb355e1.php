<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            
            <div class="wrap-content-main">

                    <div class="row">
                        <div class="col-sm-12">
							<div class="card-header">
								<h3 class="card-title">Danh sách thành viên</h3>
							</div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Tên </th>
                                      <th>SỐ CMT</th>
                                      <th>Level</th>
                                      <th>H</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php if(isset($data)): ?>
                                        <?php if(count($data)>0): ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($item['name']); ?></td>
                                                <td>
                                                    <?php echo e($item['cmt']??""); ?>

                                                </td>
                                                <td><?php echo e($item['active']?'CVKD':'CTV'); ?></td>
                                                <td>H<?php echo e($item['level']); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <tr><td colspan="4" class="text-center p-3">Bạn chưa có thành viên  nào</td></tr>
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

<?php echo $__env->make('frontend.layouts.main-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/pages/profile-list-member.blade.php ENDPATH**/ ?>