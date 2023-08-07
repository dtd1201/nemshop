

    

    
    <div class="dangky_cuoitrang">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <?php if(isset($footer['sign_now']) && $footer['sign_now']): ?>
                    <div class="box_info">
                        <div class="title">
                            <?php echo e($footer['sign_now']->name); ?>

                        </div>
                        <div class="giam">
                            <?php echo $footer['sign_now']->description; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="box_form_dky">
                        <form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                            <?php echo csrf_field(); ?>
                            <input class="form-control" type="email" name="email" placeholder="Nhập email của bạn!" required>
                            <button name="submit">Gửi <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                        <div class="box-footer-main-info">
                            <?php if(isset($footer['dataAddress']) && $footer['dataAddress']): ?>
                            <div class="logo-footer">
                                <a href="<?php echo e(makeLink('home')); ?>"><img src="<?php echo e(asset($footer['dataAddress']->image_path)); ?>" alt="Logo footer"></a>
                            </div>
                            <div class="luxury">
                                Đông Phương Luxury
                            </div>
                            
                                <div class="content-address-footer">
                                    <?php echo $footer['dataAddress']->description; ?>

                                </div>
                                <div class="list-address-footer">
                                    <ul>
                                        <?php $__currentLoopData = $footer['dataAddress']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <strong><?php echo e($item->name); ?></strong>
                                                <span>: <?php echo e($item->value); ?></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                                <div class="title-footer">
                                    Danh mục sản phẩm
                                </div>
                                <div class="list-link-footer">
                                    <ul class="footer-link">
                                        <?php if(isset($footer['listCategory']) && $footer['listCategory']->count()>0 ): ?>
                                        <?php $__currentLoopData = $footer['listCategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($item->slug_full); ?>"><?php echo e($item->name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
								<?php if(isset($footer['bao_hanh_hotline']) && $footer['bao_hanh_hotline']->count()>0 ): ?>
								<div class="hotline_title">HOTLINE</div>
                                <div class="fy">
                                    <span class="a"><?php echo e($footer['bao_hanh_hotline']->name); ?></span>
                                    <span class="b"><b><?php echo e($footer['bao_hanh_hotline']->slug); ?></b> <?php echo e($footer['bao_hanh_hotline']->value); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>

                            <?php if(isset($footer['listChinhsach'])&&$footer['listChinhsach']): ?>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                                    <div class="title-footer">
                                    <?php echo e($footer['listChinhsach']->name); ?>

                                    </div>
                                    <div class="list-link-footer">
                                        <ul class="footer-link">
                                            <?php $__currentLoopData = $footer['listChinhsach']->posts()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e($item->slug_full); ?>"><?php echo e($item->name); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                                <div class="title-footer">
                                    Kết nới với Đông Phương
                                </div>

                                <ul class="pt_social">
                                    <?php if(isset($footer['socialParent']) && $footer['socialParent']): ?>
                                        <?php $__currentLoopData = $footer['socialParent']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e($social->slug); ?>" target="blank" rel="noopener noreferrer">
                                                    <?php if($social->image_path != null): ?>
                                                    <img src="<?php echo e(asset($social->image_path)); ?>" alt="<?php echo e($social->name); ?>">
                                                    <?php else: ?>
                                                    <?php echo $social->value; ?>

                                                    <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>

                                <div class="dk_bct">
                                    <?php if(isset($footer['bct']) && $footer['bct']->count()>0 ): ?>
                                    <div class="bct">
                                        <a href="<?php echo e($footer['bct']->slug); ?>">
                                            <img src="<?php echo e(asset($footer['bct']->image_path)); ?>" alt="<?php echo e($footer['bct']->name); ?>">
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if(isset($footer['dmca']) && $footer['dmca']->count()>0 ): ?>
                                    <div class="dmca">
                                        <a href="<?php echo e($footer['dmca']->slug); ?>">
                                            <img src="<?php echo e(asset($footer['dmca']->image_path)); ?>" alt="<?php echo e($footer['dmca']->name); ?>">
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(isset($footer['bao_hanh']) && $footer['bao_hanh']->count()>0 ): ?>
                                <div class="fy">
                                    <span class="a"><?php echo e($footer['bao_hanh']->name); ?></span>
                                    <span class="b"><b><?php echo e($footer['bao_hanh']->slug); ?></b> <?php echo e($footer['bao_hanh']->value); ?></span>
                                </div>
                                <?php endif; ?>
								<?php if(isset($footer['mapss']) && $footer['mapss']->count()>0 ): ?>
								<div class="maps_footer">
									<?php echo $footer['mapss']->description; ?>

								</div>
								<?php endif; ?>

                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="coppy-right">
                           <?php if(isset($footer['coppy_right'])&&$footer['coppy_right']): ?>
                           <?php echo e($footer['coppy_right']->value); ?>

                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="back_to_top" id="back-to-top">
                            <a onclick="topFunction();">
                                <span>Về đầu trang</span>
                                <img src="<?php echo e(asset('frontend/images/icon_back_to_top.png')); ?>">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade form-tv" id="modal-form-dky" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="modal-body">
            <form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
               <?php echo csrf_field(); ?>
                <input type="hidden" name="title" value="Đăng ký tư vấn">
                <div class="box-content-form">
                    <h4 class="modal-title">
                        <a href=""><img src="<?php echo e(asset(optional($header['logo'])->image_path)); ?>"></a>
                    </h4>
                    <div class="title-form-m">
                        Đăng ký tư vấn
                    </div>
                    <div class="title-form-sm">
                        Liên hệ với chúng tôi để được hỗ trợ
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="name" placeholder="Họ tên">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="content" placeholder="Nội dung tư vấn">
                    </div>
                    <button type="submit">Gửi đi</button>
                    <div class="text-center">
                        <a class="close-form-modal" data-dismiss="modal" aria-label="Close">Đóng lại X</a>
                    </div>
                    
                </div>
            </form>
        </div>
        
      </div>
    </div>
</div>


<div class="pt_contact_vertical">
    <div class="contact-mobile">
        <?php if(isset($footer['zalo'])&&$footer['zalo']): ?>
        <div class="contact-item">
            <a class="contact-icon zalo" title="zalo" href="https://zalo.me/<?php echo e($footer['zalo']->slug); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo e(asset('frontend/images/zalo-icon.png')); ?>" alt="icon">
            </a>
        </div>
        <?php endif; ?>

        <?php if(isset($footer['messenger'])&&$footer['messenger']): ?>
        <div class="contact-item">
            <a class="contact-icon fb-mess" title="facebook" href="https://m.me/<?php echo e($footer['messenger']->slug); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo e(asset('frontend/images/facebook-icon.png')); ?>" alt="icon">
            </a>
        </div>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</div>

<div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon">
    <div class="tel_phone">
        <a href="tel:<?php echo e(optional($footer['hotline'])->value); ?>"><?php echo e(optional($footer['hotline'])->value); ?></a>
    </div>

    <a href="tel:<?php echo e(optional($footer['hotline'])->value); ?>">
        <div class="quick-alo-ph-circle"></div>
        <div class="quick-alo-ph-circle-fill"></div>
        <div class="quick-alo-ph-img-circle"></div>
    </a>


</div>




<script>

        // ajax load form
        $(document).on('submit',"[data-ajax='submit']",function(){
            let myThis=$(this);
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
                        myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val('');
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



<?php /**PATH /var/www/vhosts/largevendor.com/demo4.largevendor.com/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>