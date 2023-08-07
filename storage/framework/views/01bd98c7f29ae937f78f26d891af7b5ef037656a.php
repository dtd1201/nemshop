<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php echo $__env->make('frontend.components.breadcrumbs',[
                'breadcrumbs'=>$breadcrumbs,
                'breadcrumbs'=>$breadcrumbs,
                'type'=>$typeBreadcrumb,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="blog-lienhe-hoptac">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="shadow  padding-content">
                                <div class="group-title">
                                    <div class="title text-left title-red">
                                        <?php echo e($data->name); ?>

                                    </div>
                                </div>
                                <div class="content-lienhe-hoptac">
                                    <?php echo $data->content; ?>

                                </div>
                                <div class="form-contact-hoptac">
                                    <form  action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="row p-75">
                                        <?php echo csrf_field(); ?>
                                        <div class="col-xs-12 p-75">
                                            <div class="title-form"><?php echo e(__('bao-gia.thong_tin_ca_nhan')); ?></div>
                                        </div>
                                        <div class="form-group col-xs-12 p-75">
                                            <label for=""><?php echo e(__('bao-gia.ho_va_ten')); ?></label>
                                            <input name="name" type="text" class="form-control" placeholder="<?php echo e(__('bao-gia.ho_va_ten')); ?>" required>
                                        </div>

                                        <div class="form-group col-md-8 col-sm-8 col-xs-12 p-75">
                                            <label for=""><?php echo e(__('bao-gia.so_dien_thoai')); ?></label>
                                            <input name="phone" type="text" class="form-control" placeholder="<?php echo e(__('bao-gia.so_dien_thoai')); ?>" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12 p-75">
                                            <label for="" style="width: 100%;"><?php echo e(__('bao-gia.gioi_tinh')); ?></label>
                                            <div class="border-input">
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="<?php echo e(__('bao-gia.name')); ?>">
                                                    <span class="design"></span>
                                                    <span class="text"><?php echo e(__('bao-gia.name')); ?></span>
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="<?php echo e(__('bao-gia.nu')); ?>">
                                                    <span class="design"></span>
                                                    <span class="text"><?php echo e(__('bao-gia.nu')); ?></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 col-sm-12 col-xs-12 p-75">
                                            <label for=""><?php echo e(__('bao-gia.email')); ?></label>
                                            <input name="email" type="text" class="form-control" placeholder="<?php echo e(__('bao-gia.email')); ?>">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12 p-75">
                                            <label for=""><?php echo e(__('bao-gia.dich_vu_khach_hang_quan_tam')); ?></label>
                                            <select name="service" class="form-control">
                                                <option value="0" disabled><?php echo e(__('bao-gia.chon_dich_vu')); ?></option>
                                                <?php if(isset($listCategoryHome)): ?>
                                                <?php $__currentLoopData = $listCategoryHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12 p-75">
                                            <label for=""><?php echo e(__('bao-gia.tuyen_du_dinh_van_chuyen')); ?></label>
                                            <div class="row p-75">
                                                <div class="col-md-6 col-sm-6 col-xs-6  p-75">
                                                    <input name="from" type="text" class="form-control" placeholder="<?php echo e(__('bao-gia.tu')); ?>">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6  p-75">
                                                    <input name="to" type="text" class="form-control" placeholder="<?php echo e(__('bao-gia.den')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12 p-75">
                                            <label for=""><?php echo e(__('bao-gia.mong_muon_cua_khach_hang')); ?></label>
                                            <textarea name="content" class="form-control" rows="8" placeholder="<?php echo e(__('bao-gia.mong_muon_cua_khach_hang')); ?>"></textarea>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12 p-75">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="" id="agree"><?php echo e(__('bao-gia.toi_dong_y_voi')); ?> <a href="" target="_blank"><?php echo e(__('bao-gia.dieu_khoan_dich_vu')); ?></a> </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 p-75">
                                            <div class="text-center">
                                                <button name="gone" type="submit" class="btn-view"><?php echo e(__('bao-gia.gui_yeu_cau')); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("#form-contact").submit(function(event) {
                if ($("#agree").prop("checked")) {
                    return true
                } else {
                    alert("<?php echo e(__('bao-gia.ban_phai_dong_y')); ?>");
                    return false;
                }
            });
        });
    </script>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/frontend/pages/baogia.blade.php ENDPATH**/ ?>