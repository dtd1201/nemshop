<div class="wrap-load-user">
    <div class="row">
        <div class="col-sm-12">
            <div class="list-info-user mb-5">
                <ul class="row">

                    <li class="col-sm-12">
                        <div class="avatar text-center p-3">
                            <img src="<?php echo e($user->avatar_path?$user->avatar_path: $shareFrontend['userNoImage']); ?>" alt="<?php echo e($user->name); ?>" class="mb-3 rounded-circle" style="width:60px;">
                            <h4> <strong>Trạng thái thông tin</strong>   <?php echo e($user->status==1?"Chưa đầy đủ":"Hoàn thành"); ?></h4>
                        </div>
                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Họ tên</strong>   <?php echo e($user->name?$user->name:"Chưa cập nhập"); ?>

                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Email</strong>   <?php echo e($user->email?$user->email:"Chưa cập nhập"); ?>

                    </li>
                    <li class="col-sm-12 col-md-6">
                        <strong>Tài khoản</strong>    <?php echo e($user->username?$user->username:"Chưa cập nhập"); ?>

                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Phone</strong>   <?php echo e($user->phone?$user->phone:"Chưa cập nhập"); ?>

                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Địa chỉ</strong>   <?php echo e($user->address?$user->address:"Chưa cập nhập"); ?>

                    </li>

                    <li class="col-sm-12 col-md-6"> <strong>Tình trạng </strong>    <?php echo e($user->active==1?'Hiện':'Ẩn'); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>Người giới thiệu </strong>     <?php echo e($user->parent_id?$user->parent->name:"Không có"); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>Ngày sinh </strong>    <?php echo e($user->date_birth? $user->date_birth:"Chưa cập nhập"); ?>   </li>
                    <li class="col-sm-12 col-md-6"> <strong>HKTT </strong>     <?php echo e($user->hktt?$user->hktt:"Chưa cập nhập"); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>CMT </strong>     <?php echo e($user->cmt?$user->cmt:"Chưa cập nhập"); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>STK </strong>     <?php echo e($user->stk?$user->stk:"Chưa cập nhập"); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>CTK </strong>     <?php echo e($user->ctk?$user->ctk:"Chưa cập nhập"); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>Ngân hàng </strong>     <?php echo e($user->bank?$user->bank->name:"Chưa cập nhập"); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>Chi nhánh ngân hàng </strong>     <?php echo e($user->bank_branch?$user->bank_branch:"Chưa cập nhập"); ?> </li>
                    <li class="col-sm-12 col-md-6"> <strong>Giới tính </strong>     <?php echo e($user->sex==1?"name":($user->sex==0?"Nữ":"Chưa  cập nhập")); ?> </li>
                </ul>
            </div>

        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                       <span class="info-box-icon bg-info"><i class="fas fa-cart-plus"></i></span>
                       <div class="info-box-content">
                          <span class="info-box-text">Tổng số điểm hiện có</span>
                          <span class="info-box-number"> <strong><?php echo e($sumPointCurrent); ?></strong> điểm</span>
                       </div>
                    </div>
                 </div>

                 <?php if(isset($sumEachType)): ?>
                 <?php $__currentLoopData = $sumEachType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                 <div class="col-md-6 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-cart-plus"></i></span>
                        <div class="info-box-content">
                           <span class="info-box-text"> <?php echo e($typePoint[$item->type]['name']); ?></span>
                           <span class="info-box-number"><?php echo e($item->total); ?> <strong>điêm</strong></span>
                        </div>
                     </div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/admin/components/user_frontend-detail.blade.php ENDPATH**/ ?>