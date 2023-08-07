

    

    
    <div class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-item-footer">
                       <div class="box-footer-main-info">

                            <div class="logo-footer">
                                <?php if(isset($footer['logo'])&&$footer['logo']): ?>
                                <a href=""><img src="<?php echo e(asset($footer['logo']->image_path)); ?>" alt="Logo footer"></a>
                                <?php endif; ?>
                            </div>
                            <?php if(isset($footer['dataAddress']) && $footer['dataAddress']): ?>
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
                            <div class="time-work">
                                <div class="time-work-info">
                                    <?php if(isset($footer['timeWork'])&&$footer['timeWork']): ?>
                                        <h3><?php echo e($footer['timeWork']->name); ?></h3>
                                        <div class="desc">
                                            <?php echo $footer['timeWork']->description; ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="bct">
                                    <?php if(isset($footer['bocongthuong'])&&$footer['bocongthuong']): ?>
                                    <a href="<?php echo e($footer['bocongthuong']->slug); ?>">
                                        <img src="<?php echo e(asset($footer['bocongthuong']->image_path)); ?>" alt="<?php echo e($footer['bocongthuong']->name); ?>">
                                    </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-12  col-sm-12">
                        <div class="row">
                            <?php if(isset($footer['linkFooter'])&&$footer['linkFooter']): ?>
                                <?php $__currentLoopData = $footer['linkFooter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linkFooter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-sm-12 col-item-footer">
                                    <div class="title-footer">
                                    <?php echo e($linkFooter->name); ?>

                                    </div>
                                    <div class="list-link-footer">
                                        <ul class="footer-link">
                                            <?php $__currentLoopData = $linkFooter->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <div class="col-md-6 col-sm-12 col-item-footer">
                                <div class="title-footer">
                                     Đăng ký tư vấn
                                </div>
                                <div class="form-footer">
                                    <form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="title" value="Đăng ký mua bán ký gửi">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="" placeholder="Họ tên" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="" placeholder="Nội dung" name="content">
                                        </div>

                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary btn-submit-1"><i class="far fa-envelope"></i> Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="col-sm-12">
                                    <ul class="pt_social">
                                        <li>Kết nối mạng xã hội</li>
                                        <?php if(isset($footer['socialParent']) && $footer['socialParent']): ?>
                                            <?php $__currentLoopData = $footer['socialParent']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e($social->slug); ?>" target="blank"><?php echo $social->value; ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
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
        <div class="contact-item">
            <a class="contact-icon zalo" title="zalo" href="https://zalo.me/<?php echo e(optional($footer['hotline'])->value); ?>" target="_blank">
                <img src="<?php echo e(asset('frontend/images/zalo-icon.png')); ?>" alt="icon">
            </a>
        </div>
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



<?php /**PATH /var/www/vhosts/demo.dkcauto.net/httpdocs/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>