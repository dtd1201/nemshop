
<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .content_mucluc .box-link-paragraph ul li a.active,
    .content_mucluc .box-link-paragraph ul li a:hover {
        background-color: #fff;
        box-shadow: 0 0 0 1px #e4eaf1;
        border-radius: 12px;
        font-weight: 500;
        padding: 6px 16px;
    }

    .product-relate {
        background-color: #eee;
        padding: 32px 0;
    }

    .product-relate .title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .block-content-left {
        width: 100%;
    }

    .product-relate .title h2 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 500;
        font-size: 20px;
        line-height: 28px;
        color: #1e293b;
        margin: 0;
    }

    .product-relate h2 i {
        width: 24px;
        height: 24px;
        margin-right: 8px;
        line-height: 24px;
        background: #f41118;
        border-radius: 100px;
        font-size: 12px;
        color: #fff;
        text-align: center;
        font-weight: 700;
    }

    .product-relate .product-item {
        transition: all .3s ease-out;
        box-shadow: none !important;
        border: 1px solid #d8e0e8;
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 12px;
    }

    .product-item .box .content h3 {
        margin-left: 0;
        font-size: 15px;
        font-weight: 500;
        text-align: left;
        text-transform: none;
        position: relative;
        line-height: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin: 5px 0;
        padding: 0 10px;
        height: 40px;
        margin-bottom: 8px;
    }

    .product-relate .product-info__price {
        color: #000;
        margin-bottom: 8px;
        font-size: 12px;
    }

    .product-relate .product-info__price span {
        font-size: 16px;
        line-height: 24px;
        color: #f41118;
        font-weight: 500;
    }

    .product-relate .product-info__price strike {
        font-size: 16px;
        line-height: 24px;
        display: block;
        color: #f41118;
    }

    .product-relate .product-item .box .content h3 {
        padding: 0;
    }

    .product-relate .product-btn {
        display: flex;
        flex-wrap: wrap;
        align-items: baseline;
        justify-content: space-between;
    }

    .product-relate .product-btn button {
        cursor: pointer;
        outline: none;
        font-weight: 400;
        flex-basis: 0;
        flex-grow: 1;
        max-width: 100%;
        color: #333;
        background: #fff;
        border: solid 1px #696c70;
        padding: 0 20px;
        height: 32px;
        font-size: 16px;
        line-height: 16px;
        border-radius: 100px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .product-relate .product-btn a:hover {
        color: #fff;
        background: #d8e0e8;
        border: solid 1px #d8e0e8;
    }

    .product-relate .product-btn span {
        font-weight: 500;
        color: #52637a !important;
    }

    @media (max-width: 991px) {
        .content_mucluc {
            position: relative;
        }
    }

    @media (max-width: 550px) {
        .product-relate {
            padding: 15px 0;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/xzoom/xzoom.css')); ?>">
<script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/xzoom.min.js')); ?>"></script>

<div class="content-wrapper">
    
<?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
<?php echo $__env->make('frontend.components.breadcrumbs',[
'breadcrumbs'=>$breadcrumbs,
'type'=>$typeBreadcrumb,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="main">
    <div class="container">
        <div class="blog-product-detail" data-id="<?php echo e($data->id); ?>">
            <div class="row">
                <div class="col-md-9">
                    <div class="" id="dataProductSearch" style="width: 100%;">
                        <div class="box-product-main">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="position-sticky">
                                        <div class="box-image-product">
                                            <div id="img_<?php echo e($data->id); ?>" class="image-main active">
                                                <a class="hrefImg" href="<?php echo e(asset($data->avatar_path)); ?>" data-lightbox="image">
                                                    <i class="fas fa-expand-alt"></i>
                                                    <img class="expandedImg" src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e($data->name); ?>">
                                                </a>
                                                <?php if($data->images()->count()): ?>
                                                <div class="list-small-image">
                                                    <div class="pt-box autoplay5-product-detail-new">
                                                        <div class="small-image column">
                                                            <img src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e(asset($data->name)); ?>">
                                                        </div>
                                                        <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="small-image column" data-id_option="<?php echo e($image->id); ?>">
                                                            <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($data->name); ?>">
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if($data->options()->count()): ?>
                                            <?php $__currentLoopData = $data->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div id="img_<?php echo e($item->id); ?>" class="image-main">
                                                <a class="hrefImg" href="<?php echo e(asset($item->avatar_type)); ?>" data-lightbox="image">
                                                    <i class="fas fa-expand-alt"></i>
                                                    <img class="expandedImg" src="<?php echo e(asset($item->avatar_type)); ?>" alt="<?php echo e($data->name); ?>">
                                                </a>
                                                <?php if($item->images()->count()): ?>
                                                <div class="list-small-image">
                                                    <div class="pt-box autoplay5-product-detail-new">
                                                        <div class="small-image column">
                                                            <img src="<?php echo e(asset($item->avatar_type)); ?>" alt="<?php echo e(asset($data->name)); ?>">
                                                        </div>
                                                        <?php $__currentLoopData = $item->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="small-image column" data-id_option="<?php echo e($image->id); ?>">
                                                            <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($data->name); ?>">
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>

                                        <div class="product_sharing">
                                            <ul class="fastcontact" style="text-align: center;">
                                                <li>
                                                    <?php if(isset($header['hotline_top22'])): ?>
                                                    <i class="mli-phone"></i> <b><?php echo e($header['hotline_top22']->name); ?></b> <br>
                                                    <span style="color: #f00; font-weight: bold;">
                                                        <a style="color: #f00;" href="tel:<?php echo $header['hotline_top22']->value; ?>"><?php echo $header['hotline_top22']->slug; ?></a>
                                                        <?php endif; ?>
                                                </li>
                                            </ul>
											<div class="santhuongmai-new">
                                                <?php if($data->link1 or $data->link2 or $data->link3 or $data->link4): ?>
                                                <div class="title">
                                                    <h5>Mua trên</h5>
                                                </div>
                                                <?php endif; ?>
                                                <ul>
                                                    <?php if($data->link1): ?>
                                                    <li>
                                                        <a href="<?php echo e($data->link1); ?>">
                                                            <img src="<?php echo e(asset('frontend/images/shopee.png')); ?>" alt="shopee">
                                                        </a>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if($data->link2): ?>
                                                    <li>
                                                        <a href="<?php echo e($data->link2); ?>">
                                                            <img src="<?php echo e(asset('frontend/images/lazada.png')); ?>" alt="lazada">
                                                        </a>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if($data->link3): ?>
                                                    <li>
                                                        <a href="<?php echo e($data->link4); ?>">
                                                            <img src="<?php echo e(asset('frontend/images/tiki.png')); ?>" alt="tiki">
                                                        </a>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if($data->link4): ?>
                                                    <li>
                                                        <a href="<?php echo e($data->link4); ?>">
                                                            <img src="<?php echo e(asset('frontend/images/tiktok.png')); ?>" alt="tiktok">
                                                        </a>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12 product-detail-infor">
                                    <div class="box-infor">
                                        
                                        <div class="title_sp_detail">
                                            <h1 class="name">
                                                
                                                <?php echo e($data->name); ?>

                                            </h1>
											<div class="detail-line"></div>
											<div class="detail_category">
												Danh mục: <a href="<?php echo e($data->category->slug_full); ?>"><?php echo e($data->category->name); ?></a>
											</div>
                                            
										</div>

                                <div class="list-danhgia">
                                    <ul>
                                        <li>
                                            <?php if($data->stars()->count()>0): ?>
                                            <div class="pro-item-start-rating">
                                                <?php echo e($avgRating); ?>   <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i <=$avgRating): ?> <i class="star-bold far fa-star"></i>
                                                    <?php else: ?>
                                                    <i class="far fa-star"></i>
                                                    <?php endif; ?>
                                                    <?php endfor; ?>
                                            </div>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($countRating): ?>
                                            <a href="#Evaluate"><span><?php echo e($countRating); ?></span> đánh giá</a>
                                            <?php else: ?>
                                            <a href=""><span>Chưa có</span> đánh giá</a>
                                            <?php endif; ?>
                                        </li>
                                        <li><span><?php echo e($data->view); ?></span> đã xem</li>
                                    </ul>
                                </div>
                                <div class="pcd-price">
                                    <?php if($data->old_price>0): ?>
                                    <strike class="detailPrice">
                                        <?php echo e(number_format($data->old_price)); ?>đ
                                    </strike>
                                    <?php endif; ?>
                                    <?php if($data->price): ?>
                                    <span class="detailFinalPrice">
                                        <?php echo e(number_format($data->price)); ?>đ
                                    </span>

                                    <?php if($data->size): ?>
                                    <span class="unit"><?php echo e('/'.$data->size); ?></span>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <span class="detailFinalPrice">
                                        Liên hệ
                                    </span>
                                    <?php endif; ?>
                                </div>
								<div class="table-detail">
                                    <?php if($data->attributes->count()): ?>
                                        <ul>
                                                <li>Mã SKU: <?php echo e($data->masp ?? ""); ?> </li>
                                            <?php $__currentLoopData = $data->attributes()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <p><?php echo e($item->parent->name); ?>: <span><?php echo e($item->name); ?> </span></p>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="info-desc">
                                    <div class="col_2_desc">
                                        <div class="desc">
                                            <?php echo $data->description; ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if($data->content3 != null): ?>
                                <div class="quatang">
                                    <div class="title">
                                        Quà tặng khi mua sản phẩm
                                    </div>
                                    <div class="box_quatang">
                                        <?php echo $data->content3; ?>

                                    </div>
                                </div>
                                <?php endif; ?>
								<div class="wrap-price">
									<div class="attr-item" style="display: inline-block;">
										<div class="form-group">
											<label for=""><?php echo e(__('product.so_luong')); ?></label>
											<div class="wrap-add-cart" id="product_add_to_cart">
												<div class="box-add-cart">
													<div class="pro_mun">
														<a class="cart_qty_reduce cart_reduce">
															<span class="iconfont icon fas fa-minus" aria-hidden="true"></span>
														</a>
														<input type="text" value="1" class="optionChange" name="cart_quantity" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" maxlength="5" min="1" id="cart_quantity" disabled="disabled">
														<a class="cart_qty_add">
															<span class="iconfont icon fas fa-plus" aria-hidden="true"></span>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="single_variation_wrap">
								<?php if(isset($data->price) && $data->price > 0): ?>
								<button type="submit" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $data->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $data->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>" class="add-to-cart single_add_to_cart_button button alt wow bounce" data-wow-duration="3s" data-wow-delay="2s">Chọn mua</button>
								<?php else: ?>
								<button data-toggle="modal" data-target="#modal-add-cart" class="single_add_to_cart_button button alt wow bounce" data-wow-duration="3s" data-wow-delay="2s">Chọn mua</button>
								<?php endif; ?>
								<a class="find_address" href="/diem-ban">
									Tìm nhà thuốc
								</a>
							</div>

							<div class="goi-ngay">
								<form action="<?php echo e(route('contact.storeAjax')); ?>" data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
									<?php echo csrf_field(); ?>
									<div class="row small">
										<div class="col col-9">
											<input name="name" type="text" id="dgm_call_me_name" placeholder="Tên của bạn" style="">
											<input name="phone" type="number" id="dgm_call_me_phone" placeholder="Để lại số điện thoại, chúng tôi gọi lại ngay">
										</div>
										<div class="yeu_cau_goi_lai col col-3">
											<button id="dgm_goi_lai" data-id="45136" class="button gradient large">
												<i class="fa fa-paper-plane" aria-hidden="true"></i> Gửi
											</button>
										</div>

										<div id="callme_done" class="col-12"></div>
									</div>
								</form>
							</div>
							<div class="number_current_view">
								<span class="hot">
									<i class="fab fa-hotjar"></i>
									Sản phẩm đang được chú ý
								</span>, có
								<span class="them_gio_hang product simple">
									<b>6</b>
									người thêm vào giỏ hàng &amp;
								</span>
								<b>15</b> người đang xem
							</div>


							<?php if(isset($camket) && $camket): ?>
							<div class="pdc-feature">
								<div class="pdc-feature_top">
									<div class="pdc-feature_top--head">
										<?php echo e($camket->name); ?>

									</div>
									<div class="pdc-feature_top--content">
										<?php if($camket->childs()->count() > 0): ?>
										<?php $__currentLoopData = $camket->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="feature-item">
											<div class="icon">
												<img src="<?php echo e(asset($value->image_path)); ?>" alt="<?php echo e($value->name); ?>">
											</div>
											<div class="item-text">
												<p><?php echo e($value->name); ?></p>
												<p><?php echo e($value->value); ?></p>
											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</div>
								</div>
    
</div>
<?php endif; ?>




</div>
</div>
</div>
</div>


    <div class="tab-pane fade" id="danhgiasao" role="tabpanel" aria-labelledby="tabdanhgiasao-tab">
        <?php if($data->stars()->count()>0): ?>
        <div class="list-star js-list-star">
            <div class="js-load" style="display: none;">
                <div class="spinner-border text-info"></div>
            </div>
            <?php $__currentLoopData = $data->stars()->where('active',1)->orderBy('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item-star">
                <div class="box">
                    <div class="auth-star">
                        <div class="icon"><?php echo e($item->name_tat($item->name)); ?></div>
                        <div class="text-star">
                            <div class="name"><?php echo e($item->name); ?></div>
                            <div class="date-create"><?php echo e(Carbon::parse($item->created_at)->format('d-m-Y')); ?></div>
                        </div>
                    </div>
                    <div class="content-star">
                        <h3><?php echo e($item->title); ?></h3>
                        <div class="desc">
                            <?php echo e($item->content); ?>

                        </div>
                    </div>
                    <?php if($item->star): ?>
                    <div class="point-star">
                        <?php echo e($item->star); ?>

                        <span class="point">
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="pagination-star js-pagination-ajax mt-3">
            </div>
        </div>
        <?php endif; ?>
        <div id="danhgia" class="danhgia_sao">
            <div class="contact-form">
                <div class="form">
                    <form action="<?php echo e(route('product.rating',['id' => $data->id])); ?>" method="POST" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form_danhgia">
                            <label>Đánh giá <span>*</span></label>

                            <div id="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                <input type="radio" id="star4half" name="rating" value="4.5" />
                                <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>

                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                <input type="radio" id="star3half" name="rating" value="3.5" />
                                <label class="half" for="star3half" title="Meh - 3.5 stars"></label>

                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="full" for="star3" title="Meh - 3 stars"></label>

                                <input type="radio" id="star2half" name="rating" value="2.5" />
                                <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                <input type="radio" id="star1half" name="rating" value="1.5" />
                                <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                                <input type="radio" id="starhalf" name="rating" value="0.5" />
                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            </div>
                        </div>
                        <div class="form_danhgia">
                            <label>Khách hàng <span>*</span></label>
                            <input type="text" placeholder="Khách hàng" required="required" name="name">
                        </div>
                        <div class="form_danhgia">
                            <label>Email</label>
                            <input type="email" placeholder="Email" required="required" name="email">
                        </div>
                        <div class="form_danhgia">
                            <label>Điện thoại <span>*</span></label>
                            <input type="number" placeholder="Điện thoại" required="required" name="phone">
                        </div>
                        <div class="form_danhgia">
                            <label>Tiêu đề <span>*</span></label>
                            <input type="text" placeholder="Tiêu đề" required="required" name="title">
                        </div>
                        <div class="form_danhgia">
                            <label>Nội dung <span>*</span></label>
                            <textarea name="content" placeholder="Nội dung" id="noidung" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form_danhgia">
                            <label></label>
                            <div class="sao_danhgia">
                                <button type="submit" name="submit">Đánh giá</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="huongdanmuahang" role="tabpanel" aria-labelledby="tabhuongdanmuahang-tab">
        <?php if(isset($huongDanMuaHang)): ?>
        <?php echo $huongDanMuaHang->description; ?>

        <?php endif; ?>
    </div>
    <div class="tab-pane fade" id="quydinhdoihang" role="tabpanel" aria-labelledby="tabquydinhdoihang-tab">
        <?php if(isset($quyTrinh)): ?>
        <?php echo $quyTrinh->description; ?>

        <?php endif; ?>

    </div>

    <div class="tab-pane fade" id="huongdanchonsize" role="tabpanel" aria-labelledby="tabhuongdanchonsize-tab">
        <?php if(isset($huongDanChonSize)): ?>
        <?php echo $huongDanChonSize->description; ?>

        <?php endif; ?>
    </div>

    <div class="tab-pane fade" id="tabhethongshowroom" role="tabpanel" aria-labelledby="tabtabhethongshowroom-tab">
        Đang cập nhật!
    </div>
</div>
</div>
</div>
--}}

<div class="modal fade modal-First" id="modal-add-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" image="">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
                <div class="image-modal">
                    <div class="info_product_modal">
                        <div class="title">
                            <?php echo e($data->name); ?>

                        </div>
                        <div class="image">
                            <img src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e($data->name); ?>">
                        </div>
                        <div class="list-attr">
                            <div class="attr-item">
                                <div class="price">
                                    <?php if($data->price): ?>
                                    <?php if($data->price_after_sale): ?>
                                    <span id="priceChange">Giá: <?php echo e(number_format($data->price_after_sale)); ?> <span class="donvi">đ</span></span>
                                    <?php endif; ?>
                                    <?php if($data->sale>0): ?>
                                    <span class="title_giacu">Giá cũ: </span>
                                    <span class="old-price"><?php echo e(number_format($data->price)); ?> <?php echo e($unit); ?></span>

                                    <div class="tiet_kiem">
                                        <div class="g2">(Tiết kiệm: <b><?php echo e(number_format(
                                                                                    ($data->price - $data->price_after_sale))); ?></b>)</div>
                                        <div class="tk">
                                            <b>-<?php echo e($data->sale); ?>%</b>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    Liên hệ
                                    <?php endif; ?>
                                </div>
                                <p>Giá bán lẻ đề xuất chưa bao gồm phí trước bạ và phí đăng ký (bao gồm VAT)</p>
                            </div>
                        </div>
                    </div>

                    <div class="newsletter-content">
                        <h2>YÊU CẦU TƯ VẤN SẢN PHẨM</h2>
                        
                        <form action="<?php echo e(route('contact.storeAjax2')); ?>" data-url="<?php echo e(route('contact.storeAjax2')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                            <?php echo csrf_field(); ?>
                            <input type="text" class="form-control" name="content" placeholder="Sản phẩm muốn xem *" value="<?php echo e($data->name); ?>" required>
                            <input type="text" class="form-control" name="name" placeholder="Họ tên *">
                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required>
                            <input type="text" class="form-control" name="email" placeholder="Email của bạn">
                            <button>Đăng ký ngay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<div class="col-md-3">
    <div class="body-right">
        <?php if(isset($banner_right)): ?>
        <div class="box">
            <div class="img">
                <a href="">
                    <img src="<?php echo e($banner_right->image_path); ?>" alt="<?php echo e($banner_right->name); ?>">
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="box">
            <div class="tu-van">
                <div class="img">
                    <a href="">
                        <img src="<?php echo e($data->supplier->logo_path ??''); ?>" alt="<?php echo e($data->supplier->name??''); ?>">
                    </a>
                </div>
                <div class="content">
                    <p>Tư vấn chuyên môn</p>
                    <h2><?php echo e($data->supplier->name??''); ?></h2>
                    <div class="btn-tuvan">
                        <a href="">
                            Nhờ tư vấn
                        </a>
                        <a href="">
                            Xem hồ sơ
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($goi_dat_hang)): ?>
        <div class="box">
            <div class="hotline">
                <a href="tel:<?php echo e($goi_dat_hang->value); ?>">
                    <p><?php echo e($goi_dat_hang->name); ?></p>
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="title">
                            <h4><?php echo e($goi_dat_hang->value); ?></h4>
                            <h5><?php echo e($goi_dat_hang->slug); ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php if(isset($cam_ket)): ?>
        <div class="box">
            
            <div class="cam-ket">
                <div class="title">
                    <h2><?php echo e($cam_ket->name); ?></h2>
                </div>
                <div class="list-camket">
                    <ul>
                        <?php $__currentLoopData = $cam_ket->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="icon">
                                <span><?php echo $item->slug; ?></span>
                            </div>
                            <div class="text">
                                <?php echo e($item->name); ?>

                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- 
                         -->
</div>
</div>
</div>

<div class="info_detail">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="row">
                    
                    <div class="col-lg-9 col-sm-12 col-12">
                        <div class="nd-cmt" style=" position: relative;">
                        
                            <div class="btn-overlay-top txt-center load-more-attr load-more-cate">
                                <a class="load-more-cate-btn2 btn btn-sm btn-rounded btn-outline-gray btn-icon btn-icon-right f-w-500">
                                    Xem thêm
                                    <i class="fas fa-angle-down"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-comment">

                            
                            <div class="single-start">
                                <div class="container">
                                    <div class="single-start-title">
                                        Bình luận
                                    </div>
                                    <div class="single-start-top ls-comment">
                                        <div class="form-comment">
                                            <div class="form-group">
                                                <textarea id="contentComment" name="contentComment" rows="4" cols="5" placeholder="Nhập nội dung câu hỏi (Vui lòng gõ tiếng Việt có dấu)…" class="form-control cps-textarea comment_content "></textarea>
                                            </div>

                                            <div class="lc-reply-button">
                                                <div class="btn btn-md btn-primary txt-red btn-modal-create-comment show-modal-create-comment" id="openModalCreateComment" data-target="#modal-comment" data-type="1">
                                                    GỬI BÌNH LUẬN
                                                </div>
                                            </div>

                                        </div>
                                        <div class="error-comment">
                                            <div class="alert alert-md alert-danger alert-des" id="errorContentComment" style="display: none;">
                                                <i class="fas fa-minus alert-ic bg-danger"></i>
                                                <span class="">Mời bạn viết bình luận. (Tối thiểu 3 ký tự)</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="single-start-bottom">
                                        <form action="">
                                            <?php echo csrf_field(); ?>
                                            <div class="block-item-content" id="comments">

                                            </div>
                                            <!--load-more item-vote -->
                                            <div class="container-btn-show-all" id="lcViewMoreCm">
                                                <input type="hidden" value="1" id="pageComment">
                                                <input type="hidden" value="" id="countLoadMoreCm">
                                                <a href="javascript:void(0)" class="load-more-cate-btn2 btn btn-sm btn-rounded btn-outline-gray btn-icon btn-icon-right f-w-500" id="loadMoreComments">
                                                    Xem thêm bình luận
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                            </div>
                                            <!-- end load-more item-vote -->
                                        </form>
                                    </div>
                                    <div class="cboth"></div>
                                </div>

                            </div>
                        </div>
                        <div class="Evaluate" id="Evaluate">
                                <div class="text_header">
                                    Đánh giá &amp; Nhận xét về <?php echo e($data->name); ?>

                                </div>
                                <div class="row all_cmtaa">
                                    <div class="col-12 col-lg-2 itemEvaluate">
                                        <div class="tongdanhgia">
                                            <h2><?php echo e($avgRating); ?> <span> <i class="fas fa-star"></i></span></h2>
                                            <p>Đánh giá trung bình</p>
                                        </div>
                                    </div>
                
                                    <div class="col-lg-8 col-12 itemEvaluate">
                                        <ul>
                                            <?php
                                            $stars = [5, 4, 3, 2, 1];
                                            ?>
                                            <?php $__currentLoopData = $stars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $star): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $starCount = ${"star".$star}->count();
                                            $starPercentage = ($countRating != 0) ? (count(${"star".$star}) / $countRating) * 100 : 0;
                                            ?>
                                            <?php if(isset(${"star".$star}) && ${"star".$star}): ?>
                                            <li>
                                                <span><?php echo e($star); ?> <i class="fas fa-star"></i></span>
                                                <div class="percent-rating <?php echo e(($starCount !== 0) ? 'rating_detail_item_js' : 'allowed'); ?>" data-star="<?php echo e($star); ?>" <?php echo e(($starCount !== 0) ? 'onClick=window.location="#commentData;"' : ''); ?>>
                                                    <div class="box-percent" style="width: <?php echo e($starPercentage); ?>%;">
                                                        <div class="main-percent"></div>
                                                    </div>
                                                </div>
                                                <div class="review-cout">
                                                    <span class="devvn_num_reviews">
                                                        <b><?php echo e(round($starPercentage)); ?>%</b> |
                                                        <?php echo e($starCount); ?> đánh giá
                                                    </span>
                                                </div>
                                            </li>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                
                                    <div class="col-lg-2 col-12 itemEvaluate">
                                        <button class="closeShow">Đánh giá ngay</button>
                                    </div>
                                </div>
                                <div class="review" style="display: none;">
                                    <div class="bg_review">
                                        <div class="text_header_review ">
                                            Gửi nhận xét của bạn
                                        </div>
                                        <form action="<?php echo e(route('product.rating',['id'=>$data->id])); ?>" method="POST"  enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                             <textarea name="content" id="" rows="4" placeholder="Mời bạn đánh giá, vui lòng nhập chữ có dấu"></textarea>
                                             <div class="upfileimg">
                                                <div class="upfile">
                                                    <div class="up">
                
                                                        <label>
                                                            <img src="./frontend/images/icon-upfile.png" alt="">
                                                            <span>Gửi ảnh thực tế</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <div class="showimg_upfile">
                                                    <ul style="display: flex;">
                                                        <?php for($i = 1; $i < 4; $i++): ?> <li id="add-li" style="margin: 0px 2px;">
                                                            <div id="img-<?php echo e($i); ?>" class="img-wrap">
                                                                <div class="img-wrap-box img-wrap-box-tr ">
                                                                    <!-- <img class="" src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>">  -->
                                                                    <div class="bacu"></div>
                                                                    <label for="image-rating<?php echo e($i); ?>" class="devvn_insert_attach" data-id="<?php echo e($i); ?>" id="devvn_insert_attach_<?php echo e($i); ?>">
                                                                        <div class="devvn-plus">+</div>
                                                                        <input type="file" id="image-rating<?php echo e($i); ?>" class="form-control-file is-hidden img-load-input-multiple border <?php $__errorArgs = ['image1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    is-invalid
                                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" data-id="<?php echo e($i); ?>" name="image1[]" multiple>
                                                                    </label>
                                                                </div>
                
                                                            </div>
                                                            </li>
                                                            <?php endfor; ?>
                                                    </ul>
                                                    <!-- <?php for($i = 1; $i < 4; $i++): ?>
                
                                                                    <?php endfor; ?> -->
                                                </div>
                                            </div>
                                           
                                            <div class="item item-tr">
                                                <label>Bạn cảm thấy sản phẩm như thế nào?</label>
                                                <div class="vote hovervote">
                                                    <label for="star1" title="text"><i class="fas fa-star checked"></i><br>
                                                        Rất tệ
                                                    </label>
                                                    <input type="radio" id="star1" name="rating" value="1">
                                                    <label for="star2" title="text"><i class="fas fa-star checked"></i><br>
                                                        Không tệ</label>
                                                    <input type="radio" id="star2" name="rating" value="2">
                                                    <label for="star3" title="text"><i class="fas fa-star checked"></i><br>
                                                        Trung bình</label>
                                                    <input type="radio" id="star3" name="rating" value="3">
                                                    <label for="star4" title="text"><i class="fas fa-star checked"></i><br>
                                                        Tốt</label>
                                                    <input type="radio" id="star4" name="rating" value="4">
                                                    <label for="star5" title="text"><i class="fas fa-star checked"></i><br>
                                                        Tuyệt vời</label>
                                                    <input type="radio" id="star5" name="rating" value="5" checked="">
                                                </div>
                                            </div>

                                            <div class="item">
                                                <!-- <label>Tên bạn*</label> -->
                                                <input type="text" name="name" placeholder="Tên bạn*" required="" id="" class="form-controls">
                                                <input placeholder="Email*" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="" required="" class="form-controls">
                                                <input placeholder="Số điện thoại*" type="tel" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" name="phone" id="" required="" class="form-controls">
                                            </div>

                                            <div class="item_btn">
                                                <button class="btn_submit" type="submit">
                                                    Gửi đánh giá
                                                </button>
                                                <a class="btn_close closeShow click_dong_mo"><i class="fas fa-times-circle"></i></a>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <?php if(session()->has('success')): ?>
                                <script>
                                    var message = '<?php echo e(session('success')); ?>';
                                    alert('Gửi đánh giá thành công');
                                </script>
                                 <?php endif; ?>
                                <?php if($data->stars()->count() > 0): ?>
                                <div class="showhinhanhcmt">
                                    <div class="header_show_img">
                                        <h3>Hình ảnh từ khách hàng</h3>
                                    </div>
                                    <ul>
                
                                        <?php $__currentLoopData = $data->stars()->where('hot', 1)->orderBy('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $image_first = $item->images()->first();
                
                                        ?>
                                        <?php if(isset($image_first->image_path)): ?>
                                        <li>
                                            <a href="<?php echo e($image_first->image_path); ?>">
                                                <img class="expandedImg" src="<?php echo e($image_first->image_path); ?>" alt="<?php echo e($image_first->name); ?>">
                                                <span><?php echo e($item->images()->count()); ?> hình ảnh</span>
                                            </a>
                
                                            <div class="jnds">
                                                <?php $__currentLoopData = $item->images()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($i->image_path); ?>" data-fancybox="gallery">
                                                    <img src="<?php echo e($i->image_path); ?>" alt="<?php echo e($i->name); ?>">
                                                </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                    </ul>
                                </div>
                                <?php endif; ?>
                              
                                <?php $__currentLoopData = $data->stars()->where('hot', 1)->orderBy('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="itemcmt">
                                    <div class="name_cmtss">
                
                                        <div class="name_hoidap"><?php echo e($com->name); ?></div>
                                        
                                    </div>
                                    <div class="contentcmt">
                                        <span class="vote_star_cmt">
                                            <?php for($i = 0; $i < 5; $i++): ?> <?php if($i < round($com->star)): ?>
                                                <i class="fas fa-star checked"></i>
                                                <?php else: ?>
                                                <i class="fas fa-star"></i>
                                                <?php endif; ?>
                                                <?php endfor; ?>
                                        </span>
                                        <?php echo $com->content; ?>

                                    </div>
                                    <?php if($com->images): ?>
                                    <div class="hinhanh_cmt">
                                        <?php $__currentLoopData = $com->images()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($img->image_path); ?>" data-fancybox="video">
                                            <img src="<?php echo e($img->image_path); ?>" alt="<?php echo e($img->name); ?>">
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="time_trl_cmt">
                                        <div class="trl">
                                            <i class="fas fa-comment-dots"></i>
                                            Trả lời
                                        </div>
                                        <span>|</span>
                                        <div class="time"><?php echo e($com->created_at->format('d/m/Y h:i')); ?></div>
                                    </div>
                                    <div class="sumit_commet aaaaa hidden">
                                        <form action="<?php echo e(route('product.rating', ['id' => $data->id])); ?>" method="POST" id="" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="parent_id" value="<?php echo e($com->id); ?>">
                                            <textarea class="textarea" name="content" rows="4" placeholder="Nhập nội dung"></textarea>
                                            <div class="upfile upfile-tr">
                                                <div class="up">
                                                    <label>
                                                        <img src="./frontend/images/icon-upfile.png" alt="">
                                                        <span>Gửi ảnh thực tế</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="fomt_bg fomt_bg-tr">
                                                <div class="showimg_upfile">
                                                    <ul style="display: flex;">
                                                        <?php for($i = 1; $i < 4; $i++): ?> <li id="add-li_" style="margin: 0px 2px;">
                                                            <div id="img-reply-<?php echo e($i); ?>" class="img-wrap">
                                                                <div class="img-wrap-box">
                                                                    <div class="bacu"></div>
                                                                    <label for="image-reply<?php echo e($i); ?>" class="devvn_insert_attach_" data-id="<?php echo e($i); ?>" id="devvn_insert_attach_reply_<?php echo e($i); ?>">
                                                                        <div class="devvn-plus">+</div>
                                                                        <input type="file" id="image-reply<?php echo e($i); ?>" class="form-control-file is-hidden img-load-input-multiple_ border" data-id="<?php echo e($i); ?>" name="image1[]" multiple accept="image/*">
                                                                    </label>
                
                                                                </div>
                                                            </div>
                                                            </li>
                                                            <?php endfor; ?>
                                                    </ul>
                                                </div>
                
                                                <div class="input">
                                                    <input type="text" name="name" class="inputText" placeholder="Họ tên*" value="" required>
                                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> class="inputText" placeholder="Email*" required value="">
                                                    <div class="cloe_comet">
                                                        <i class="fas fa-times"></i>
                                                    </div>
                                                    <button class="btn_commet" type="submit">Gửi đánh giá</button>
                                                </div>
                
                
                                            </div>
                                        </form>
                                    </div>
                                    <?php $__currentLoopData = $com->where('parent_id', $com->id)->where('hot', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cmt_qt">
                                        <div class="header_cmt_qt">
                                            <?php echo e($value->name); ?> <span class="note">Quản trị viên</span>
                                        </div>
                                        <p><?php echo $value->content; ?></p>
                                        <?php if($value->images): ?>
                                        <div class="hinhanh_cmt">
                                            <?php $__currentLoopData = $value->images()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e($img->image_path); ?>" data-fancybox="video">
                                                <img src="<?php echo e($img->image_path); ?>" alt="<?php echo e($img->name); ?>">
                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php if(isset($dataRelate)): ?>
<?php if($dataRelate->count()): ?>
<div class="product-relate">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="title">
                    <h2>
                        <i class="far fa-star"></i>
                        <?php echo e(__('product.san_pham_lien_quan')); ?>

                    </h2>
                </div>
            </div>
            <div class="col-sm-12 col-12">
                <div class="row">
                    <div class="list-product-card autoplay6-spkhac category-slide-1" style="width:100%;">
                        <?php $__currentLoopData = $dataRelate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-product-item">
                            <div class="product-item">
                                <div class="box">
                                    <div class="image">
                                        <a href="<?php echo e($product->slug); ?>">
                                            <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($product->name); ?>">
                                            <?php if($product->old_price && $product->price): ?>
                                            <span class="sale"> <?php echo e(ceil(100 -($product->price)*100/($product->old_price))." %"); ?> </span>
                                            <?php endif; ?>

                                            <?php if($product->baohanh): ?>
                                            <div class="km">
                                                <?php echo e($product->baohanh); ?>

                                            </div>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    

                                    <div class="content">
                                        <h3><a href="<?php echo e($product->slug); ?>"><?php echo e($product->name); ?></a></h3>
                                        <div class="product-info__price">
                                            <?php if($product->price): ?>
                                            <span class=""><?php echo e(number_format($product->price)); ?>đ</span>
                                            <?php if($product->size): ?>
                                            <?php echo e('/ '.$product->size); ?>

                                            <?php endif; ?>
                                            <?php else: ?>
                                            <span class="">Liên hệ</span>
                                            <?php endif; ?>
                                            <?php if($product->old_price>0): ?>
                                            <strike class=""><?php echo e(number_format($product->old_price)); ?>đ</strike>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pro-item-start-rating">
                                            
                                            <?php
                                            $avgRating = 0;
                                            $sumRating = array_sum(array_column($product->productStars->where('hot', 1)->toArray(), 'star'));
                                            $countRating = count($product->productStars->where('hot', 1));
                                            if ($countRating != 0) {
                                            $avgRating = $sumRating / $countRating;
                                            }
                                            ?>
                                            <?php if($countRating>0): ?>
                                                <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i <= $avgRating): ?> <span class="StarRating__span"> 
                                                    <i class="star-bold far fa-star"></i>
                                                    </span>
                                                    <?php else: ?>
                                                        <span class="StarRating__span"> 
                                                        <i class=" far fa-star"></i>
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                (<?php echo e($countRating); ?> lượt đánh giá)
                                            <?php endif; ?>
                                        </div>
                                        <?php if(isset($product->price) && $product->price > 0): ?>
                                        <div class="product-btn">
                                            <button type="submit" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>" class="add-to-cart single_add_to_cart_button button alt wow bounce" data-wow-duration="3s" data-wow-delay="2s">Chọn mua</button>
                                        </div>
                                        <?php endif; ?>

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


</div>
<?php endif; ?>
<?php endif; ?>
</div>
</div>

<!-- Modal send commnet-->
<div class="dklt modal fade modal-First" id="modal-comment" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    <div class="bg-overlay"></div>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-title single-start-title">Thông Tin Người Gửi</div>
            <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body txt-center">
                <div class="form-info">
                    <div class="row">
                        <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>" id="productId">
                        <input type="hidden" name="type_comment" value="1" id="type_comment">
                        <div class="col-12">
                            <div class="u-flex flex-wrap no-gutters check-form-create-comment">
                                <div class="radio radio-sm danh-xung-comment">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungComment" value="1">
                                        Anh
                                    </label>
                                </div>
                                <div class="radio radio-sm danh-xung-comment" data-id="2">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungComment" value="2">
                                        Chị
                                    </label>
                                </div>
                            </div>
                            <div class="form-err txt-left" id="errorDanhXungComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="nameComment" class="form-control radius-8-mb" placeholder="Nhập họ và tên" id="nameComment" maxlength="50">
                            </div>
                            <div class="form-err txt-left" id="errorNameComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="tel" maxlength="10" name="phoneComment" class="form-control radius-8-mb" placeholder="Nhập số điện thoại" id="phoneComment">
                            </div>
                            <div class="form-err txt-left" id="errorPhoneComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="text-phone-error-comment">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" name="emailComment" id="emailComment" class="form-control" placeholder="Nhập email (Không bắt buộc)">
                            </div>
                            <div class="form-err txt-left email-error" id="errorEmailComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Email không hợp lệ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="sendComment" data-url="<?php echo e(route('product.create.comment')); ?>" class="button_plus txt-red">
                    Gửi bình luận
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal danh gia-->
<div class="dklt modal fade modal-First" id="modal-danh-gia" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    <div class="bg-overlay"></div>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-title single-start-title">Đánh giá &amp; nhận xét</div>
            <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body txt-center">
                <div class="form-info">
                    <div class="row">
                        <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>" id="productId">
                        <div class="col-12">
                            <div class="u-flex flex-wrap no-gutters check-form-create-review">
                                <div class="radio radio-sm danh-xung-review">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungReview" value="1">
                                        Anh
                                    </label>
                                </div>
                                <div class="radio radio-sm danh-xung-review" data-id="2">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungReview" value="2">
                                        Chị
                                    </label>
                                </div>
                            </div>
                            <div class="form-err txt-left" id="errorDanhXungReview" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>

                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="nameReview" class="form-control radius-8-mb" placeholder="Nhập họ và tên" id="nameReview" maxlength="50">
                            </div>
                            <div class="form-err txt-left" id="errorNameReview" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="tel" maxlength="10" name="phoneReview" class="form-control radius-8-mb" placeholder="Nhập số điện thoại" id="phoneReview">
                            </div>
                            <div class="form-err txt-left" id="errorPhoneReview" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="text-phone-error-comment">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" name="emailReview" id="emailReview" class="form-control" placeholder="Nhập email (Không bắt buộc)">
                            </div>
                            <div class="form-err txt-left email-error" id="errorEmailReview" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Email không hợp lệ</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group m-t-12">
                                <textarea id="contentReview" name="contentReview" class="form-control" rows="3" placeholder="Nhập nội dung đánh giá (Vui lòng gõ tiếng Việt có dấu)…"></textarea>
                                <div class="alert alert-md alert-danger alert-des alert-sm-md txt-left p-t-10" id="errorContentReview" style="display: none;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Mời bạn viết bình luận. (Tối thiểu 3 ký tự)</span>
                                </div>
                            </div>
                            <div class="lc__reviews-rating txt-center m-t-16">
                                <p class="fs-p-18 txt-gray-700 f-w-500 m-b-8 fs-p-md-16">
                                    Bạn chấm sản phẩm này bao nhiêu sao?
                                </p>
                                <div class="u-flex align-items-center justify-center relative">
                                    <ul class="lc__rating-star row no-gutters justify-center align-center m-b-4 js-rating create-rating">
                                        <li class="m-r-8" data-num="1">
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="m-r-8" data-num="2">
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="m-r-8" data-num="3">
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="m-r-8" data-num="4">
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="m-r-8" data-num="5">
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                    <span class="messrating fs-p-16 txt-gray-700" id="messrating"></span>
                                </div>
                                <div class="alert alert-md alert-danger alert-des alert-sm-md m-t-16 m-t-md-0 error-star" style="display: none;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Vui lòng đánh giá của bạn về sản phẩm này</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="sendReview" data-url="<?php echo e(route('product.create.comment')); ?>" class="button_plus txt-red">
                    Gửi đánh giá
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal replay commnet-->
<div class="dklt modal fade modal-First" id="modalReplyComment" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-title single-start-title">Trả Lời “<span id="replyNameComment" class="f-w-500"></span>”</div>
            <input type="hidden" id="replyIdComment">
            <input type="hidden" id="replyTypeComment">
            <div class="modal-body txt-center txt-gray-700 p-t-0 p-x-md-16">
                <div class="form-info">
                    <div class="row">
                        <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>" id="productId">
                        <input type="hidden" name="type_comment" value="1" id="type_comment">
                        <div class="col-12">
                            <div class="u-flex flex-wrap no-gutters check-form-reply-comment">
                                <div class="radio radio-sm danh-xung-reply-comment">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungReplyComment" value="1">
                                        Anh
                                    </label>
                                </div>
                                <div class="radio radio-sm danh-xung-comment" data-id="2">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungReplyComment" value="2">
                                        Chị
                                    </label>
                                </div>
                            </div>
                            <div class="form-err txt-left" id="errorDanhXungReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>

                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="nameReplyComment" class="form-control radius-8-mb" placeholder="Nhập họ và tên" id="nameReplyComment" maxlength="50">
                            </div>
                            <div class="form-err txt-left" id="errorNameReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="tel" maxlength="10" name="phoneReplyComment" class="form-control radius-8-mb" placeholder="Nhập số điện thoại" id="phoneReplyComment">
                            </div>
                            <div class="form-err txt-left" id="errorPhoneReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="text-phone-error-comment">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" name="emailReplyComment" id="emailReplyComment" class="form-control" placeholder="Nhập email (Không bắt buộc)">
                            </div>
                            <div class="form-err txt-left email-error" id="errorEmailReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Email không hợp lệ</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group m-t-12">
                                <textarea id="contentReplyComment" name="contentReplyComment" class="form-control" rows="3" placeholder="Nhập nội dung câu hỏi (Vui lòng gõ tiếng Việt có dấu)…"></textarea>
                                <div class="alert alert-md alert-danger alert-des alert-sm-md txt-left p-t-10" id="errorContentReplyComment" style="display: none;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Mời bạn viết bình luận. (Tối thiểu 3 ký tự)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="sendReplyComment" data-url="<?php echo e(route('product.create.comment')); ?>" class="button_plus txt-red">
                    GỬI NGAY
                </button>
            </div>
        </div>
    </div>
</div>

<div id="modal_ajax">

</div>



<script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/setup.js')); ?>"></script>
<form action="" method="get" name="formfill" id="formfill" class="d-none">
    <?php echo csrf_field(); ?>
</form>

<script>
    $('#dgm_call_me_phone').click(function() {
        $('#dgm_call_me_name').addClass('displayblock');
    })
</script>
<script type="text/javascript">
    // js  show childs category Ä‘á»‡ quy
    $(document).on('click', '.lb-toggle', function() {
        $('.accordion-button').removeClass('plain ');
        $(this).toggleClass('active ');
        $(this).find('i').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
    });
    // end js  show childs category Ä‘á»‡ quy

    $(document).ready(function() {
        $('.autoplay1').slick({
            dots: false,
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            speed: 300,
            autoplaySpeed: 3000,
        });
        // $('.column').click(function() {
        //     var src = $(this).find('img').attr('src');
        //     $(".hrefImg").attr("href", src);
        //     $("#expandedImg").attr("src", src);
        // });
        $('.column').click(function() {
            var src = $(this).find('img').attr('src');
            let parent = $(this).parents('.image-main');
            parent.find(".hrefImg").attr("href", src);
            parent.find(".expandedImg").attr("src", src);
        });
        $('.slide_small').slick({
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            }]
        });


        $(document).on('click', '.tab-link ul li a', function() {
            $('.tab-link ul li a').removeClass('active');
            $(this).addClass('active');
        });

        $('.autoplay5-product-detail-new').slick({
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
            responsive: [{
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 551,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 425,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,

                    }
                }
            ]
        });

        //tạm đóng lại do không dùng đến
        if (0) {
            $(document).on('change', '.field-form', function() {
                // $( "#formfill" ).submit();

                let contentWrap = $('#dataProductSearch');

                let urlRequest = '<?php echo e(makeLinkById('
                category_products ',$data->category->id)); ?>';
                let data = $("#formfill").serialize();
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    data: data,
                    success: function(data) {
                        if (data.code == 200) {
                            let html = data.html;
                            contentWrap.html(html);
                        }
                    }
                });
            });
            // load ajax phaan trang
            $(document).on('click', '.pagination a', function() {
                event.preventDefault();
                let contentWrap = $('#dataProductSearch');
                let href = $(this).attr('href');
                //alert(href);
                $.ajax({
                    type: "Get",
                    url: href,
                    // data: "data",
                    dataType: "JSON",
                    success: function(response) {
                        let html = response.html;

                        contentWrap.html(html);
                    }
                });
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var boxnumber = $('.box-add-cart input').val();
        parseInt(boxnumber);
        $('.cart_qty_add').click(function() {
            if ($(this).parent().parent().find('input').val() < 50) {
                var a = $(this).parent().parent().find('input').val(+$(this).parent().parent().find(
                    'input').val() + 1);

                console.log('+');

                //  let url = $('#addCart').data('start');
                //  url += "?quantity=" + $('#cart_quantity').val();
                //  $('#addCart').attr('data-url',url);

                //  let url2 = $('#buyCart').attr('href');
                //  url2 += "?quantity=" + $('#cart_quantity').val();
                //  $('#buyCart').attr('href',url2);
                $(".optionChange").trigger('change');
            }
        });

        $('.cart_qty_reduce').click(function() {
            if ($(this).parent().parent().find('input').val() > 1) {
                if ($(this).parent().parent().find('input').val() > 1) $(this).parent().parent().find(
                    'input').val(+$(this).parent().parent().find('input').val() - 1);

                console.log('-');

                //   let url = $('#addCart').data('start');
                //  url += "?quantity=" + $('#cart_quantity').val();

                //  $('#addCart').attr('data-url',url);

                //  let url2 = $('#buyCart').attr('href');
                //  url2 += "?quantity=" + $('#cart_quantity').val();
                //  $('#buyCart').attr('href',url2);
                $(".optionChange").trigger('change');
            }
        });


        $(document).on('change', '#cart_quantity', function() {
            if ($(this).parent().parent().find('input').val() > 1) {
                var a = $(this).val();
                $(".optionChange").trigger('click');
                // let url = $('#addCart').data('start');
                // url += "?quantity=" + $('#cart_quantity').val();
                // $('#addCart').attr('data-url',url);

                // let url2 = $('#buyCart').attr('href');
                //      url2 += "?quantity=" + $('#cart_quantity').val();
                //      $('#buyCart').attr('href',url2);
            }
        });

        //Add Cart Pro 
        // $(document).on('change','.optionChange',function(){
        //     // let val= ($(this).val());
        //     let val= $('input[name=size]:checked').val() ?? $(this).val();
        //     let arrPriceAndId = val.split("-").map(function(value,index){
        //         return parseInt(value);
        //     });
        //     //Giá cũ
        //     let old_price = $(this).data('old_price');
        //     let name_option = $(this).data('tooltop-title');
        //     let arrPriceAndId2 = old_price.split("-").map(function(value2,index){
        //         return parseInt(value2);
        //     });

        //     var nf = Intl.NumberFormat();

        //     let text= 'Liên hệ';
        //     let text2= '';
        //     let url = $('#addCart').data('start');
        //     url += "?quantity=" + $('#cart_quantity').val();
        //     if(arrPriceAndId[1]){
        //         url += "&option=" + arrPriceAndId[1];
        //     }

        //     if(arrPriceAndId[0]>0){
        //         let price= nf.format(arrPriceAndId[0]);
        //         text=price+' /' + name_option;
        //     }
        //     if(arrPriceAndId2[0]>0){
        //         let price2= nf.format(arrPriceAndId2[0]);
        //         // text2=price2+' <span>₫</span>';
        //         text2=price2+' /' + name_option;
        //     }

        //     console.log('url', url);
        //     $('#addCart').attr('data-url',url);
        //     $('#priceChange').html(text);
        //     $('#name_option').html(name_option);
        //     $('#old_priceChange').html(text2);
        // });


        $(document).on('change ', '.optionChange', function() {
            let val = ($(this).val());
            let arrPriceAndId = val.split("-").map(function(value, index) {
                return parseInt(value);
            });

            var nf = Intl.NumberFormat();

            let text = 'Liên hệ';
            let url = $('#addCart').data('start');
            url += "?quantity=" + $('#cart_quantity').val();
            if (arrPriceAndId[1]) {
                url += "&option=" + arrPriceAndId[1];
            }
            if (arrPriceAndId[0] > 0) {
                let price = nf.format(arrPriceAndId[0]);
                text = price + '<span class="donvi"> <?php echo e($unit); ?></span>';
            }
            $('#addCart').attr('data-url', url);
            $('#priceChange').html(text);
        });




    });

    $(function() {
        let width;
        width = $(window).width();

        if (width > 991) {
            (function() {
                var inc = 0;
                $('.name-p').each(function() {
                    $(this).attr('data-scsp', "data" + inc)
                    inc++;
                });
            })();
            (function() {
                var inc = 0;
                $('.scrollLink').each(function(ev) {
                    $(this).attr('data-scsp', "data" + inc)
                    inc++;
                });
            })();

            $(window).on("load scroll", function() {
                var windowScroll = $(this).scrollTop();
                $(".name-p").each(function() {
                    var thisOffsetTop = Math.round($(this).offset().top - 30);

                    if (windowScroll >= thisOffsetTop) {
                        var thisAttr = $(this).attr('data-scsp');
                        $('.scrollLink').removeClass("active");
                        $('.scrollLink[data-scsp="' + thisAttr + '"]').addClass("active");
                    }
                });
            });
        }

        $(window).resize(function() {
            width = $(window).width();
            if (width > 991) {
                (function() {
                    var inc = 0;
                    $('.name-p').each(function() {
                        $(this).attr('data-scsp', "data" + inc)
                        inc++;
                    });
                })();
                (function() {
                    var inc = 0;
                    $('.scrollLink').each(function(ev) {
                        $(this).attr('data-scsp', "data" + inc)
                        inc++;
                    });
                })();

                $(window).on("load scroll", function() {
                    var windowScroll = $(this).scrollTop();
                    $(".name-p").each(function() {
                        var thisOffsetTop = Math.round($(this).offset().top - 30);

                        if (windowScroll >= thisOffsetTop) {
                            var thisAttr = $(this).attr('data-scsp');
                            $('.scrollLink').removeClass("active");
                            $('.scrollLink[data-scsp="' + thisAttr + '"]').addClass("active");
                        }
                    });
                });
            }
        });
    });
</script>

<script>
    $(function() {
        //get id product
        let idProduct = $('.blog-product-detail').attr('data-id');

        let products = localStorage.getItem("products");

        if (!products) {
            arrayProduct = new Array();
            arrayProduct.push(idProduct);

            localStorage.setItem('products', JSON.stringify(arrayProduct));
        } else {
            //chuyen ve arr
            products = $.parseJSON(products);

            if (products.indexOf(idProduct) == -1) {

                products.push(idProduct);
                localStorage.setItem('products', JSON.stringify(products));
            }
        }
        // console.log(products);
    })
</script>
<script>
    function cclick() {
        let visibleIndex = -1;
        const review = document.querySelectorAll('.review');
        const btn = document.querySelectorAll('.closeShow');

        btn.forEach((element, index) => {
            element.addEventListener('click', () => {
                console.log(visibleIndex)
                if (visibleIndex !== index) {
                    if (visibleIndex >= 0) {
                        review[visibleIndex].style.display = 'none';
                    }
                    review[index].style.display = 'block';
                    visibleIndex = index;
                } else {
                    review[visibleIndex].style.display = 'none';
                    visibleIndex = -1;
                }
            });
        });
    }

    cclick();
</script>
<script>
    $(document).on('click', '.devvn_insert_attach_', function() {
        let id = $(this).data('id');
        //const insert = document.querySelector("#devvn_insert_attach_"+id);

        $(document).on('click', '#devvn_insert_attach_reply_' + id, function() {
            //console.log(insert);
            const img = document.getElementById('img');
            if (img) {
                img.remove();
            }

            let id = $(this).data('id');

            const subject = document.querySelector("#add-li_");

        });
    });


    $(document).on('change', '.img-load-input-multiple_', function() {
        let id = $(this).data('id');
        let id_ed = id + 1;
        let input = $(this);
        displayMultipleImage(input, '.showimg_upfile', '#img-reply-' + id);
    });

    function displayMultipleImage(input, selectorWrap, selectorWrapImg) {
        let wrapImg = input.parents(selectorWrap).find(selectorWrapImg);
        wrapImg.find('img').remove();
        let files = input.prop('files');
        let length = files.length;
        for (let i = 0; i < length; i++) {
            fileItem = files[i];
            let reader = new FileReader();
            reader.addEventListener("load", function() {
                let img = $('<img />');
                img.attr({
                    'src': reader.result,
                    'alt': fileItem.name,
                });

                let deleteIcon = $('<i class="fas fa-times-circle"></i>');
                let wrap = $('<div></div>');
                wrap.append(deleteIcon);
                wrapImg.append(wrap);
                wrapImg.append(img);
                deleteIcon.on('click', function() {
                    wrap.remove();
                    img.remove();
                    input.val('');
                });

            }, false);
            if (fileItem) {
                reader.readAsDataURL(fileItem);
            }
        }
    }
</script>
<script>
    const stars = document.querySelectorAll('.thongkeudanhgia .vote i');

    stars.forEach((star, index) => {
        star.addEventListener('mouseover', () => {
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('checkeds');
            }
        });

        star.addEventListener('mouseout', () => {
            for (let i = 0; i <= index; i++) {
                stars[i].classList.remove('checkeds');
            }
        });
    });
    $(document).on('click', '.devvn_insert_attach', function() {
        let id = $(this).data('id');
        //const insert = document.querySelector("#devvn_insert_attach_"+id);

        $(document).on('click', '#devvn_insert_attach_' + id, function() {
            //console.log(insert);
            const img = document.getElementById('img');
            if (img) {
                img.remove();
            }

            let id = $(this).data('id');

            const subject = document.querySelector("#add-li");

        });
    });

    $(document).on('change', '.img-load-input-multiple', function() {
        let id = $(this).data('id');
        let id_ed = id + 1;
        let input = $(this);

        displayMultipleImage(input, '.upfileimg', '#img-' + id);
    });


    function displayMultipleImage(input, selectorWrap, selectorWrapImg) {
        let wrapImg = input.parents(selectorWrap).find(selectorWrapImg);
        wrapImg.find('img').remove();
        let files = input.prop('files');
        let length = files.length;
        for (let i = 0; i < length; i++) {
            fileItem = files[i];
            let reader = new FileReader();
            reader.addEventListener("load", function() {
                // convert image file to base64 string
                let img = $('<img />');
                img.attr({
                    'src': reader.result,
                    'alt': fileItem.name,
                });

                let deleteIcon = $('<i class="fas fa-times-circle"></i>');
                let wrap = $('<div></div>');
                wrap.append(deleteIcon);
                wrapImg.append(wrap);
                wrapImg.append(img);
                deleteIcon.on('click', function() {
                    wrap.remove();
                    img.remove();
                    input.val('');
                });

            }, false);
            if (fileItem) {
                reader.readAsDataURL(fileItem);
            }
        }
    }
