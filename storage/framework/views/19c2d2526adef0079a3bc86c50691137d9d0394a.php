<?php $__env->startSection('title',"Thêm bài viết"); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Bài viết","key"=>"Thêm bài viết"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main content -->
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(session("alert")): ?>
                        <div class="alert alert-success">
                            <?php echo e(session("alert")); ?>

                        </div>
                        <?php elseif(session('error')): ?>
                        <div class="alert alert-warning">
                            <?php echo e(session("error")); ?>

                        </div>
                        <?php endif; ?>
                        <form class="form-horizontal" action="<?php echo e(route('admin.post.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-header">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card-tool p-3 text-right">
                                                    <button type="submit" class="btn btn-primary btn-lg">Chấp nhận</button>
                                                    <button type="reset" class="btn btn-danger btn-lg">Làm lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin bài viết</h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng quan</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                            </li> -->
                                            <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <!-- START Tổng Quan -->
                                            <div id="tong_quan" class="container tab-pane active "><br>

                                                <ul class="nav nav-tabs">
                                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e($langItem['value']==$langDefault?'active':''); ?>" data-toggle="tab" href="#tong_quan_<?php echo e($langItem['value']); ?>"><?php echo e($langItem['name']); ?></a>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </ul>
                                                <div class="tab-content">
                                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div id="tong_quan_<?php echo e($langItem['value']); ?>" class="container wrapChangeSlug tab-pane <?php echo e($langItem['value']==$langDefault?'active show':''); ?> fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Tên bài viết</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control nameChangeSlug
                                                                    <?php $__errorArgs = ['name_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('name_'.$langItem['value'])); ?>" name="name_<?php echo e($langItem['value']); ?>" placeholder="Nhập tên tin tức">
                                                                    <?php $__errorArgs = ['name_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Slug</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control resultSlug
                                                                    <?php $__errorArgs = ['slug_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('slug_'.$langItem['value'])); ?>" name="slug_<?php echo e($langItem['value']); ?>" placeholder="Nhập slug">
                                                                    <?php $__errorArgs = ['slug_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập giới thiệu</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control  <?php $__errorArgs = ['description_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description_<?php echo e($langItem['value']); ?>" id="" rows="3"  placeholder="Nhập giới thiệu"><?php echo e(old('description_'.$langItem['value'])); ?></textarea>
                                                                    <?php $__errorArgs = ['description_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập nội dung</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['content_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="content_<?php echo e($langItem['value']); ?>" id="" rows="20" value=""  placeholder="Nhập nội dung" >
                                                                    <?php echo e(old('content_'.$langItem['value'])); ?>

                                                                    </textarea>
                                                                    <?php $__errorArgs = ['content_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Chọn danh mục</label>
                                                        <div class="col-sm-10">

                                                            <select class="form-control custom-select select-2-init <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                is-invalid
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" value="<?php echo e(old('category_id')); ?>" name="category_id">

                                                                <option value="0">--- Chọn danh mục cha ---</option>

                                                                <?php if(old('category_id')): ?>
                                                                    <?php echo \App\Models\CategoryPost::getHtmlOption(old('category_id')); ?>

                                                                <?php else: ?>
                                                                <?php echo $option; ?>

                                                                <?php endif; ?>
                                                            </select>
                                                            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Số thứ tự</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" min="0" class="form-control  <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('order')); ?>" name="order" placeholder="Nhập số thứ tự">
                                                        </div>
                                                        <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Tin nổi bật</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input <?php $__errorArgs = ['hot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        is-invalid
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" name="hot" <?php if(old('hot')==="1" ): ?> <?php echo e('checked'); ?> <?php endif; ?>>
                                                                </label>
                                                            </div>
                                                            <?php $__errorArgs = ['hot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Trạng thái</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="1" name="active" <?php if(old('active')==='1' ||old('active')===null): ?> <?php echo e('checked'); ?> <?php endif; ?>>Hiện
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" value="0" <?php if(old('active')==="0" ): ?><?php echo e('checked'); ?> <?php endif; ?> name="active">Ẩn
                                                                </label>
                                                            </div>
                                                            <?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Tổng Quan -->

                                            <!-- START Dữ Liệu -->
                                            <!-- <div id="du_lieu" class="container tab-pane fade"><br>

                                            </div> -->
                                            <!-- END Dữ Liệu -->

                                            <!-- START Hình Ảnh -->
                                            <div id="hinh_anh" class="container tab-pane fade"><br>
                                                <div class="wrap-load-image mb-3">
                                                    <div class="form-group">
                                                        <label for="">Ảnh đại diện</label>
                                                        <input type="file" class="form-control-file img-load-input border <?php $__errorArgs = ['avatar_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        is-invalid
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="avatar_path">
                                                        <?php $__errorArgs = ['avatar_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <img class="img-load border p-1 w-100" src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                </div>
                                            </div>
                                            <!-- END Hình Ảnh -->

                                            <!-- START Seo -->
                                            <div id="seo" class="container tab-pane fade"><br>
                                                <ul class="nav nav-tabs">
                                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e($langItem['value']==$langDefault?'active':''); ?>" data-toggle="tab" href="#seo_<?php echo e($langItem['value']); ?>"><?php echo e($langItem['name']); ?></a>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <div class="tab-content">
                                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div id="seo_<?php echo e($langItem['value']); ?>" class="container tab-pane <?php echo e($langItem['value']==$langDefault?'active show':''); ?> fade">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control <?php $__errorArgs = ['title_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" value="<?php echo e(old('title_seo_'.$langItem['value'])); ?>" name="title_seo_<?php echo e($langItem['value']); ?>" placeholder="Nhập title seo">
                                                                        <?php $__errorArgs = ['title_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control <?php $__errorArgs = ['description_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" value="<?php echo e(old('description_seo_'.$langItem['value'])); ?>" name="description_seo_<?php echo e($langItem['value']); ?>" placeholder="Nhập mô tả seo">
                                                                        <?php $__errorArgs = ['description_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control <?php $__errorArgs = ['keyword_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" value="<?php echo e(old('keyword_seo_'.$langItem['value'])); ?>" name="keyword_seo_<?php echo e($langItem['value']); ?>" placeholder="Nhập mô tả seo">
                                                                        <?php $__errorArgs = ['keyword_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập tags</label>
                                                                    <div class="col-sm-10">
                                                                        
                                                                        <select class="form-control tag-select-choose w-100" multiple="multiple" name="tags_<?php echo e($langItem['value']); ?>[]">
                                                                            <?php if(old('tags_'.$langItem['value'])): ?>
                                                                                <?php $__currentLoopData = old('tags_'.$langItem['value']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($tag); ?>" selected><?php echo e($tag); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>
                                                                        </select>
                                                                        <?php $__errorArgs = ['title_seo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <!-- END Seo -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                        <h3 class="card-title w-100">Thêm đoạn văn   <a data-url="<?php echo e(route('admin.post.loadParagraphPost')); ?>" class="btn  btn-info btn-md float-right " id="addParagraph">+ Thêm đoạn văn</a></h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="wrap-paragraph">
                                                <table class="table table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th style="width:calc(100% - 50px);">Nhập thông tin đoạn văn</th>
                                                            <th style="width:50px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if(old('typeParagraph')&&old('typeParagraph')): ?>
                                                            <?php $__currentLoopData = old('typeParagraph'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="paragraph">
                                                                <td class="" style="width:calc(100% - 50px);">
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <ul class="nav nav-tabs">
                                                                                <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link <?php echo e($langItem['value']==$langDefault?'active':''); ?>" data-toggle="tab" href="#thong_tin_paragraph_<?php echo e($key.$langItem['value']); ?>"><?php echo e($langItem['name']); ?></a>
                                                                                </li>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div id="thong_tin_paragraph_<?php echo e($key.$langItem['value']); ?>" class="container tab-pane <?php echo e($langItem['value']==$langDefault?'active show':''); ?> fade">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 control-label" for="">Tên đoạn</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text" class="form-control <?php $__errorArgs = ['nameParagraph_'.$langItem['value'].'.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('nameParagraph_'.$langItem['value'])[$key]); ?>" name="nameParagraph_<?php echo e($langItem['value']); ?>[]" placeholder="Nhập tên" required>
                                                                                                <?php $__errorArgs = ['nameParagraph_'.$langItem['value'].'.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                  <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 control-label" for="">Nhập nội dung đoạn</label>
                                                                                            <div class="col-sm-10">
                                                                                                <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['valueParagraph_'.$langItem['value'].'.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="valueParagraph_<?php echo e($langItem['value']); ?>[]" id="" rows="15" value=""  placeholder="Nhập nội dung đoạn văn" ><?php echo e(old('valueParagraph_'.$langItem['value'])[$key]); ?></textarea>
                                                                                                <?php $__errorArgs = ['valueParagraph_'.$langItem['value'].'.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                     <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="wrap-load-image mb-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Ảnh đại diện</label>
                                                                                    <input type="file" class="form-control-file img-load-input border" id="" name="image_path_paragraph[]">
                                                                                </div>
                                                                                <img class="img-load border p-1 w-100" src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>" style="height: 150px;object-fit:cover; max-width: 200px;">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label" for="">Chọn kiểu</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control" id="" value="" name="typeParagraph[]" required>
                                                                                            <option value="">--- Chọn kiểu đoạn ---</option>
                                                                                            <?php $__currentLoopData = config('paragraph.posts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyC=> $valueC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                 <option value="<?php echo e($keyC); ?>" <?php echo e(old('typeParagraph')[$key]==$keyC?"selected":""); ?>> <?php echo e($valueC); ?> </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                        <?php $__errorArgs = ['typeParagraph.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label" for="">Số thứ tự</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="number" min="0" class="form-control"  value="<?php echo e(old('orderParagraph')[$key]); ?>" name="orderParagraph[]" placeholder="Nhập số thứ tự">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label" for="">Trạng thái</label>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                            <input type="checkbox" class="form-check-input checkParagraph" value="1" name="activeParagraph[]" <?php echo e(old('activeParagraph')[$key]==1?"checked":""); ?>>Hiện
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                                <input type="checkbox" class="form-check-input checkParagraph" value="0" name="activeParagraph[]" <?php echo e(old('activeParagraph')[$key]==0?"checked":""); ?>>Ẩn
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td style="width:50px;">
                                                                    <a  class="btn btn-sm btn-danger deleteParagraph"><i class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       <?php else: ?>
                                                        
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/admin/pages/post/add.blade.php ENDPATH**/ ?>