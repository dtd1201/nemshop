

    



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
                                <h3>Newsletter</h3>
                                <div class="newsletter">
                                    <form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="newsletter-input">
                                            <i class="fas fa-envelope"></i>
                                            <div class="newsletter-email"><input type="Email" name="Email" placeholder="Email"></div>
                                            <button type="submit"   class="subscribe-button text btn btn-primary btn-form-submit" name="subscribe">
                                                Subscribe
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="bank-footer">
                                <div class="image">
                                    <img src="<?php echo e($footer['pay']->image_path); ?>" alt="<?php echo e($footer['pay']->name); ?>">
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
                    <div class="col-xs-12">
                        <div class="border-top">
                            <div class="row">
                                <?php if($footer['about']): ?>
                                <div class="col-md-5 col-sm-5 col-xs-12 col-item-footer">
                                    <div class="title-footer">
                                      <?php echo e($footer['about']->name); ?>

                                    </div>
                                    <div class="desc-foot">
                                   <?php echo $footer['about']->description; ?>

                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="row">
                                        <?php if($footer['linkFooter']): ?>
                                        <?php $__currentLoopData = $footer['linkFooter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 col-sm-4 col-xs-12 col-item-footer">
                                            <div class="title-footer">
                                               <?php echo e($item->name); ?>

                                            </div>
                                            <div class="footer-link">
                                                <ul>
                                                    <?php $__currentLoopData = $item->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li> <a href="<?php echo e($item2->slug); ?>"> <?php echo e($item2->name); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($footer['dataAddress']): ?>
                                        <div class="col-md-4 col-sm-4 col-xs-12 col-item-footer">
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



<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\mayphotophuson.vn\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>