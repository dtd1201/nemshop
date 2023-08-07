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


                <div class="wrap-ykkh" style="background: unset;">
                    <div class="container">
                        <div class="row">
                            <?php if(isset($data)&&$data): ?>
                            <div class="col-12 col-sm-12">
                                <div class="group-title">
                                    <div class="title title-img"><?php echo e($data->name); ?></div>
                                    <div class="img-title">
                                        <img src="<?php echo e(asset('frontend/images/bg-title.png')); ?>" alt="">
                                    </div>
                                    <div class="desc-title2">
                                         <?php echo $data->description; ?>

                                    </div>
                                </div>
								<div class="col-12 col-sm-12">
									<div class="list-ykkh row">
										 <?php $__currentLoopData = $data->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $tran=$item->translationsLanguage()->first();
                                    ?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-12">
											<div class="col-ykkh-item1">
												<div class="item-ykkh">
													<div class="nd_ykien">
														<?php echo $tran->description; ?>

													</div>
													<div class="box">
														<img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($tran->name); ?>">
													</div>
													<div class="box_right">
														<h2><?php echo e($tran->name); ?></h2>
														<p><?php echo e($tran->slug); ?></p>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/nabei.vn/httpdocs/resources/views/frontend/pages/camnhan.blade.php ENDPATH**/ ?>