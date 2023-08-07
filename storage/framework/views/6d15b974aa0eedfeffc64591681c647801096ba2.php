	
    <div class="footer">
        <div class="footer-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-item-footer">
                        <div class="box-footer-main-info">
                            <?php if(isset($footer['dataAddress']) && $footer['dataAddress']): ?>
                                <div class="logo-footer">
                                    <a href="<?php echo e(makeLink('home')); ?>"><img src="<?php echo e(asset($footer['dataAddress']->image_path)); ?>" alt="Logo footer"></a>
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

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
							<?php if(isset($footer['linklienket']) && $footer['linklienket']->count()>0 ): ?>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-item-footer">
                                <div class="title-footer">
                                    <?php echo e(__('footer.lien_ket_huu_ich')); ?>

                                </div>
                                <div class="list-link-footer">
                                    <ul class="footer-link">
                                        <?php $__currentLoopData = $footer['linklienket']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
							<?php endif; ?>
							<div class="col-lg-7 col-md-12 col-sm-12 col-item-footer">
								<div class="title-footer">
								<?php echo e(__('footer.dangky_nhanbantin')); ?>

								</div>
								<div class="box_form_dky">
									<p><?php echo e(__('footer.duoc_giam_gia')); ?>!</p>
									<form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
										<?php echo csrf_field(); ?>
										<input class="form-control" type="email" name="email" placeholder="<?php echo e(__('footer.nhap_mail')); ?>" required>
										<button name="submit"> <i class="fas fa-paper-plane"></i></button>
									</form>
								</div>
                                <ul class="pt_social">
									<p>Kết nối tới chúng tôi</p>
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
							</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container-fluid">
                <div class="row line_bottom">
                    <div class="col-md-6 col-sm-12">
                        <div class="coppy-right">
                           <?php if(isset($footer['coppy_right'])&&$footer['coppy_right']): ?>
                           <?php echo e($footer['coppy_right']->value); ?>

                           <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="content">
							<div class="box_menu_foot">
								<ul>
                                    <?php if(isset($footer['dieuKhoan'])): ?>


									<li><a href="<?php echo e($footer['dieuKhoan']->slug_full); ?>"><?php echo e($footer['dieuKhoan']->name); ?></a></li>
                                    <?php endif; ?>
                                    <?php if(isset($footer['chinhSach'])): ?>
									<li><a href="<?php echo e($footer['chinhSach']->slug_full); ?>"><?php echo e($footer['chinhSach']->name); ?></a></li>
                                    <?php endif; ?>
								</ul>
							</div>
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


<div id="quick-view-modal" class="wrapper-quickview" style="display:none;">
    <div class="quickviewOverlay"></div>
    <div class="jsQuickview">
        <div class="modal-header clearfix" style="width:100%">
            <h4 id="product_quickview_title" class="p-title modal-title"></h4>
            <div class="quickview-close">
                <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <div class="row">
                <div class="col-md-5">
                    <div id="product_quickview_image" class="quickview-image image-zoom">
                    </div>
                    <div id="quickview-sliderproduct">
                        <div class="quickview-slider">
                            <ul class="slides"></ul>
                        </div>          
                    </div>
                </div>
                <div class="col-md-7">
                    <form id="form-quickview" method="post" action="/cart/add">
                        <div class="quickview-information">
                            <div class="form-input">                            
                                <div class="quickview-price product-price">
                                    <span id="product_quickview_price"></span>
                                    <del id="product_quickview_price_old"></del>
                                </div>
                            </div>
                            <div id="product_quickview_quantity" class="form-input">
                                
                            </div>

                            <div id="dat_mua" class="form-input" style="width: 100%">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







<script>

        //quickview

        $(document).ready(function(){
            $('.quickview').click(function(){

                var product_id = $(this).data('id_product');
                var _token = $('input[name="_token"]').val();
                $('.wrapper-quickview').fadeIn(500);
                $('.jsQuickview').fadeIn(500);
                $.ajax({
                    url:"<?php echo e(url('/quickview')); ?>",
                    method:"POST",
                    dataType:"JSON",
                    data:{product_id:product_id, _token:_token},
                    success:function(data){
                        $('#product_quickview_title').html(data.product_name);
                        $('#product_quickview_id').html(data.product_id);
                        $('#product_quickview_image').html(data.product_image);
                        $('#product_quickview_price').html(data.product_price);
                        $('#product_quickview_quantity').html(data.product_quantity);
                        $('#product_quickview_price_old').html(data.product_price_old);
                        $('#dat_mua').html(data.dat_mua);
                        /*
                        
                        $('#product_quickview_gallery').html(data.product_gallery);
                        $('#product_quickview_desc').html(data.product_desc);
                        $('#product_quickview_content').html(data.product_content);*/
                    }
                });
            });
        });

        $(document).on('click', '.quickview-close, .quickviewOverlay', function(e){
            $(".wrapper-quickview").fadeOut(500);
            $('.jsQuickview').fadeOut(500);
        });

        $(document).on('change','#quantity-quickview',function(){
            if ($(this).val() > 1) {
                var a = $(this).val();
                 //   $(".optionChange").trigger('change');
                
                let url2 = $('#buyCartQuickView').attr('href');
                     url2 += "?quantity=" + $('#quantity-quickview').val();
                     $('#buyCartQuickView').attr('href',url2);
            }
        });

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



<?php /**PATH /var/www/vhosts/sieuthithoitrangcaocap.com/httpdocs/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>