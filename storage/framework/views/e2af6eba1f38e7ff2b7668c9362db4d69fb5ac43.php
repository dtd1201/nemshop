
<?php if($footer['anh']): ?>
<div class="Banner">
    <div class="img">
        <img src="<?php echo e($footer['anh']->image_path); ?>" alt="<?php echo e($footer['anh']->name); ?>">
    </div>
</div>
<?php endif; ?>
<?php if($footer['nha_thuoc']): ?>
<div class="Introduce">
    <div class="container">
        <div class="logo__Introduce">
            <div class="img">
                <img src="<?php echo e($footer['nha_thuoc']->image_path); ?>" alt="<?php echo e($footer['nha_thuoc']->name); ?>">
            </div>
        </div>
        <div class="contet__introduce">
            <h2 class="title__Introduce"><?php echo e($footer['nha_thuoc']->name); ?></h2>
            <p class="description__Introduce">
            <?php echo e($footer['nha_thuoc']->value); ?>

            </p>
            <a href="javasctipt:;" class="link__Introduce">Xem giới thiệu</a>
        </div>

    </div>
</div>
    <?php if($footer['nha_thuoc']->childs->count()>0): ?>
    <div class="AdvertisingPhoto">
        <div class="waapp__Advertising  js--waapp--Advertising">
            <div class="marquee__AdvertisingPhoto">
                <?php $__currentLoopData = $footer['nha_thuoc']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="img">
                    <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
<?php if($footer['he_thong']): ?>
<div class="AddressesOfBranches">
    <div class="container">
        <div class="Addresses">
            <div class="Addresses__info">
                <h3 class="title__Addresses"><?php echo e($footer['he_thong']->name); ?></h3>
                <?php if($footer['he_thong']->childs->count()>0): ?>
                <div class="find__address">
                    <div class="find__city">

                        <select name="" id="" class="option_city">
                            <option data-id="0" value="0">Chọn tỉnh thành</option>
                            <?php $__currentLoopData = $footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option data-id="<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="find__district option_district active" id="0">
                            <select name="" id="">
                                <option value="">Quận huyện</option>
                            </select>
                    </div>
                    <?php $__currentLoopData = $footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="find__district option_district" id="<?php echo e($item->id); ?>">
                            <?php if($item->childs->count()>0): ?>
                            <select name="" id="">
                                <option value="">Quận huyện</option>
                                <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option data-id="<?php echo e($i->id); ?>" value="<?php echo e($i->id); ?>"><?php echo e($i->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="option_parent active" id="parent-0">
                <?php $__currentLoopData = $footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->childs->count()>0): ?>
                        
                        <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i->childs->count()>0): ?>
                            
                                <?php $__currentLoopData = $i->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item__addresses js--item__addresses " >
                                    <h4 class="title__item__addresses">
                                        <?php echo e($s->name); ?>

                                    </h4>
                                    <ul class="info__addresses__details">
                                        <li class="detail__addresse">
                                            <i class="ti-location-pin icon-addresse"></i>
                                            <span><?php echo e($s->slug); ?></span>
                                        </li>
                                        <li class="detail__addresse">
                                            <i class="fas fa-phone-volume"></i>
                                            <span><?php echo e($s->content1); ?></span>
                                        </li>
                                        <li class="detail__addresse">
                                            <i class="far fa-clock"></i>
                                            <span><?php echo e($s->content2); ?></span>
                                        </li>
                                    </ul>
                                    <div class="link__addresses">
                                        <a href="https://zalo.me/<?php echo e($s->content3); ?>" target="_blank" class="link__addresses__a">
                                            Chat Zalo
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <a href="<?php echo e($s->value); ?>" target="_blank" class="link__addresses__a link__addresses__a--red">
                                            Xem chỉ đường
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php $__currentLoopData = $footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->childs->count()>0): ?>
                        <div class="option_parent" id="parent-<?php echo e($item->id); ?>">
                        <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i->childs->count()>0): ?>
                            <div class="option_address <?php echo e($item->id); ?> active" id="<?php echo e($i->id); ?>">
                                <?php $__currentLoopData = $i->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item__addresses js--item__addresses " >
                                    <h4 class="title__item__addresses">
                                        <?php echo e($s->name); ?>

                                    </h4>
                                    <ul class="info__addresses__details">
                                        <li class="detail__addresse">
                                            <i class="ti-location-pin icon-addresse"></i>
                                            <span><?php echo e($s->slug); ?></span>
                                        </li>
                                        <li class="detail__addresse">
                                            <i class="fas fa-phone-volume"></i>
                                            <span><?php echo e($s->content1); ?></span>
                                        </li>
                                        <li class="detail__addresse">
                                            <i class="far fa-clock"></i>
                                            <span><?php echo e($s->content2); ?></span>
                                        </li>
                                    </ul>
                                    <div class="link__addresses">
                                        <a href="https://zalo.me/<?php echo e($s->content3); ?>" target="_blank" class="link__addresses__a">
                                            Chat Zalo
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <a href="<?php echo e($s->value); ?>" target="_blank" class="link__addresses__a link__addresses__a--red">
                                            Xem chỉ đường
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="Addresses__map">
            <?php $__currentLoopData = $footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                    <div class="op_map" id="map-0">
                        <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i->childs->count()>0): ?>
                                <?php $__currentLoopData = $i->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                <div class="map__1 0 active" id="map-0">
                                    <?php echo $s->description; ?>

                                </div>
                                <?php else: ?>
                                <div class="map__1 0" id="map-0">
                                    <?php echo $s->description; ?>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="op_map">
                        <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i->childs->count()>0): ?>
                                <?php $__currentLoopData = $i->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                <div class="map__1 0 active" >
                                    <?php echo $s->description; ?>

                                </div>
                                <?php else: ?>
                                <div class="map__1 0">
                                    <?php echo $s->description; ?>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->childs->count()>0): ?>
                    <?php if($loop->first): ?>
                    <div class="op_map active" id="map-<?php echo e($item->id); ?>">
                        <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i->childs->count()>0): ?>
                                <?php $__currentLoopData = $i->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                <div class="map__1 <?php echo e($item->id); ?> active" id="map-<?php echo e($i->id); ?>">
                                    <?php echo $s->description; ?>

                                </div>
                                <?php else: ?>
                                <div class="map__1 <?php echo e($item->id); ?>" id="map-<?php echo e($i->id); ?>">
                                    <?php echo $s->description; ?>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="op_map" id="map-<?php echo e($item->id); ?>">
                        <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i->childs->count()>0): ?>
                                <?php $__currentLoopData = $i->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                <div class="map__1 <?php echo e($item->id); ?> active" id="map-<?php echo e($i->id); ?>">
                                    <?php echo $s->description; ?>

                                </div>
                                <?php else: ?>
                                <div class="map__1 <?php echo e($item->id); ?>" id="map-<?php echo e($i->id); ?>">
                                    <?php echo $s->description; ?>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>
