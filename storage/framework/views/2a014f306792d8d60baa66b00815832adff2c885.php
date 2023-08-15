
<?php $__env->startSection('title', $header['seo_home']->name); ?>
<?php $__env->startSection('image', asset($header['seo_home']->image_path)); ?>
<?php $__env->startSection('keywords', $header['seo_home']->slug); ?>
<?php $__env->startSection('description', $header['seo_home']->value); ?>
<?php $__env->startSection('abstract', $header['seo_home']->slug); ?>

<?php $__env->startSection('content'); ?>
<main>
      <!-- START BANNER -->
      <?php if($slider): ?>
      <section id="home-banner">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="banner-wrapper">
                <div class="banner-img">
                  <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>" />
                </div>
                <div class="container">
                  <div class="banner-content">
                    <h1 class="title">
                      <?php echo e($item->name); ?>

                    </h1>
                    <div class="desc">
                      <?php echo $item->description; ?>

                    </div>
                    <a href="#<?php echo e($tuyen_dung->slug); ?>" class="button">Xem các vị trí tuyển dụng</a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <?php endif; ?>
      <!-- END BANNER -->

      <!-- START ABOUT -->
      <?php if($about_us): ?>
      <section id="home-about">
        <div class="container" id="<?php echo e($about_us->slug); ?>">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="about-img">
                <img src="<?php echo e($about_us->avatar_path); ?>" alt="<?php echo e($about_us->name); ?>" />
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="about-content">
                <h2 class="main-title"><?php echo e($about_us->description); ?></h2>
                <div class="desc">
                    <?php echo $about_us->content; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>
      <!-- END ABOUT -->

      <!-- START ADVANTAGE -->
      <?php if($NEM): ?>
      <section id="home-advantage">
        <div class="container">
          <h2 class="main-title"><?php echo e($NEM->name); ?></h2>
          <div class="advantage-content">
            <div class="row">
                <?php $__currentLoopData = $NEM->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <article class="advantage-content-item">
                    <div class="icon">
                        <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>" />
                    </div>
                    <div class="text">
                        <h3 class="title"><?php echo e($item->name); ?></h3>
                        <p class="desc"><?php echo e($item->value); ?></p>
                    </div>
                    </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>
      <!-- END ADVANTAGE -->

      <!-- START CAROUSEL -->
      <?php if($banner): ?>
      <section id="home-carousel">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="carousel-item-img">
                <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>" />
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <?php endif; ?>
      <!-- END CAROUSEL -->

      <!-- START RECRUITMENT -->
        <?php if($tuyen_dung && $tuyen_dung->childs->count()>0): ?>
        <section id="home-recruitment">
            <div class="container" id="<?php echo e($tuyen_dung->slug); ?>">
                <div class="title-wrapper">
                    <h2 class="main-title"><?php echo e($tuyen_dung->description); ?></h2>
                    <div class="desc">
                    <?php echo $tuyen_dung->content; ?>

                    </div>
                </div>
                <?php $__currentLoopData = $tuyen_dung->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="recruitment-content-wrapper">
                    <?php if($cate->posts->count()>0): ?>
                    <article class="recruitment-content-container">
                        <h3 class="sub-title"><?php echo e($cate->name); ?></h3>
                        <div class="recruitment-content-list">
                            <div class="row">
                                <?php $__currentLoopData = $cate->posts()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="recruitment-content-item">
                                      <?php if($item->hot==1): ?>
                                      <p class="tag">hot</p>
                                      <?php endif; ?>
                                      <h4 class="recruitment-content-item-title">
                                          <?php echo e($item->name); ?>

                                      </h4>
                                      <div class="recruitment-content-item-information">
                                          <div class="recruitment-content-item-information-text">
                                          <div class="item">
                                              <div class="icon">
                                              <svg
                                                  width="14"
                                                  height="14"
                                                  viewBox="0 0 14 14"
                                                  fill="none"
                                                  xmlns="http://www.w3.org/2000/svg"
                                              >
                                                  <g clip-path="url(#clip0_9_1545)">
                                                  <path
                                                      d="M7.46616 13.9998H6.53655C6.37495 13.9795 6.21308 13.9623 6.05202 13.9382C4.20596 13.6621 2.68363 12.8073 1.5234 11.3456C0.290863 9.79207 -0.194757 8.01099 0.0701021 6.04941C0.323457 4.17383 1.21938 2.64034 2.71184 1.47796C4.25553 0.275873 6.01779 -0.185626 7.95452 0.0663495C9.33934 0.246567 10.5626 0.812417 11.6091 1.73815C12.8797 2.86164 13.6541 4.26394 13.9186 5.94287C13.9496 6.13979 13.9729 6.33781 13.9997 6.53556V7.46513C13.9786 7.6311 13.9605 7.79763 13.9364 7.96333C13.7357 9.33934 13.1882 10.5598 12.2679 11.6027C11.1435 12.8771 9.73923 13.6539 8.05723 13.9187C7.86084 13.9497 7.66309 13.973 7.46588 13.9998H7.46616ZM6.99807 12.9097C10.2569 12.9122 12.903 10.2716 12.9101 7.01048C12.9173 3.74711 10.2698 1.09315 7.00491 1.09069C3.74608 1.08822 1.09996 3.72876 1.09284 6.98994C1.08571 10.2533 3.73321 12.9073 6.99807 12.9097Z"
                                                      fill="#616161"
                                                  />
                                                  <path
                                                      d="M6.45631 5.40735C6.45631 4.86999 6.45385 4.33262 6.45741 3.79525C6.45933 3.5263 6.64777 3.30116 6.89428 3.25761C7.15201 3.21188 7.40153 3.33704 7.49548 3.5756C7.53109 3.66571 7.54396 3.76978 7.54451 3.86756C7.54807 4.79193 7.54834 5.7163 7.54451 6.64067C7.54396 6.73817 7.57491 6.79541 7.65242 6.85293C8.26267 7.30594 8.86908 7.76415 9.47686 8.22017C9.66694 8.36259 9.7461 8.55431 9.69954 8.78301C9.65489 9.0013 9.51109 9.1418 9.29334 9.19822C9.13394 9.23958 8.98384 9.20781 8.85347 9.11058C8.12764 8.5691 7.4029 8.02598 6.67954 7.48122C6.52369 7.364 6.45549 7.20076 6.45577 7.00603C6.45686 6.47332 6.45604 5.94034 6.45631 5.40763V5.40735Z"
                                                      fill="#616161"
                                                  />
                                                  </g>
                                                  <defs>
                                                  <clipPath id="clip0_9_1545">
                                                      <rect width="14" height="14" fill="white" />
                                                  </clipPath>
                                                  </defs>
                                              </svg>
                                              </div>
                                              <p class="text"><?php echo e($item->time); ?></p>
                                          </div>
                                          <div class="item">
                                              <div class="icon">
                                              <svg
                                                  width="11"
                                                  height="16"
                                                  viewBox="0 0 11 16"
                                                  fill="none"
                                                  xmlns="http://www.w3.org/2000/svg"
                                              >
                                                  <g clip-path="url(#clip0_9_1515)">
                                                  <path
                                                      d="M5.62254 15.7915H5.37807C5.26564 15.6867 5.13666 15.5946 5.04414 15.4748C4.86462 15.2422 4.70409 14.995 4.53774 14.7523C3.63368 13.4356 2.7091 12.1324 1.83354 10.7975C1.1712 9.78751 0.639363 8.70468 0.290424 7.54198C-0.0300241 6.47379 -0.109983 5.39736 0.175847 4.30691C0.8918 1.57637 3.61591 -0.217676 6.48861 0.295996C8.59633 0.672791 10.3726 2.33148 10.8474 4.41422C10.9112 4.69377 10.9498 4.97911 11.0003 5.2614V6.14394C10.9908 6.17198 10.9749 6.19973 10.9724 6.22838C10.9203 6.83259 10.7684 7.41455 10.5665 7.98371C10.1128 9.26256 9.44984 10.4365 8.69222 11.555C7.80165 12.8698 6.88074 14.1642 5.96597 15.4626C5.87651 15.5897 5.73834 15.6827 5.62285 15.7915H5.62254ZM5.48744 14.5194C5.52604 14.4749 5.54718 14.4542 5.56372 14.4307C6.31582 13.3594 7.08079 12.2967 7.81543 11.2139C8.55651 10.1219 9.22344 8.98575 9.67562 7.73861C10.0043 6.83168 10.1811 5.90433 10.02 4.93612C9.63059 2.60097 7.49437 0.936487 5.12134 1.14927C3.45446 1.29895 2.22077 2.13882 1.43374 3.60271C0.817661 4.74833 0.792234 5.95615 1.14669 7.18683C1.45457 8.25655 1.96067 9.23542 2.53049 10.1847C3.41954 11.6654 4.46299 13.0415 5.45405 14.4529C5.46538 14.4694 5.47243 14.4889 5.48744 14.5188V14.5194Z"
                                                      fill="#616161"
                                                  />
                                                  <path
                                                      d="M2.75138 5.68677C2.75138 4.16771 3.98017 2.948 5.50889 2.94922C7.02504 2.95044 8.24985 4.17441 8.24985 5.6883C8.24985 7.20737 7.02106 8.42738 5.49234 8.42616C3.9768 8.42494 2.75138 7.20005 2.75138 5.68677ZM5.50153 3.86103C4.50435 3.86042 3.67198 4.68534 3.66708 5.67854C3.66248 6.67784 4.49669 7.51313 5.49939 7.51374C6.49688 7.51405 7.32895 6.68943 7.33385 5.69562C7.33875 4.69632 6.50485 3.86133 5.50123 3.86103H5.50153Z"
                                                      fill="#616161"
                                                  />
                                                  </g>
                                                  <defs>
                                                  <clipPath id="clip0_9_1515">
                                                      <rect
                                                      width="11"
                                                      height="15.5833"
                                                      fill="white"
                                                      transform="translate(0 0.208252)"
                                                      />
                                                  </clipPath>
                                                  </defs>
                                              </svg>
                                              </div>
                                          
                                              <p class="text"><?php echo e($item->dia_diem); ?></p>
                                          </div>
                                          </div>
                                          <a href="<?php echo e($item->slug_full); ?>" class="button">Ứng tuyển</a>
                                      </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </article>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <?php endif; ?>
      <!-- END RECRUITMENT -->
      <?php if($doi_tac && $doi_tac->childs->count()>0): ?>
      <section id="home-client">
        <div class="container">
          <h2 class="main-title"><?php echo e($doi_tac->name); ?></h2>
          <article class="client-slide">
            <div class="swiper swiper-no-swiping">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $doi_tac->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                  <div class="client-item">
                    <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>" />
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </article>
        </div>
      </section>
      <?php endif; ?>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\demola\resources\views/frontend/pages/home.blade.php ENDPATH**/ ?>