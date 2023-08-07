

    

    <div class="wrap-partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="list-item autoplay5-doitac category-slide-1">

                        <?php if($footer['doitac']): ?>
                        <?php $__currentLoopData = $footer['doitac']->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="box">
                                <a href=""><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-footer-top">
                            <div class="logo-footer">
                                <a href="<?php echo e(URL::to('/')); ?>">
                                    <img src="<?php echo e(asset ($footer['logo']->image_path)); ?>" alt="Logo">
                                </a>
                            </div>
                            <div class="search-footer">
                                <h3>Đăng ký nhận bản tin định kỳ</h3>
                                <div class="newsletter">
                                    <form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="newsletter-input">
                                            <i class="fas fa-envelope"></i>
                                            <div class="newsletter-email"><input type="Email" name="Email" placeholder="Nhập email của bạn"></div>
                                            <button type="submit"   class="subscribe-button text btn btn-primary btn-form-submit" name="subscribe">
                                                Đăng ký ngay
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="border-top">
                            <div class="row">
                                <?php if($footer['about']): ?>
                                <div class="col-md-5  col-sm-12 col-item-footer">
                                    <div class="title-footer">
                                      <?php echo e($footer['about']->name); ?>

                                    </div>
                                    <div class="desc-foot">
                                   <?php echo $footer['about']->description; ?>

                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="col-md-7 col-sm-12">
                                    <div class="row">
                                        <?php if($footer['linkFooter']): ?>
                                        <?php $__currentLoopData = $footer['linkFooter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12  col-item-footer">
                                            <div class="title-footer">
                                               <?php echo e($item->name); ?>

                                            </div>
                                            <div class="footer-link">
                                                <ul>
                                                    <?php $__currentLoopData = $item->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li> <a href="<?php echo e($item2->slug); ?>"> <i class="fas fa-chevron-right"></i> <?php echo e($item2->name); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($footer['dataAddress']): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12  col-item-footer">
                                            <div class="title-footer">
                                               <?php echo e($footer['dataAddress']->name); ?>

                                            </div>
                                            <div class="footer-link">

                                                <ul>
                                                    <?php $__currentLoopData = $footer['dataAddress']->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li> <a href="tel:<?php echo e(str_replace(" ","",$item2->slug)); ?>"><?php echo $item2->value; ?> <?php echo e($item2->slug); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </ul>
                                            </div>
                                        </div>
                                        <?php endif; ?>
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
                    <div class="col-sm-12">
                        <?php if($footer['linkFooterBottom']): ?>
                            <div class="box-footer-bottom">
                                <h3><?php echo e($footer['linkFooterBottom']->name); ?>:</h3>
                                <ul class="link-footer-bottom">
                                    <?php $__currentLoopData = $footer['linkFooterBottom']->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="pt_contact_vertical">
    <div class="contact-mobile">
        <div class="contact-item">
            <a class="contact-icon zalo" title="zalo" href="https://zalo.me/<?php echo e($header['hotline']->value); ?>" target="_blank">
                <img src="<?php echo e(asset('frontend/images/zalo-icon.png')); ?>" alt="icon">
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon">
    <div class="tel_phone">
        <a href="tel:<?php echo e($header['hotline']->value); ?>"><?php echo e($header['hotline']->value); ?></a>
    </div>
    <a href="tel:<?php echo e($header['hotline']->value); ?>">
        <div class="quick-alo-ph-circle"></div>
        <div class="quick-alo-ph-circle-fill"></div>
        <div class="quick-alo-ph-img-circle"></div>
    </a>
</div>
<div class="back_to_top hidden-xs" id="back-to-top">
    <a onclick="topFunction();">
        <span>Về đầu trang</span>
        <img src="<?php echo e(asset('frontend/images/icon_back_to_top.png')); ?>">
    </a>
</div>
<div class="contact_fixed">
    <li><a href="tel:"><i class="fa fa-phone"></i></a></li>
    <li>
        <a href="https://zalo.me/<?php echo e($header['hotline']->value); ?>"><img src="<?php echo e(asset('frontend/images/zalo2.png')); ?>" alt="Zalo"></a>
    </li>
    <li>
        <a href="https://m.me/"><img src="<?php echo e(asset('frontend/images/messenger2.png')); ?>" alt="Messenger"></a>
    </li>
    <li>
        <a onclick="topFunction();" href="javascript:;"><img src="<?php echo e(asset('frontend/images/icon_back_to_top.png')); ?>" alt="Back to top"></a>
    </li>
</div>



<script>
        // ajax load form
        $(document).on('submit',"[data-ajax='submit']",function(){
            let formValues = $(this).serialize();
            let dataInput=$(this).data();
            // dataInput= {content: "#content", href: "#modalAjax", target: "modal", ajax: "submit", url: "http://127.0.0.1:8000/contact/store-ajax"}

            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",
                success: function (response) {
                    if(response.code==200){
                        if(dataInput.content){
                            $(dataInput.content).html(response.html);
                        }
                        if(dataInput.target){
                            switch (dataInput.target) {
                                case 'modal':
                                    $(dataInput.href).modal();
                                    break;
                                case 'alert':
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response.html,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                default:
                                    break;
                            }
                        }
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.html,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                   // console.log( response.html);
                },
                error:function(response){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
            return false;
        });
    </script>



<?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>