<?php endif; ?>
<?php if(isset($footer['gutters']) && $footer['gutters']): ?>
<div class="section-group-footer bg-gray p-t-40 p-t-md-16">
    <div class="section-method p-b-40">
        <div class="container p-x-md-10">
            <div class="group-footer-body">
                <div class="row no-gutters justify-between body-list">
                    <?php $__currentLoopData = $footer['gutters']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="body-list-item col-auto col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 relative m-b-md-20">
                        <div class="u-flex no-gutters align-items-center flex-wrap">
                            <div class="col-auto col-md-12 m-r-16 m-b-md-8">
                                <div class="body-list-icon">
                                    <div class="image">
                                        <img src="<?php echo e(asset($value->image_path)); ?>" alt="<?php echo e($value->name); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-12">
                                <div class="body-list-content">
                                    <div class="body-list-tit txt-primary-700 f-w-500  txt-uppercase fs-p-lg-16 fs-p-md-14  fs-p-xxs-13">
                                        <?php echo e($value->name); ?>

                                    </div>
                                    <div class="body-list-typo fs-p-16 fs-p-lg-14 txt-gray-700 fs-p-xxs-12 ">
                                        <?php echo e($value->value); ?>

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
<div class="System__Pharmacies">
    <div class="container">
        <div class="content__system">
            <h3 class="title__system">
                <span class="icon__location"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="41" viewBox="0 0 32 41" fill="none">
                        <path d="M16 20.5C17.1 20.5 18.042 20.108 18.826 19.324C19.6087 18.5413 20 17.6 20 16.5C20 15.4 19.6087 14.458 18.826 13.674C18.042 12.8913 17.1 12.5 16 12.5C14.9 12.5 13.9587 12.8913 13.176 13.674C12.392 14.458 12 15.4 12 16.5C12 17.6 12.392 18.5413 13.176 19.324C13.9587 20.108 14.9 20.5 16 20.5ZM16 40.5C10.6333 35.9333 6.62533 31.6913 3.976 27.774C1.32533 23.858 0 20.2333 0 16.9C0 11.9 1.60867 7.91667 4.826 4.95C8.042 1.98333 11.7667 0.5 16 0.5C20.2333 0.5 23.958 1.98333 27.174 4.95C30.3913 7.91667 32 11.9 32 16.9C32 20.2333 30.6753 23.858 28.026 27.774C25.3753 31.6913 21.3667 35.9333 16 40.5Z" fill="white"></path>
                    </svg></span>
                Hệ thống nhà thuốc uy tín từ năm 1988
            </h3>
            <a href="<?php echo e(route('home.he-thong')); ?>" class="more__pharmacies">
                Xem danh sách nhà thuốc
            </a>
        </div>
    </div>
