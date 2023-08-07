
<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12 content-box">
                    <div class="footer-layer">
                        <div class="title-footer">
                            <?php echo e($footer['dataAddress']->value); ?>

                        </div>
                        <ul class="address_footer">
                            <?php $__currentLoopData = $footer['dataAddress']->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><strong><?php echo e($item->name); ?></strong> <?php echo e($item->value); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>

                <?php $__currentLoopData = $footer['linkFooter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-2 col-md-6 col-sm-12 content-box">
                    <div class="footer__other">
                        <div class="title-footer">
                            <span>   <?php echo e($item->name); ?> </span>
                        </div>
                        <div class="footer__policy">
                            <?php $__currentLoopData = $item->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <a href="<?php echo e($item2->slug); ?>"> <?php echo e($item2->name); ?></a>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <div class="col-lg-4 col-md-6 col-sm-12 content-box">
                    <div class="footer__other">
                        <div class="title-footer">
                            <span>  <?php echo e($footer['registerSale']->name); ?></span>
                        </div>
                        <div class="desc-footer">
                            <?php echo e($footer['registerSale']->value); ?>

                        </div>

                        <div class="box-form-2">
                            <form action="index.php?act=newsletter" method="post" name="frmnewsletter" id="frmnewsletter" onsubmit="return validate('Vui lòng nhập email của bạn.');">
                                <div class="form-group">
                                    <input type="text" name="txtemail" class="form-control" placeholder="Nhập địa chỉ email">
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng ký ngay</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="list-pay-footer">
                                <div class="title-footer">
                                   <?php echo e($footer['pay']->value); ?>

                                </div>
                                <div class="image">
                                    <a href="<?php echo e($footer['pay']->slug); ?>">
                                        <img src="<?php echo e($footer['pay']->image_path); ?>" alt="<?php echo e($footer['pay']->name); ?>">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="box-social-footer">
                                <div class="title-footer">
                                    Kết nối với chúng tôi
                                </div>
                                <div class="social-footer">
                                    <ul>
                                        <?php $__currentLoopData = $header["socialParent"]->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class=""><a href="<?php echo e($social->slug); ?>"><?php echo $social->value; ?> </a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="cpy">
                        <p class="text-xs-center">
                            <?php echo e($footer['coppy_right']->value); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>






<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>