<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                <?php echo $__env->make('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="wrap-content-main wrap-template-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-infor" style="background: #fff">
                                <div class="infor">
                                    <?php if(isset($dataAddress)): ?>
                                        <div class="address">
                                            <div class="footer-layer">
                                                <div class="title">
                                                <?php echo e($dataAddress->value); ?>

                                                </div>
                                                <ul class="pt_list_addres">
                                                <?php $__currentLoopData = $dataAddress->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo $item->slug; ?> <?php echo e($item->value); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($map)): ?>
                                        <div class="map">
                                            <?php echo $map->description; ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-form" style="background: #fff; padding-top: 0px;">
                                <div class="form">
                                    <p><?php echo e(__('contact.full_info')); ?></p>
                                    <form  action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        <?php echo csrf_field(); ?>
										<div class="row">
											<div class="col-md-6 col-sm-12 col-xs-12">
												<label>Họ tên <span>*</span></label>
												<input type="text" placeholder="<?php echo e(__('contact.name')); ?>" required="required" name="name">
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<label>Điện thoại <span>*</span></label>
												<input type="text" placeholder="<?php echo e(__('contact.phone')); ?>" required="required" name="phone">
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Nội dung tư vấn</label>
												<textarea name="content" placeholder="<?php echo e(__('contact.content')); ?>" id="noidung" cols="30" rows="5"></textarea>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<button class="hvr-float-shadow"><?php echo e(__('contact.send_info')); ?></button>
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

    <div class="modal fade in" id="modalAjax">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Chi tiết đơn hàng</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
             <div class="content" id="content">

             </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/pages/contact.blade.php ENDPATH**/ ?>