</div>
<?php if(isset($footer['drugStore']) && $footer['drugStore']): ?>

<?php endif; ?>
<div class="footer">
    <div class="footer-main">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="box_right_footer">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-item-footer">
                                <div class="box-footer-main-info">
                                    <?php if(isset($footer['dataAddress']) && $footer['dataAddress']): ?>
                                    <div class="content-address-footer">
                                        <?php echo $footer['dataAddress']->description; ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-item-footer">
                                <div class="title-footer">
                                    <?php echo e(__('footer.dangky_nhanbantin')); ?>

                                </div>
                                <div class="box_form_dky">
                                    <p><?php echo e(__('footer.duoc_giam_gia')); ?>!</p>
                                    <form action="<?php echo e(route('contact.storeAjax')); ?>" data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input class="form-control" type="email" name="email" placeholder="<?php echo e(__('footer.nhap_mail')); ?>" required>
                                        <button name="submit"> <i class="fas fa-paper-plane"></i></button>
                                    </form>
                                </div>
                                <ul class="pt_social">
                                    <p>Kết nối tới chúng tôi</p>
                                    <?php if(isset($footer['socialParent1']) && $footer['socialParent1']): ?>
                                    <?php $__currentLoopData = $footer['socialParent1']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($social->slug); ?>" target="blank" rel="noopener noreferrer">
                                            <?php if($social->value != null): ?>
                                            <?php echo $social->value; ?>

                                            <?php else: ?>
                                            <img src="<?php echo e(asset($social->image_path)); ?>" alt="<?php echo e($social->name); ?>">
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
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                            <?php if(isset($footer['linklienket']) && $footer['linklienket']->count()>0 ): ?>
                            <div class="box_link_foot">
                                <div class="title">
                                    <span><?php echo e($footer['linklienket']->name); ?></span>
                                    <img class="show_mb" src="<?php echo e(asset('frontend/images/arrow-right2.png')); ?>" alt="Arrows">
                                </div>
                                <ul>
                                    <?php $__currentLoopData = $footer['linklienket']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                            <?php if(isset($footer['linklienket1']) && $footer['linklienket1']->count()>0 ): ?>
                            <div class="box_link_foot">
                                <div class="title">
                                    <span><?php echo e($footer['linklienket1']->name); ?></span>
                                    <img class="show_mb" src="<?php echo e(asset('frontend/images/arrow-right2.png')); ?>" alt="Arrows">
                                </div>
                                <ul>
                                    <?php $__currentLoopData = $footer['linklienket1']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                            <?php if(isset($footer['linklienket2']) && $footer['linklienket2']->count()>0 ): ?>
                            <div class="box_link_foot">
                                <div class="title">
                                    <span><?php echo e($footer['linklienket2']->name); ?></span>
                                    <img class="show_mb" src="<?php echo e(asset('frontend/images/arrow-right2.png')); ?>" alt="Arrows">
                                </div>
                                <ul>
                                    <?php $__currentLoopData = $footer['linklienket2']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
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
            <div class="row line_bottom">
                <div class="col-md-12 col-sm-12">
                    <div class="coppy-right">
                        <?php if(isset($footer['coppy_right'])&&$footer['coppy_right']): ?>
                        <?php echo e($footer['coppy_right']->value); ?>

                        <?php endif; ?>
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
                <form action="<?php echo e(route('contact.storeAjax')); ?>" data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
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
                            <input type="text" class="form-control" name="name" placeholder="Họ tên">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="content" placeholder="Nội dung tư vấn">
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

