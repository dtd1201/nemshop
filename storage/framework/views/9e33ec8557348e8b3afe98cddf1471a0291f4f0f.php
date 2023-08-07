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
                            <a class="btn btn-info" href="<?php echo e(route('profile.editInfo')); ?>">Chỉnh sửa thông tin</a> <br>
                            <a class="btn btn-info" href="<?php echo e(route('profile.listRose')); ?>">Danh sách hoa hồng</a> <br>
                            <a class="btn btn-info" href="<?php echo e(route('profile.listMember')); ?>">Danh sách thành viên</a> <br>
                            <a class="btn btn-info" href="<?php echo e(route('profile.createMember')); ?>">Them thanh vien</a> <br>
                            <a class="btn btn-info" href="<?php echo e(route('profile.history')); ?>">Lịch sử mua hàng</a>
                            <h1>Thống kê điểm</h1>
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
            </div>
            <?php if($openPay): ?>
                <div class="wrap-pay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <?php if(session("alert")): ?>
                                  <div class="alert alert-success">
                                      <?php echo e(session("alert")); ?>

                                  </div>
                                <?php elseif(session('error')): ?>
                                  <div class="alert alert-warning">
                                      <?php echo e(session("error")); ?>

                                  </div>
                                <?php endif; ?>

                                <form action="<?php echo e(route('profile.drawPoint')); ?>" method="POST">
                                  <?php echo csrf_field(); ?>
                                  <div class="row">
                                      <div class="col-md-8">
                                          <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                  <h3 class="card-title">Rút điểm</h3>
                                                  <div class="desc">Rút điểm chỉ được mở từ ngày 1- 2 hàng tháng</div>
                                              </div>
                                              <div class="card-body table-responsive p-3">
                                                  <div class="form-group">
                                                      <label for="">Số điểm rút</label>
                                                      <input
                                                          type="text"
                                                          class="form-control"
                                                          id=""
                                                          value="<?php echo e(old('pay')); ?>"  name="pay"
                                                          placeholder="Nhập số điểm"
                                                      >
                                                      <?php $__errorArgs = ['pay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                          <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                  </div>

                                                  <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" name="checkrobot" id="checkrobot" required>
                                                    <label class="form-check-label" for="checkrobot">Check me out</label>
                                                  </div>
                                                  <?php $__errorArgs = ['checkrobot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                  <div class="form-group">
                                                     <button type="submit" class="btn btn-primary">Chấp nhận</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                              </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(function(){
        $(document).on('click','.pt_icon_right',function(){
            event.preventDefault();
            $(this).parentsUntil('ul','li').children("ul").slideToggle();
            $(this).parentsUntil('ul','li').toggleClass('active');
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/frontend/pages/profile.blade.php ENDPATH**/ ?>