</script>

<script>
    function hovervote() {

        const stars = document.querySelectorAll('.hovervote i');

        stars.forEach((star, index) => {
            star.addEventListener('mouseover', () => {
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.add('checkeds');
                }
            });

            star.addEventListener('mouseout', () => {
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.remove('checkeds');
                }
            });
        });
    }
    hovervote()
</script>
<script>
    function cclickas() {
        var textarea = document.querySelector('.show_hoidap');
        var closeBtn = document.querySelector('.cloe_cometss i');

        textarea.addEventListener('click', function() {
            var sumitComment = document.querySelector('.sumit_commethoidap');
            sumitComment.classList.remove('hidden');

        });

        closeBtn.addEventListener('click', function() {
            var sumitComment = document.querySelector('.sumit_commethoidap');
            sumitComment.classList.add('hidden');
        });
    }
    cclickas()
</script>


<script>
    const nameCmts = document.querySelectorAll('.name_cmt');
    nameCmts.forEach(function(nameCmt) {
        const name = nameCmt.querySelector('.name');
        const firstChar = name.textContent.trim().charAt(0);
        const avata = nameCmt.querySelector('.avata');
        avata.textContent = firstChar;
    });
</script>
<script>
    function footessr() {
        var images = document.querySelectorAll('.trl');
        images.forEach((element, index) => {
            var fo = document.querySelectorAll('.aaaaa')
            element.addEventListener('click', () => {
                fo[index].classList.remove('hidden');
            });
            var close = fo[index].querySelector('.cloe_comet');
            close.addEventListener('click', (event) => {
                event.preventDefault();
                fo[index].classList.add('hidden');
            });
        });
    }
    footessr();
</script>

<script>
    function vote() {
        const stars = document.querySelectorAll('.vote i');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const rating = index + 1;

                for (let i = 0; i < stars.length; i++) {
                    if (i < rating) {
                        stars[i].classList.add('checked');
                    } else {
                        stars[i].classList.remove('checked');
                    }
                }
            });
        });
    }
    vote()
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\demola\resources\views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>