<div class="use_link">
    <ul>
        <?php if(isset($footer['socialParent']) && $footer['socialParent']->count() > 0): ?>
        <?php $__currentLoopData = $footer['socialParent']->childs()->where('active', 1)->orderBy('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="use_link--li">
            <a href="<?php echo e($item->slug); ?>" target="_blank"><img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>"></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <li id="back-to-top" class="use_link--li">
            <a href="javascript:;" onclick="topFunction();">
                <img src="<?php echo e(asset('frontend/images/icon_back_to_top.png')); ?>">
            </a>
        </li>
    </ul>
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

    $(document).on('change','.option_city', function(){
        let id = $(this).find('option:selected').data('id');
        $('.option_district').removeClass('active');
        $('#'+id).addClass('active');
        $('.option_parent').removeClass('active');
        $('#parent-'+id).addClass('active');
        $('.op_map').removeClass('active');
        $('#map-'+id).addClass('active');
        $('.option_address').removeClass('active');
        $('.option_address.'+id).addClass('active');
        $('.map__1').removeClass('active');
        $('.map__1.'+id).addClass('active');
    })
    $(document).on('change','.option_district', function(){
        let id = $(this).find('option:selected').data('id');
        $('.option_address').removeClass('active');
        $('#'+id).addClass('active');
        $('.map__1').removeClass('active');
        $('#map-'+id).addClass('active');
    })
    //quickview

    $(document).ready(function() {
        $('.quickview').click(function() {

            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $('.wrapper-quickview').fadeIn(500);
            $('.jsQuickview').fadeIn(500);
            $.ajax({
                url: "<?php echo e(url('/quickview')); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
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

    $(document).on('click', '.quickview-close, .quickviewOverlay', function(e) {
        $(".wrapper-quickview").fadeOut(500);
        $('.jsQuickview').fadeOut(500);
    });

    $(document).on('change', '#quantity-quickview', function() {
        if ($(this).val() > 1) {
            var a = $(this).val();
            //   $(".optionChange").trigger('change');

            let url2 = $('#buyCartQuickView').attr('href');
            url2 += "?quantity=" + $('#quantity-quickview').val();
            $('#buyCartQuickView').attr('href', url2);
        }
    });

    $('.nav-item').hover(function() {
        $('.nav-item').removeClass('active_menu');
        $(this).addClass('active_menu');
        $('.box-form-slide').css('z-index', 0);
    })

    $('.nav-sub-item').hover(function() {
        let id = $(this).attr('data-id');

        $('.nav-sub-item').removeClass('active');
        $(this).parents('.menu-dropdown').find('.sub-nav-right').removeClass('active');
        $(this).addClass('active');
        $('#' + id).addClass('active');
    })



    // $('.nav-hover').each(function () {
    //     $(this).mouseenter(function () {
    //         $(this).find('.lc__dropdown-menu').addClass('lc__block');
    //         $('.lc__dropdown-menu').is('.lc__block') && $('.lc__mask').addClass('lc__block').css('z-index', '1060');
    //         $('.lc__header-searchbar .lc__suggestion,.lc__header-searchbar .lc__history').hide();
    //     }).mouseleave(function () {
    //         $('.lc__mask, .lc__dropdown-menu').removeClass('lc__block').css('z-index', '1059');
    //     });
    // });

    // ajax load form
    $(document).on('submit', "[data-ajax='submit']", function() {
        let myThis = $(this);
        let formValues = $(this).serialize();
        let dataInput = $(this).data();
        // dataInput= {content: "#content", href: "#modalAjax", target: "modal", ajax: "submit", url: "http://127.0.0.1:8000/contact/store-ajax"}

        $.ajax({
            type: dataInput.method,
            url: dataInput.url,
            data: formValues,
            dataType: "json",
            success: function(response) {
                if (response.code == 200) {
                    myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val('');
                    if (dataInput.content) {
                        $(dataInput.content).html(response.html);
                    }
                    if (dataInput.target) {
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
                } else {
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
            error: function(response) {
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
</script><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>