
<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<style>
    .AddressesOfBranches{
        display: none;
    }
    .AddressesOfBranches.active{
        display: block;
    }
</style>
<?php $__env->startSection('content'); ?>
<?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
            <?php echo $__env->make('frontend.components.breadcrumbs',[
            'breadcrumbs'=>$breadcrumbs,
            'type'=>$typeBreadcrumb,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
<?php if($data): ?>
<div class="AddressesOfBranches active">
    <div class="container">
        <div class="Addresses">
            <div class="Addresses__info">
                <h3 class="title__Addresses"><?php echo e($data->name); ?></h3>
                <div class="search_hethong">
                    <form action="<?php echo e(route('home.he-thong')); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kếm...">
                            <div class="input-group-append">
                                <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <?php if($data->childs->count()>0): ?>
                <div class="find__address">
                    <div class="find__city">

                        <select name="" id="" class="option_city">
                            <option data-id="0" value="0">Chọn tỉnh thành</option>
                            <?php $__currentLoopData = $data->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option data-id="<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="find__district option_district active" id="0">
                            <select name="" id="">
                                <option value="">Quận huyện</option>
                            </select>
                    </div>
                    <?php $__currentLoopData = $data->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                
                                <div class="active">
                                    <?php
                                        $filteredAddresses = $i->childs()
                                            ->where('active', 1)
                                            ->orderBy('order')
                                            ->get()
                                            ->filter(function ($s) use ($keyword) {
                                                return stripos($s->name, $keyword) !== false;
                                            });
                                    ?>
                                    <?php $__currentLoopData = $filteredAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php $__currentLoopData = $data->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->childs->count()>0): ?>
                        <div class="option_parent" id="parent-<?php echo e($item->id); ?>">
                        <?php $__currentLoopData = $item->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i->childs->count()>0): ?>
                                <?php if($loop->first): ?>
                                <div class="option_address <?php echo e($item->id); ?> active" id="<?php echo e($i->id); ?>">
                                    <?php
                                        $filteredAddresses = $i->childs()
                                            ->where('active', 1)
                                            ->orderBy('order')
                                            ->get()
                                            ->filter(function ($s) use ($keyword) {
                                                return stripos($s->name, $keyword) !== false;
                                            });
                                    ?>
                                    <?php $__currentLoopData = $filteredAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <?php else: ?>
                                <div class="option_address <?php echo e($item->id); ?> active" id="<?php echo e($i->id); ?>">
                                    <?php
                                        $filteredAddresses = $i->childs()
                                            ->where('active', 1)
                                            ->orderBy('order')
                                            ->get()
                                            ->filter(function ($s) use ($keyword) {
                                                return stripos($s->name, $keyword) !== false;
                                            });
                                    ?>
                                    <?php $__currentLoopData = $filteredAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on('click', '.select_address', function() {
        let id_address = $(this).data('id_address');

        let urlRequest = window.location;

        urlRequest = urlRequest + '?' + 'id_address' + '=' + id_address;

        if (id_address != '') {
            $.ajax({
                url: urlRequest,
                method: "GET",

                success: function(data) {

                    $('#maps').html(data);
                }
            })
        }
    });

    $(document).on('change', '.option_address', function() {
        //tab
        var tab_id = $('option:selected', this).attr('data-tab');
        var el = $("#" + tab_id);
        $('.tab-drug-store').removeClass('current');
        $("." + tab_id).addClass('current');

        let id_address_city = $(this).val();
        let urlRequest = window.location;

        urlRequest = urlRequest + '?' + 'id_address_city' + '=' + id_address_city;

        if (id_address_city != '') {
            $.ajax({
                url: urlRequest,
                method: "GET",

                success: function(data) {

                    $('#maps').html(data);
                }
            })
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\demola\resources\views/frontend/pages/he-thong-nha-thuoc.blade.php ENDPATH**/ ?>