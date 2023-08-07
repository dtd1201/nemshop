<?php $__env->startSection('title', $header['seo_home']->name); ?>
<?php $__env->startSection('image', asset($header['seo_home']->image_path)); ?>
<?php $__env->startSection('keywords', $header['seo_home']->slug); ?>
<?php $__env->startSection('description', $header['seo_home']->value); ?>
<?php $__env->startSection('abstract', $header['seo_home']->slug); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="main">
        <!-- <h1 class="d-none">
            {h1trangchu}
        </h1>
        <h2 class="d-none">
            {h2trangchu}
        </h2> -->
        <?php
            $vechungtoi = \App\Models\Setting::find(304);
        ?>
        <div class="slide">
            <?php if(isset($slider)): ?>
            <div class="box-slide faded cate-arrows-1 d-none d-md-block">
                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-slide">
                    <a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            <?php if(isset($slidersM)): ?>
            <div class="box-slide faded cate-arrows-1 d-block d-md-none" >
                <?php $__currentLoopData = $slidersM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-slide">
                    <a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="ss01_about">
            <div class="container">
                  <div class="row">
                      <?php if(isset($vechungtoi)): ?>
                      <div class="col-md-7 col-sm-6 col-xs-12">
                          <div class="box_about">
                              <h4>Đôi nét về <span><?php echo e($vechungtoi->name); ?> <strong><?php echo e($vechungtoi->value); ?></strong></span></h4>
                              <div class="desc">
                                  <?php echo $vechungtoi->description; ?>

                              </div>
                          </div>
                      </div>
                      <?php endif; ?>
                      <?php if(isset($camnhan2)&&$camnhan2): ?>
                      <div class="col-md-5 col-sm-6 col-xs-12">
                          <div class="about-us-right">
                              <?php $__currentLoopData = $camnhan2->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                  $tran=$item->translationsLanguage()->first();
                              ?>
                              <div class="about-us-right-item">
                                  <div class="about-us-img">
                                      <img src="<?php echo e($item->image_path != null ?  asset($item->image_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                  </div>
                                  <div class="text">
                                      <div class="number"><?php echo e($tran->value); ?> +</div>
                                      <p><?php echo e($tran->name); ?></p>
                                  </div>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                      </div>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
		<div class="ss03_product">
			<div class="container">
				<div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="group-title">
                            <div class="title title-img"><?php echo e(__('home.san_pham_moi')); ?></div>
                            <div class="img-title">
                                <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="b">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <?php if( isset($productsBest) && $productsBest->count()>0 ): ?>
                        <div class="list-product">
                            <div class="rows">
                                <div class="list-product-hot-home autoplay3-news category-slide-1 category-dot-1">
                                <?php $__currentLoopData = $productsBest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tran=$product->translationsLanguage()->first();
                                    $link=$product->slug_full;
                                ?>
                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="product-item">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e($link); ?>">
                                                    <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                    <?php if($product->sale): ?>
                                                    <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                    <?php endif; ?>

                                                    <?php if($product->baohanh): ?>
                                                        <div class="km">
                                                            <?php echo e($product->baohanh); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </a>
                                                <div class="actionss">
                                                    <div class="btn-cart-products">
                                                        <a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                            <i class="fas fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="view-details">
                                                        <a href="<?php echo e($link); ?>" class="view-detail"> 
                                                            <span><i class="far fa-clone"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
                                                <div class="box-price">
                                                    <?php if($product->price && $product->old_price): ?>
                                                        <span class="new-price"><?php echo e('Giá từ: '.number_format($product->old_price). '/m²'. ' '. ' đến '.number_format($product->price) .'/m²'); ?></span>
                                                        <?php else: ?>
                                                        <span class="new-price">
                                                            <?php echo e(__('home.lien_he')); ?>

                                                        </span>
                                                            
                                                        <?php endif; ?>
                                                </div>
                                                <div class="desc"><?php echo $tran->description; ?></div>
                                                <div class="xemthem_home">
                                                    <a href="<?php echo e($link); ?>">Xem chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php if(isset($cateProduct)): ?>
                            <div class="col-sm-12 col-12 pull-center center ">
                                <a class="btn btn-readmore" href="<?php echo e($cateProduct->slug_full); ?>" role="button"><?php echo e(__('home.xem_tat_ca')); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
         </div>
		<div class="ss02_product">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-12 padding_in block-content-right">
                        <div class="wrap-pro-tab-home">
                            <div class="col-12 col-sm-12">
                                <div class="group-title">
                                    <div class="title title-img"><?php echo e(__('home.san_pham_ban_chay')); ?></div>
                                    <div class="img-title">
                                        <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-12 ">
                                        <?php if( isset($productHot) && $productHot->count()>0 ): ?>
                                        <div class="list-product">
                                            <div class="rows">
                                                <div class="list-product-hot-home autoplay3-news category-slide-1 category-dot-1">
                                                    <?php $__currentLoopData = $productHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $tran=$product->translationsLanguage()->first();
                                                        $link=$product->slug_full;
                                                    ?>
                                                    <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
														<div class="product-item">
															<div class="box">
																<div class="image">
																	<a href="<?php echo e($link); ?>">
																		<img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
																		<?php if($product->sale): ?>
																		<span class="sale"> <?php echo e($product->sale." %"); ?></span>
																		<?php endif; ?>

																		<?php if($product->baohanh): ?>
																			<div class="km">
																				<?php echo e($product->baohanh); ?>

																			</div>
																		<?php endif; ?>
																	</a>
																	<div class="actionss">
																		<div class="btn-cart-products">
																			<a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
																				<i class="fas fa-cart-plus"></i>
																			</a>
																		</div>
																		<div class="view-details">
																			<a href="<?php echo e($link); ?>" class="view-detail"> 
																				<span><i class="far fa-clone"></i></span>
																			</a>
																		</div>

																	</div>
																</div>
																<div class="content">
																	<h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
																	<div class="box-price">
																		<?php if($product->price && $product->old_price): ?>
                                                                        <span class="new-price"><?php echo e('Giá từ: '.number_format($product->old_price). '/m²'. ' '. ' đến '.number_format($product->price) .'/m²'); ?></span>
                                                                        <?php else: ?>
                                                                        <span class="new-price">
                                                                            <?php echo e(__('home.lien_he')); ?>

                                                                        </span>
                                                                            
                                                                        <?php endif; ?>
																	</div>
																	<div class="desc"><?php echo $tran->description; ?></div>
																	<div class="xemthem_home">
																		<a href="<?php echo e($link); ?>">Xem chi tiết</a>
																	</div>
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
                                <div class="row">
                                    <?php if(isset($cateProduct)): ?>
                                    <div class="col-sm-12 col-12 pull-center center text-center">
                                        <a class="btn btn-readmore" href="<?php echo e($cateProduct->slug_full); ?>" role="button"><?php echo e(__('home.xem_tat_ca')); ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
						</div>
                	</div>
            	</div>
		 	</div>
			<div class="ss03_product">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="group-title">
								<div class="title title-img"><?php echo e(__('home.phu_kien')); ?></div>
								<div class="img-title">
									<img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="b">
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-12">
							<?php if( isset($phukien) && $phukien->count()>0 ): ?>
							<div class="list-product">
								<div class="rows">
									<div class="list-product-hot-home autoplay3-news category-slide-1 category-dot-1">
									<?php $__currentLoopData = $phukien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
										$tran=$product->translationsLanguage()->first();
										$link=$product->slug_full;
									?>
									<div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
										<div class="product-item">
											<div class="box">
												<div class="image">
													<a href="<?php echo e($link); ?>">
														<img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
														<?php if($product->sale): ?>
														<span class="sale"> <?php echo e($product->sale." %"); ?></span>
														<?php endif; ?>

														<?php if($product->baohanh): ?>
															<div class="km">
																<?php echo e($product->baohanh); ?>

															</div>
														<?php endif; ?>
													</a>
													<div class="actionss">
														<div class="btn-cart-products">
															<a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
																<i class="fas fa-cart-plus"></i>
															</a>
														</div>
														<div class="view-details">
															<a href="<?php echo e($link); ?>" class="view-detail"> 
																<span><i class="far fa-clone"></i></span>
															</a>
														</div>

													</div>
												</div>
												<div class="content">
													<h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
													<div class="box-price">
														<?php if($product->price && $product->old_price): ?>
                                                        <span class="new-price"><?php echo e('Giá từ: '.number_format($product->old_price). '/m²'. ' '. ' đến '.number_format($product->price) .'/m²'); ?></span>
                                                        <?php else: ?>
                                                        <span class="new-price">
                                                            <?php echo e(__('home.lien_he')); ?>

                                                        </span>
                                                            
                                                        <?php endif; ?>
													</div>
													<div class="desc"><?php echo $tran->description; ?></div>
													<div class="xemthem_home">
														<a href="<?php echo e($link); ?>">Xem chi tiết</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
								<?php if(isset($cateProduct)): ?>
								<div class="col-sm-12 col-12 pull-center center ">
									<a class="btn btn-readmore" href="<?php echo e($cateProduct->slug_full); ?>" role="button"><?php echo e(__('home.xem_tat_ca')); ?></a>
								</div>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			 </div>
            <?php
                $post_home = \App\Models\CategoryPost::find(56);
                $duan_home = \App\Models\CategoryPost::find(60);
                $dich_vu_home = \App\Models\CategoryProduct::find(198);
            ?>
			<div class="ss04_tintuc">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="group-title">
								<div class="title title-img"><?php echo e(__('home.tin_tuc_moi')); ?></div>
								<div class="img-title">
									<img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
								</div>
								<div class="title-b">
									<span>
									   <?php echo e($post_home->value); ?>

									</span>
								</div>
							</div>
						</div>
						<?php if($post_home ): ?>
							<div class="col-lg-12 col-sm-12">
								<div class="col-mtc-new-hot">
								<?php $__currentLoopData = $post_home->posts()->where('active', 1)->where('hot', 1)->orderBy('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->first): ?>
                                    <div class="col-mtc-new-hot-left">
                                        <div class="box-img">
                                            <a href="<?php echo e(makeLink('post',$value->id,$value->slug)); ?>">
                                                <img src="<?php echo e($value->avatar_path != null ? asset('/upload/images/'.$value->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($value->name); ?>">
                                            </a>
                                        </div>
                                        <div class="box-info">
                                            <div class="cate_news">
                                                <a href="<?php echo e($value->avatar_path != null ? asset($value->avatar_path) : '../frontend/images/no-images.jpg'); ?>"><?php echo e($value->name); ?></a>
                                            </div>
                                            <div class="desc_home_in">
                                                <?php echo $value->description; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="col-mtc-new-hot-right">
									<div class="list">
                                        <div class="row">
                                            <?php $__currentLoopData = $post_home->posts->take(-4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="list_news2">
                                                        <div class="item">
                                                            <div class="box">
                                                                <div class="image">
                                                                    <a href="<?php echo e(makeLink('post',$value->id,$value->slug)); ?>" title="<?php echo e($value->nameL); ?>">
                                                                        <img src="<?php echo e($value->avatar_path != null ? asset('/upload/images/'.$value->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($value->name); ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="info">
                                                                    <h3 class="post_title">
                                                                        <a href="<?php echo e(makeLink('post',$value->id,$value->slug)); ?>" title="<?php echo e($value->nameL); ?>">
                                                                            <?php echo e($value->name); ?>

                                                                        </a>
                                                                    </h3>  
                                                                    <div class="desc_home_in">
                                                                        <?php echo $value->description; ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
        <div class="section_news">
            <div class="wrap-ykkh">
                <div class="container">
                    <div class="row">
                        <?php if(isset($camnhan)&&$camnhan): ?>
                        <div class="col-12 col-sm-12">
                            <div class="group-title">
                                <div class="title title-img"><?php echo e($camnhan->name); ?></div>
                                <div class="img-title">
                                    <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="list_feedback autoplay4-ykkh category-slide-1">
                                <?php $__currentLoopData = $camnhan->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tran=$item->translationsLanguage()->first();
                                ?>
                                <div class="box">
                                    <div class="box_content">
                                        <?php echo $tran->value; ?>

                                    </div>
                                    <div class="box_info">
                                        <div class="avatar">
                                            <div class="image">
                                                <img src="<?php echo e($item->image_path != null ?  asset($item->image_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                            </div>
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                        </div>
                                        <div class="box_author">
                                            <div class="author"><?php echo e($tran->name); ?></div>
                                            <span class="chucvu"><?php echo e($tran->slug); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
			<div class="ss05_duan">
                <div class="container">
                    <div class="row">
						<div class="col-sm-12 col-12 ">
							<div class="wrap-project">
								<div class="group-title">
									<div class="title title-img"><?php echo e(__('home.du_an_title')); ?></div>
									<div class="img-title">
										<img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
									</div>
								</div>
								<?php if(isset($duan_home)): ?>
								<div class="">
									<a class="btn btn-readmore" href="<?php echo e($duan_home->slug_full); ?>" role="button"><?php echo e(__('home.xem_tat_ca')); ?></a>
								</div>
								<?php endif; ?>
							</div>
						</div>
                        <div class="col-sm-12 col-12 ">
                            <?php if( isset($duan_home) && $duan_home->count()>0 ): ?>
                            <div class="list-product">
                                <div class="row">
                                    <?php $__currentLoopData = $duan_home->posts()->where('active', 1)->orderBy('order')->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $tran=$post->translationsLanguage()->first();
                                        $link=$post->slug_full;

                                        // dd($post)
                                    ?>
                                    <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="duan_tb">
											<div class="image">
                                                <a href="<?php echo e($link); ?>">
                                                    <img src="<?php echo e($post->avatar_path != null ?  asset($post->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name ?? ''); ?>">
                                                </a>
                                            </div>
											<h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name ?? ''); ?></a></h3>
										</div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php if(isset($modalHome)&&$modalHome): ?>
        <div class="modal fade modal-First" id="modal-first" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content"  image="">

                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            
                        </button>

                        <div class="image-modal">
                            <div class="image">
                                <img src="<?php echo e(asset($modalHome->image_path)); ?>" alt="">
                            </div>
                            <div class="newsletter-content">
                                
                                <h2><?php echo e($modalHome->name); ?></h2>
                                <div class="dec"><?php echo $modalHome->description; ?></div>
                                <form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" class="form-control" name="name" placeholder="Họ tên *">
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required>
                                    <input type="text" class="form-control" name="content" placeholder="Sản phẩm mua *" required>
                                    <button>Đăng ký ngay <i class="fas fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(function(){
            $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
              $('.autoplay4-pro').slick('setPosition');
            });
        });

       /*setTimeout(() => $('#modal-first').modal('show'), 10000);*/
    </script>
    <script>
        $(function() {
            var now = new Date();
            var date = now.getDate();
            var month = (now.getMonth()+1);
            var year =  now.getFullYear();
            var timer;
                var then = year+'/'+month+'/'+date+' 23:59:59';
                var now = new Date();
                var compareDate = new Date(then) - now.getDate();
                timer = setInterval(function () {
                    timeBetweenDates(compareDate);
                }, 1000);
                function timeBetweenDates(toDate) {
                    var dateEntered = new Date(toDate);
                    var now = new Date();
                    var difference = dateEntered.getTime() - now.getTime();
                    if (difference <= 0) {
                        clearInterval(timer);
                    } else {
                        var seconds = Math.floor(difference / 1000);
                        var minutes = Math.floor(seconds / 60);
                        var hours = Math.floor(minutes / 60);
                        var days = Math.floor(hours / 24);
                        hours %= 24;
                        minutes %= 60;
                        seconds %= 60;
                        $("#days").text(days);
                        $("#hours").text(hours);
                        $("#minutes").text(minutes);
                        $("#seconds").text(seconds);
                    }
                }
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo15.dkcauto.net/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>