
<?php $__env->startSection('title',"Sửa bài viêt"); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper lb_template_post_edit">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Bài viết","key"=>"Sửa bài viết"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <form class="form-horizontal" action="<?php echo e(route('admin.post.update',['id'=>$data->id])); ?>" method="POST" enctype="multipart/form-data">
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
                                                <button type="submit" class="btn btn-primary btn-lg">Lưu bài viết</button>
                                                <button type="reset" class="btn btn-danger btn-lg">Nhập lại bài viết</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <div class="tab-content">
                                            <!-- START Tổng Quan -->
                                            <div id="tong_quan" class="container tab-pane active"><br>

                                                <ul class="nav nav-tabs">
                                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e($langItem['value']==$langDefault?'active':''); ?>" data-toggle="tab" href="#tong_quan_<?php echo e($langItem['value']); ?>"><?php echo e($langItem['name']); ?></a>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </ul>
                                                <div class="tab-content">
                                                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div id="tong_quan_<?php echo e($langItem['value']); ?>" class="container tab-pane <?php echo e($langItem['value']==$langDefault?'active show':''); ?> fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Tên bài viết</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control nameChange
                                                                    <?php $__errorArgs = ['name_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nameChange" value="<?php echo e(old('name_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->name); ?>" name="name_<?php echo e($langItem['value']); ?>" placeholder="Nhập tên bài viết">
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
                                                                    <input type="text" class="form-control resultSlug1 changeAlias1
                                                                    <?php $__errorArgs = ['slug_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('slug_'.$langItem['value'])??optional($data->key($langItem['value'])->first())->slug); ?>" name="slug_<?php echo e($langItem['value']); ?>" placeholder="Nhập slug">
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
                                                                    <input type="text" class="form-control 
                                                                    <?php $__errorArgs = ['time_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="time_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('time_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->time); ?>" name="time_<?php echo e($langItem['value']); ?>" placeholder="Nhập nội dung">
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
unset($__errorArgs, $__bag); ?>" id="dia_diem_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('dia_diem_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->dia_diem); ?>" name="dia_diem_<?php echo e($langItem['value']); ?>" placeholder="Nhập địa điểm">
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
                                                                <label class="col-sm-2 control-label" for="">Thu nhập</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control  
                                                                    <?php $__errorArgs = ['range_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="range_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('range_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->range); ?>" name="range_<?php echo e($langItem['value']); ?>" placeholder="Nhập khoảng thu nhập">
                                                                    <?php $__errorArgs = ['range_'.$langItem['value']];
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
                                                                    <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['value_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="value_<?php echo e($langItem['value']); ?>" id="" rows="3"  placeholder="Nhập mô tả"><?php echo e(old('value_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->value); ?></textarea>
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
                                                                    <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['description_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description_<?php echo e($langItem['value']); ?>" id="" rows="3"  placeholder="Nhập yêu cầu"><?php echo e(old('description_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description); ?></textarea>
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
unset($__errorArgs, $__bag); ?>" name="content_<?php echo e($langItem['value']); ?>" id="" rows="15" value="" placeholder="Nhập quyền lợi">
                                                                    <?php echo e(old('content_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content); ?>

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
                                                                        <?php else: ?>
                                                                        <?php $__currentLoopData = $data->tagsLanguage($langItem['value'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($tagItem->name); ?>" selected><?php echo e($tagItem->name); ?></option>
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
                                                        <div class="card card-outline card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Xem trước kết quả tìm kiếm</h3>
                                                                <button class="ui-button ui-button--link" type="button" name="button">Tùy chỉnh SEO</button>
                                                            </div>
                                                            <div class="card-body table-responsive p-3">
                                                                <div class="card-header">
                                                                    <div class="google-preview" bind-show="shouldShowGooglePreview()">
                                                                        <span class="google__title ">
                                                                            <input type="text" class="resultTitle" value="<?php echo e(optional($data->translationsLanguage($langItem['value'])->first())->title_seo); ?>" readonly>
                                                                        </span>
                                                                        <div class="google__url">
                                                                            <?php echo e($url); ?>/<input type="text" class="resultUrl" value="<?php echo e(optional($data->translationsLanguage($langItem['value'])->first())->slug); ?>" readonly>
                                                                            
                                                                        </div>
                                                                        <div class="google__description resultDescription" id="resultDescription"><?php echo e(optional($data->translationsLanguage($langItem['value'])->first())->description_seo); ?>

                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-header form-input hidden">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control changeTitle
                                                                                <?php $__errorArgs = ['title_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title_seo" value="<?php echo e(old('title_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->title_seo); ?>" name="title_seo_<?php echo e($langItem['value']); ?>" placeholder="Nhập title seo">
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
                                                                                    class="form-control changeDescription
                                                                                    <?php $__errorArgs = ['description_seo_' . $langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                                    name="description_seo_<?php echo e($langItem['value']); ?>"
                                                                                    id="changeDescription" rows="3" value=""
                                                                                    ><?php echo e(old('description_seo_' . $langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description_seo); ?></textarea>
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
                                                                                <input type="text" class="form-control resultKeyword
                                                                                <?php $__errorArgs = ['keyword_seo_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="keyword_seo" value="<?php echo e(old('keyword_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo); ?>" name="keyword_seo_<?php echo e($langItem['value']); ?>" placeholder="Nhập mô tả seo">
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
                                                                                    <input type="text" class="next-input next-input--invisible resultSlug2 changeAlias2
                                                                                    <?php $__errorArgs = ['slug_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug); ?>" name="slug_<?php echo e($langItem['value']); ?>">
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
                                     <div class="card-body table-responsive">                                        
                                        <div class="form-group wrap-permission">
                                            <div style="border: 1px solid; padding: 5px;">
                                                <label class="control-label" for="">Lựa chọn chuyên mục</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                            <?php $__currentLoopData = $data_ed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="item-permission mt-2 mb-2">
                                                                <div class="form-check permission-title">
                                                                    <label class="form-check-label p-2">
                                                                        <input type="checkbox" class="form-check-input check-children" value="<?php echo e($item->id); ?>" name="category[]"
                                                                        <?php if($categoryPostOfAdmin->contains($item->id)): ?>
                                                                        <?php echo e('checked'); ?>

                                                                        <?php endif; ?>
                                                                        ><?php echo e($item->name); ?>

                                                                    </label>
                                                                </div>
                                                                <?php if(count($item->childs)>0): ?>
                                                                <div class="list-permission p-2 pl-4">
                                                                    <div class="row">
                                                                        <?php $__currentLoopData = $item->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                <input type="checkbox" class="form-check-input check-children" name="category[]" value="<?php echo e($itemChild->id); ?>"
                                                                                <?php if($categoryPostOfAdmin->contains($itemChild->id)): ?>
                                                                                    <?php echo e('checked'); ?>

                                                                                <?php endif; ?>
                                                                                ><?php echo e($itemChild->name); ?>

                                                                                </label>
                                                                            </div>
                                                                            <?php if(count($itemChild->childs)>0): ?>
                                                                            <div class="row">
                                                                                <?php $__currentLoopData = $itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                    <div class="form-check pl-5">
                                                                                        <label class="form-check-label">
                                                                                        <input type="checkbox" class="form-check-input check-children" name="category[]" value="<?php echo e($itemChild2->id); ?>"
                                                                                        <?php if($categoryPostOfAdmin->contains($itemChild2->id)): ?>
                                                                                        <?php echo e('checked'); ?>

                                                                                        <?php endif; ?>
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
                                                                                                <?php if($categoryPostOfAdmin->contains($itemChild3->id)): ?>
                                                                                                <?php echo e('checked'); ?>

                                                                                                <?php endif; ?>
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
                                            
                                            <div style="display: none;">
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
                                                <?php if(old('category_id')||old('category_id')==='0'): ?>
                                                    <?php echo \App\Models\CategoryPost::getHtmlOption(old('category_id')); ?>

                                                <?php else: ?>
                                                <?php echo $option; ?>

                                                
                                                <?php endif; ?>
                                            </select>
                                            </div>
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
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="">Số lượt xem ban đầu</label>
                                            <input type="number" min="0" class="form-control  <?php $__errorArgs = ['view_start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('view_start')??$data->view_start); ?>" name="view_start" placeholder="Nhập số view bắt đầu">
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
                                                <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                                <input type="hidden" name="avatar_path_select" id="avatar_path_select">
                                                
                                            </div>
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
                                            <?php if($data->avatar_path): ?>
                                            <img class="img-load border p-1 w-100" id="img_avatar_path" src="<?php echo e($data->avatar_path); ?>" alt="<?php echo e($data->name); ?>" style="height: 200px;object-fit:cover; max-width: 260px;">
                                            <?php endif; ?>
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
unset($__errorArgs, $__bag); ?>" id="" name="created_at"  value="<?php echo e(old('created_at')?? date_format($data->created_at,"Y-m-d\TH:i")); ?>" >
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
                                        
                                        
                                        <div class="form-group mb-1">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input <?php $__errorArgs = ['hot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" name="hot" <?php if(old('hot')==="1"||$data->hot==1 ): ?> <?php echo e('checked'); ?> <?php endif; ?>>
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
                                            <label class="control-label" for="">Số thứ tự</label>
                                            <input type="number" min="0" class="form-control  <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('order')??$data->order); ?>" name="order" placeholder="Nhập số thứ tự">
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
                                            <label class=" control-label" for="">Trạng thái</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="1" name="active" <?php if(old('active')==='1' || $data->active==1): ?> <?php echo e('checked'); ?> <?php endif; ?>>Hiện
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="0" <?php if(old('active')==="0" || $data->active==0): ?><?php echo e('checked'); ?> <?php endif; ?> name="active">Ẩn
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
                           <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                    <h3 class="card-title w-100">Mục lục đã thêm <a data-url="<?php echo e(route('admin.post.loadCreateParagraphPost',['id'=>$data->id])); ?>" class="btn  btn-info btn-md float-right " id="addParagraphAjax">+ Thêm mục lục</a></h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
                                        <div id="loadListParagraph">
                                            <?php echo $__env->make('admin.components.paragraph.load-list-paragraph',[
                                                'type'=>config('paragraph.posts'),
                                                'data'=>$data,
                                                'routeDelete'=>'admin.post.destroyParagraphPost',
                                                'routeEdit'=>'admin.post.loadEditParagraphPost',
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>


<div class="modal fade in" id="loadAjaxParent">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mục lục</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="content p-3" id="loadContent">
            
         </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    function Clone() {
        var menu = document.querySelector('.modal');
        document.querySelectorAll(".clickBoxup").forEach((element) => {
            element.addEventListener("click", () => {

                menu.classList.remove('showbopuppro');

            })
        });

    }
    Clone();
</script>
<script>
    $(document).on('click', '.ui-button', function() {
            // let id = $(this).data('id');
            $('.form-input').removeClass('hidden');
            $('.ui-button').addClass('hidden');
    });
    $(document).ready(function() {
        $('.nameChange').on('input', function() {
            let name = $('.nameChange').val();
            let name_change = document.getElementById("nameChange");
            let div = document.getElementById("resultDescription");
            div.innerHTML = name_change.value;
            $('.changeTitle').val(name);
            $('.resultTitle').val(name);
            $('.changeDescription').val(name);
            $('.resultKeyword').val(name);
            
        });
    });
    $(document).ready(function() {
        $('.changeAlias1').on('input', function() {
            let name = $('.changeAlias1').val();
            let slug = createSlug(name);
            $('.resultSlug2').val(slug);
            $('.resultUrl').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias2').on('input', function() {
            let name = $('.changeAlias2').val();
            let slug = createSlug(name);
            $('.resultSlug1').val(slug);
            $('.resultUrl').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeTitle').on('input', function() {
            let name = $('.changeTitle').val();
            // let slug = createSlug(name);
            $('.resultTitle').val(name);
        });
    });
    $(document).ready(function() {
        $('.changeDescription').on('change', function() {
            let name = document.getElementById("changeDescription");
            let div = document.getElementById("resultDescription");
            //alert(name.value);
            // let slug = createSlug(name);
            //$('.resultDescription').val(name.value);
            div.innerHTML = name.value;
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\demola\resources\views/admin/pages/post/edit.blade.php ENDPATH**/ ?>