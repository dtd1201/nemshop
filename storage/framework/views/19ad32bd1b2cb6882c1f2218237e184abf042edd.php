<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('css'); ?>
    <style>

        .badge-1 {
            background: #dc3545;
        }

        .badge-1 {
            background: #c3e6cb;
        }

        .badge-2 {
            background: #ffc107;
        }

        .badge-3 {
            background: #17a2b8;
        }

        .badge-4 {
            background: #28a745;
        }
        .info-box {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            border-radius: .25rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: .5rem;
            position: relative;
            width: 100%;
        }
        .info-box .info-box-icon {
            border-radius: .25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }
        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 10px;
        }
        .info-box .info-box-text, .info-box .progress-description {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .info-box .info-box-number {
            display: block;
            margin-top: .25rem;
            font-weight: 700;
        }
        .modal-header{
            background-color: #000;
            color: #fff;
        }
        .modal-header .close{
            opacity: 1;
            color: #fff;
        }
        .modal-title{
            margin: 0;

        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
             <div class="row">

                <?php if($user->active==0): ?>
                <div class="col-md-12">
                    <div class="alert alert-danger" style=" font-size: 150%;">
                        <strong>warning!</strong> Tài khoản của bạn chưa được kích hoạt <br>
                        <span style="font-size: 14px;">(Các thông số tài khoản sẽ là thông số của tài khoản sau khi được kích hoạt)</span>
                      </div>
                </div>
                <?php elseif($user->active==2): ?>
                <div class="col-md-12">
                    <div class="alert alert-danger" style=" font-size: 150%;">
                        <strong>warning!</strong> Tài khoản của bạn đã bị khóa <br>
                      </div>
                </div>
                <?php endif; ?>


                 <div class="col-sm-12">
                    <div class="wrap-history" style="font-size:13px;">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách điểm</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                               <thead>
                                  <tr>
                                     <th>STT</th>
                                     <th class="text-nowrap">Số điểm</th>
                                     <th>Loại điểm</th>
                                     <th>Lý do</th>
                                     <th class="text-nowrap">Thời gian</th>
                                  </tr>
                               </thead>
                               <tbody>
                                <?php if($data->count()>0): ?>

                                   <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <tr>
                                       <td><?php echo e($loop->index + 1); ?></td>
                                       <td>
                                          <?php echo e(abs($item->point)); ?>

                                       </td>
                                       <td class="text-nowrap">

                                        <?php echo e($typePoint[$item->type]['name']); ?>

                                         </td>
                                        <td>
                                          <?php echo e($item->content); ?>

                                       </td>
                                       <td class="text-nowrap"><?php echo e($item->created_at); ?></td>
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php else: ?>
                                  <tr>
                                      <td colspan="5">Chưa có thông tin</td>
                                  </tr>
                                  <?php endif; ?>
                               </tbody>
                            </table>
                         </div>
                       </div>
                 </div>
                 <?php if($data->count()>0): ?>
                    <div class="col-md-12">
                        <?php echo e($data->links()); ?>

                    </div>
                 <?php endif; ?>

             </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/pages/profile-thuong-phat.blade.php ENDPATH**/ ?>