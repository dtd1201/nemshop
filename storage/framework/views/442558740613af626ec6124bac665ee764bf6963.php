<div class="wrap-load-user">
    <div class="row">
        <div class="col-sm-12">
            <div class="list-info-user mb-5">
                <ul class="row">

                    <li class="col-sm-12">
                        <div class="avatar text-center p-3">
                            <img src="<?php echo e($user->avatar_path?$user->avatar_path: $shareFrontend['userNoImage']); ?>" alt="<?php echo e($user->name); ?>" class="mb-3 rounded-circle" style="width:60px; height: 60px; object-fit: cover;">
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
        <div class="col-sm-12 mb-3">
            <div class="row">
                <div class="col-sm-6">
                    <label class="mb-0">Ảnh chứng minh thư mặt trước</label>
                    <div>
                        <?php if($user->image_cmt_before): ?>
                            <img style="width: 120px" src="<?php echo e(asset($user->image_cmt_before)); ?>" alt="">
                        <?php else: ?>
                            Chưa cập nhật
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="mb-0">Ảnh chứng minh thư mặt sau</label>
                    <div>
                        <?php if($user->image_cmt_after): ?>
                            <img style="width: 120px" src="<?php echo e(asset($user->image_cmt_after)); ?>" alt="">
                        <?php else: ?>
                            Chưa cập nhật
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mb-3">
            <div class="row">
                <?php if(isset($sumEachType)): ?>
                    <?php $__currentLoopData = $sumEachType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item['type'] == 4 || $item['type'] == 6): ?>

                        <?php else: ?>
                            <div class="col-md-6 col-sm-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-cart-plus"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> <?php echo e($typePoint[$item->type]['name']); ?></span>
                                        <span class="info-box-number"> <strong><?php echo e($item->total); ?></strong> điểm</span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-cart-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng số điểm hiện có</span>
                            <span class="info-box-number"> <strong><?php echo e($sumPointCurrent ?? 0); ?></strong> điểm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="wrap-load-active" data-url="<?php echo e(route('admin.user_frontend.kicUser',['id'=>$user->id])); ?>">
                <?php echo $__env->make('admin.components.load-change-kic-user',['data'=>$user,'type'=>'user'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

</div>
<?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/components/user_frontend-detail.blade.php ENDPATH**/ ?>