<div class="wrap-load-user">
    <div class="row">
        <div class="col-sm-12">
         <strong>Họ tên</strong>   <?php echo e($user->name); ?> <br>
         <strong>Username</strong>    <?php echo e($user->username); ?> <br>
         <strong>Số điện thoại </strong>    <?php echo e($user->phone); ?> <br>
         <strong>Địa chỉ </strong> <?php echo e($user->address); ?> <br>
         <strong>Tình trạng </strong>    <?php echo e($user->active==1?'Active':'Disable'); ?> <br>

         <strong>Người giới thiệu </strong>     <?php echo e($user->parent_id?$user->parent->name:""); ?> <br>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 ">
            Tổng số điểm hiện có
             Số điểm : <?php echo e($sumPointCurrent); ?>

         </div>
         <?php if(isset($sumEachType)): ?>
             <?php $__currentLoopData = $sumEachType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-lg-3 col-md-6 col-sm-12 ">
                     Kiểu : <?php echo e($typePoint[$item->type]['name']); ?> <br>
                     Số điểm : <?php echo e($item->total); ?>

                 </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
    </div>

</div>
<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/admin/components/user_frontend-detail.blade.php ENDPATH**/ ?>