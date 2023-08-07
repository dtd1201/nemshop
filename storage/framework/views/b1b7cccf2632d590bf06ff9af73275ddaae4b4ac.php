
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
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="card card-outline card-primary">
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
                                                        
                                                    </ul>

                                                    <div class="tab-content pl-3 pr-3">
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
                                                                                <input type="text" class="form-control resultSlug changeAlias1
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
                                                                            <label class="col-sm-2 control-label" for="">Thời gian</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control resultSlug changeAlias1
                                                                                <?php $__errorArgs = ['time_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="time_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('time_'.$langItem['value'])); ?>" name="time_<?php echo e($langItem['value']); ?>" placeholder="Nhập nội dung">
                                                                                <?php $__errorArgs = ['time_'.$langItem['value']];
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
                                                                            <label class="col-sm-2 control-label" for="">Địa điểm</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control
                                                                                <?php $__errorArgs = ['dia_diem_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dia_diem_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('dia_diem_'.$langItem['value'])); ?>" name="dia_diem_<?php echo e($langItem['value']); ?>" placeholder="Nhập địa điểm">
                                                                                <?php $__errorArgs = ['dia_diem_'.$langItem['value']];
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
                                                                            <label class="col-sm-2 control-label" for="">Mô tả công việc</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control tinymce_editor_init  <?php $__errorArgs = ['value_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="value_<?php echo e($langItem['value']); ?>" id="" rows="15"  placeholder="Nhập mô tả"><?php echo e(old('value_'.$langItem['value'])); ?></textarea>
                                                                                <?php $__errorArgs = ['value_'.$langItem['value']];
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
                                                                            <label class="col-sm-2 control-label" for="">Yêu cầu ứng viên</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control tinymce_editor_init  <?php $__errorArgs = ['description_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description_<?php echo e($langItem['value']); ?>" id="" rows="15"  placeholder="Nhập yêu cầu"><?php echo e(old('description_'.$langItem['value'])); ?></textarea>
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
                                                                            <label class="col-sm-2 control-label" for="">Quyền lợi ứng viên</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['content_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="content_<?php echo e($langItem['value']); ?>" id="" rows="15" value=""  placeholder="Nhập quyền lợi" >
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
                                                                                <?php $__errorArgs = ['tags'];
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
                                                                            <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control <?php $__errorArgs = ['title_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title_seo" value="<?php echo e(old('title_seo_'.$langItem['value'])); ?>" name="title_seo_<?php echo e($langItem['value']); ?>" placeholder="Nhập title seo">
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
                                                                                <textarea
                                                                                    class="form-control <?php $__errorArgs = ['description_seo_' . $langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                                    id="description_seo"
                                                                                    name="description_seo_<?php echo e($langItem['value']); ?>"
                                                                                    id="" rows="3" value=""
                                                                                    placeholder="Mô tả">
                                                                                    <?php echo e(old('description_seo_' . $langItem['value'])); ?>

                                                                                </textarea>
                                                                                
                                                                                <?php $__errorArgs = ['description_seo_' . $langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <div class="invalid-feedback d-block">
                                                                                        <?php echo e($message); ?></div>
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
unset($__errorArgs, $__bag); ?>" id="keyword_seo" value="<?php echo e(old('keyword_seo_'.$langItem['value'])); ?>" name="keyword_seo_<?php echo e($langItem['value']); ?>" placeholder="Nhập mô tả seo">
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
                                                                            <label class="col-sm-2 control-label" for="">Đường dẫn / Alias</label>
                                                                            <div class="col-sm-10">
                                                                                <div class="next-input--stylized">
                                                                                    <span class="next-input__add-on next-input__add-on--before" style="padding-right:0"><?php echo e($url); ?>/</span>
                                                                                    <input type="text" class="next-input next-input--invisible resultSlug changeAlias2
                                                                                    <?php $__errorArgs = ['slug_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('slug_'.$langItem['value'])); ?>" name="slug_<?php echo e($langItem['value']); ?>">
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
                                                                    </div>
                                                                </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                        <!-- END Tổng Quan -->

                                                        <!-- START Dữ Liệu -->
                                                        <!-- <div id="du_lieu" class="container tab-pane fade"><br>

                                                        </div> -->
                                                        <!-- END Dữ Liệu -->

                                                        <!-- START Hình Ảnh -->
                                                        
                                                        <!-- END Hình Ảnh -->

                                                        <!-- START Seo -->
                                                        
                                                        <!-- END Seo -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Cấu hình bài viết</h3>
                                                </div>
                                                <div class="card-body">
                                                
                                                    <div class="form-group wrap-permission">
                                                        <div style="border: 1px solid; padding: 5px;">
                                                            <label class="control-label" for="">Lựa chọn chuyên mục</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="item-permission mt-2 mb-2">
                                                                            <div class="form-check permission-title">
                                                                                <label class="form-check-label p-2">
                                                                                    <input type="checkbox" class="form-check-input check-parent" value="<?php echo e($item->id); ?>" name="category[]">
																					<?php echo e($item->name); ?>

                                                                                </label>
                                                                            </div>
                                                                            <?php if(count($item->childs)>0): ?>
                                                                            <div class="list-permission p-2 pl-4">
                                                                                <div class="row">
                                                                                    <?php $__currentLoopData = $item->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                        <div class="form-check">
                                                                                            <label class="form-check-label">
                                                                                            <input type="checkbox" class="form-check-input check-children" name="category[]" value="<?php echo e($itemChild->id); ?>"><?php echo e($itemChild->name); ?>

                                                                                            </label>
                                                                                        </div>
                                                                                        <?php if(count($itemChild->childs)>0): ?>
                                                                                        <div class="row">
                                                                                            <?php $__currentLoopData = $itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                                <div class="form-check pl-5">
                                                                                                    <label class="form-check-label">
                                                                                                    <input type="checkbox" class="form-check-input check-children" name="category[]" value="<?php echo e($itemChild2->id); ?>"
                                                                                                    ><?php echo e($itemChild2->name); ?>

                                                                                                    </label>
                                                                                                </div>
                                                                                                <?php if(count($itemChild2->childs)>0): ?>
                                                                                                <div class="row">
                                                                                                    <?php $__currentLoopData = $itemChild2->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                                        <div class="form-check pl-5" style="padding-left: 4rem!important;">
                                                                                                            <label class="form-check-label">
                                                                                                            <input type="checkbox" class="form-check-input check-children" name="category[]" value="<?php echo e($itemChild3->id); ?>"
                                                                                                            ><?php echo e($itemChild3->name); ?>

                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                </div>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </div>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </div>
                                                                            </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                            
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                    
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Số lượt xem ban đầu</label>
                                                        <input type="number" min="0" class="form-control  <?php $__errorArgs = ['view_start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('view_start')); ?>" name="view_start" placeholder="Nhập số view bắt đầu">
                                                        <?php $__errorArgs = ['view_start'];
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
                                                            <!-- Select avatar -->
                                                            <input type="hidden" name="avatar_path_select" id="avatar_path_select">
                                                            
                                                            <!--/ Select avatar -->
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
                                                        <img class="img-load border p-1 w-100" id="img_avatar_path" src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="control-label" for="">Số thứ tự</label>
                                                        <input type="number" min="0" class="form-control  <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('order')); ?>" name="order" placeholder="Nhập số thứ tự">
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
                                                    

                                                    <div class="form-group">
                                                        
                                                        <label for="">Tự đặt ngày đăng</label>
                                                        <input type="datetime-local" class="form-control  <?php $__errorArgs = ['created_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        is-invalid
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="created_at"  value="<?php echo e(old('created_at')); ?>">
                                                        <?php $__errorArgs = ['created_at'];
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
                                                    
                                                    
                                                    
                                                    <div class="form-group  mb-1">
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
                                                                    Tin nổi bật
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
                                                    

                                                    
                                                    
                                                     <div class="form-group">
                                                        <label class="control-label" for="">Trạng thái</label>
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
<script>
    // Lấy slug theo name
    $(document).ready(function() {
        $('.nameChangeSlug').on('input', function() {
            let name = $('.nameChangeSlug').val();
            let slug = createSlug(name);
            $('.resultSlug').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias1').on('input', function() {
            let name = $('.changeAlias1').val();
            let slug = createSlug(name);
            $('.resultSlug').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias2').on('input', function() {
            let name = $('.changeAlias2').val();
            let slug = createSlug(name);
            $('.resultSlug').val(slug);
        });
    });

    function createSlug(name) {
        return name
            // Loại bỏ khoảng trắng đầu và cuối chuỗi
            .trim()
            .toLowerCase()
            // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
            .replace(/^-+|-+$/g, '')
            //Đổi ký tự có dấu thành không dấu
            .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
            .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
            .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
            .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
            .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
            .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
            .replace(/đ/gi, 'd')
            //Xóa các ký tự đặt biệt
            .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
            //Đổi khoảng trắng thành ký tự gạch ngang
            .replace(/ /gi, "-")
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            .replace(/\-\-\-\-\-/gi, '-')
            .replace(/\-\-\-\-/gi, '-')
            .replace(/\-\-\-/gi, '-')
            .replace(/\-\-/gi, '-');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\demola\resources\views/admin/pages/post/add.blade.php ENDPATH**/ ?>