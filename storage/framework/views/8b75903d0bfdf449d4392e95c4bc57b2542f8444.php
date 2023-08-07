<?php $__env->startSection('title',"Sửa sản phẩm"); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
	.card-body .form-group {
		margin-bottom: 5px;
	}
</style>
<div class="content-wrapper lb_template_product_edit">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Sản phẩm","key"=>"Sửa sản phẩm"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    
                    <form class="form-horizontal" action="<?php echo e(route('admin.product.update',['id'=>$data->id])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
                        <div class="row">

                            <div class="col-md-8">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                       <h3 class="card-title">Thông tin sản phẩm</h3>
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
                                              <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh liên quan</a>
                                            </li>
                                            
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
                                                                <label class="col-sm-2 control-label" for="">Tên sản phẩm</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control nameChange
                                                                    <?php $__errorArgs = ['name_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nameChange" value="<?php echo e(old('name_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->name); ?>" name="name_<?php echo e($langItem['value']); ?>" placeholder="Nhập tên sản phẩm">
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
unset($__errorArgs, $__bag); ?>" id="slug_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug); ?>" name="slug_<?php echo e($langItem['value']); ?>" placeholder="Nhập slug">
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
                                                                <label class="col-sm-2 control-label" for="">Link Shopee</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    <?php $__errorArgs = ['link1_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="link1_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('link1_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link1); ?>" name="link1_<?php echo e($langItem['value']); ?>" placeholder="Nhập link">
                                                                    <?php $__errorArgs = ['link1_'.$langItem['value']];
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
                                                                <label class="col-sm-2 control-label" for="">Link Lazada</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    <?php $__errorArgs = ['link2_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="link2_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('link2_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link2); ?>" name="link2_<?php echo e($langItem['value']); ?>" placeholder="Nhập link">
                                                                    <?php $__errorArgs = ['link2_'.$langItem['value']];
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
                                                                <label class="col-sm-2 control-label" for="">Link Tiki</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    <?php $__errorArgs = ['link3_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="link3_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('link3_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link3); ?>" name="link3_<?php echo e($langItem['value']); ?>" placeholder="Nhập link">
                                                                    <?php $__errorArgs = ['link3_'.$langItem['value']];
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
                                                                <label class="col-sm-2 control-label" for="">Link Tiktok</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    <?php $__errorArgs = ['link4_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="link4_<?php echo e($langItem['value']); ?>" value="<?php echo e(old('link4_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link4); ?>" name="link4_<?php echo e($langItem['value']); ?>" placeholder="Nhập link">
                                                                    <?php $__errorArgs = ['link4_'.$langItem['value']];
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
                                                                    <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['description_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description_<?php echo e($langItem['value']); ?>" id="" rows="3"  placeholder="Nhập giới thiệu"><?php echo e(old('description_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description); ?></textarea>
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
                                                                <label class="col-sm-2 control-label" for="">Nhập mô tả sản phẩm</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['content_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="content_<?php echo e($langItem['value']); ?>" id="" rows="20" value="" placeholder="Nhập mô tả sản phẩm">
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
                                            <div id="hinh_anh" class="container tab-pane fade"><br>

                                            


                                                <div class="wrap-load-image mb-3">
                                                    <label class="mb-3 w-100">Hình ảnh khác</label>

                                                    <span class="badge badge-success">Đã thêm</span>
                                                    <div class="list-image d-flex flex-wrap">
                                                        <?php $__currentLoopData = $data->images()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImageItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             <div class="col-image" style="width:20%;" >
                                                                <img class="" src="<?php echo e($productImageItem->image_path); ?>" alt="<?php echo e($productImageItem->name); ?>">
                                                                <a class="btn btn-sm btn-danger lb_delete_image"  data-url="<?php echo e(route('admin.product.destroy-image',['id'=>$productImageItem->id])); ?>"><i class="far fa-trash-alt"></i></a>
                                                             </div>
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         <?php if(!$data->images()->get()->count()): ?>
                                                            Chưa thêm hình ảnh nào
                                                         <?php endif; ?>
                                                    </div>
                                                    <hr>
                                                    <span class="badge badge-primary mb-3">Thêm ảnh</span>
                                                    <div class="form-group">
                                                        
                                                        <input type="file" class="form-control-file img-load-input-multiple border" id="" name="image[]" multiple>
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
                                                    <div class="load-multiple-img">
                                                        <?php if(!$data->images()->get()->count()): ?>
                                                        <img class="" src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>" alt="'no image">
                                                        <img class="" src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>" alt="'no image">
                                                        <img class="" src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>" alt="'no image">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                            </div>
                                            <!-- END Hình Ảnh -->

                                            <!-- START Seo -->
                                            
                                            <!-- END Seo -->
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Câu hỏi thường gặp</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                                <?php
                                                    $_selected = $data->questions->pluck('id')->toArray();
                                                ?>
                                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="form-group">
                                                <label class="control-label" for=""><?php echo e($question->name); ?></label>
                                                <select class="form-control tag-select-choose-question"  name="question[]" multiple>
                                                    <option value="0">--Chọn câu hỏi --</option>
                                                    <?php $__currentLoopData = $question->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ques->id); ?>"
                                                            <?php if(in_array($ques->id,$_selected)): ?> selected <?php endif; ?>
                                                        >
                                                            <?php echo e($ques->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['question.'.$key];
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                        <h3 class="card-title w-100">Đoạn văn đã thêm <a data-url="<?php echo e(route('admin.product.loadCreateParagraphProduct',['id'=>$data->id])); ?>" class="btn  btn-info btn-md float-right " id="addParagraphAjax">+ Thêm đoạn văn</a></h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div id="loadListParagraph">
                                                <?php echo $__env->make('admin.components.paragraph.load-list-paragraph',[
                                                    'type'=>config('paragraph.products'),
                                                    'data'=>$data,
                                                    'routeDelete'=>'admin.product.destroyParagraphProduct',
                                                    'routeEdit'=>'admin.product.loadEditParagraphProduct',
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin khác</h3>
                                     </div>
                                     <div class="card-body table-responsive p-3">
                                        <div class="form-group">
                                            <label class="control-label" for="">Nhập mã sản phẩm</label>
                                            <input type="text" min="0" class="form-control  <?php $__errorArgs = ['masp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('masp')??$data->masp); ?>" name="masp" placeholder="Nhập mã sản phẩm">
                                            <?php $__errorArgs = ['masp'];
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
                                        
                                        <div class="form-group wrap-permission">
                                            <div style="border: 1px solid; padding: 5px;">
                                                <label class="control-label" for="">Lựa chọn chuyên mục</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                            <?php $__currentLoopData = $data_cate_ed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="item-permission mt-2 mb-2">
                                                                <div class="form-check permission-title">
                                                                    <label class="form-check-label p-2">
                                                                        <input type="checkbox" class="form-check-input check-children" value="<?php echo e($item->id); ?>" name="category[]"
                                                                        <?php if($categoryProductOfAdmin->contains($item->id)): ?>
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
                                                                            <?php if($categoryProductOfAdmin->contains($itemChild->id)): ?>
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
                                                                                    <?php if($categoryProductOfAdmin->contains($itemChild2->id)): ?>
                                                                                    <?php echo e('checked'); ?>

                                                                                    <?php endif; ?>
                                                                                    ><?php echo e($itemChild2->name); ?>

                                                                                    </label>
                                                                                </div>
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
                                        <div class="wrap-load-image mb-3">
                                            <div class="form-group">
                                                <label for="">Ảnh đại diện</label>
                                                <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
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
                                            <img class="img-load border p-1 w-100" src="<?php echo e($data->avatar_path); ?>" alt="<?php echo e($data->name); ?>" style="height: 200px;object-fit:cover; max-width: 260px;">
                                            <?php endif; ?>
                                        </div>

                                          <div class="form-group">
                                            <label class="control-label" for="">Chọn nhà dược sĩ</label>
                                            <select class="form-control <?php $__errorArgs = ['supplier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                is-invalid
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" value="<?php echo e(old('supplier_id')); ?>" name="supplier_id">

                                                <option value="0">--- Chọn nhà dược sĩ ---</option>
                                                <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>" <?php echo e((old('supplier')??$data->supplier_id)==  $item->id ?"selected":""); ?>><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['supplier_id'];
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
                                            <label class="control-label" for="">Chọn trạng thái được hiển thị</label>
                                            <select class="form-control <?php $__errorArgs = ['supplier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                is-invalid
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" value="<?php echo e(old('option_status')); ?>" name="option_status">

                                                <option value="0">--- Chọn trạng thái ---</option>

                                                <option value="1" <?php echo e((old('option_status')??$data->option_status)==  1 ?"selected":""); ?>>Bán chạy</option>
                                                <option value="2" <?php echo e((old('option_status')??$data->option_status)==  2 ?"selected":""); ?>>Freeship</option>
                                                <option value="3" <?php echo e((old('option_status')??$data->option_status)==  3 ?"selected":""); ?>>Yêu thích</option>
                                                <option value="4" <?php echo e((old('option_status')??$data->option_status)==  4 ?"selected":""); ?>>Giảm sốc</option>
                                            </select>
                                            <?php $__errorArgs = ['supplier_id'];
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
                                            <label class="control-label" for="">Sản phẩm bán chạy</label>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input <?php $__errorArgs = ['sp_ngoc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" name="hot" <?php if(old('hot')==="1"||$data->hot==1 ): ?> <?php echo e('checked'); ?> <?php endif; ?>>
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
                                            <label class="control-label" for="">Sản phẩm sale</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input <?php $__errorArgs = ['sp_km'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" name="sp_km" <?php if(old('sp_km')==="1"||$data->sp_km==1 ): ?> <?php echo e('checked'); ?> <?php endif; ?>>
                                                </label>
                                            </div>
                                            <?php $__errorArgs = ['sp_km'];
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

                                        <hr>
                                        <div class="alert alert-light  mt-3 mb-1">
                                            <strong>Chọn thuộc tính</strong>
                                          </div>

                                         <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="form-group">
                                                <label class="control-label" for=""><?php echo e($attribute->name); ?></label>
                                                <select class="form-control"  name="attribute[]" >
                                                    <option value="0">--Chọn--</option>
                                                    <?php $__currentLoopData = $attribute->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($attr->id); ?>"
                                                            <?php if(old('attribute')): ?>
                                                                <?php if($attr->id==old('attribute')[$key]): ?>
                                                                    selected
                                                                <?php else: ?>
                                                                    <?php echo e($data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':""); ?>

                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                            <?php echo e($data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':""); ?>

                                                            <?php endif; ?>
                                                        >
                                                            <?php echo e($attr->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['attribute.'.$key];
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
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <hr>
                                        
                                     </div>
                                </div>
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Nhập giá sản phẩm</h3>
                                    </div>
                                     <div class="card-body table-responsive p-3">
                                            <div class="item-price-default">
                                                
                                                <div class="form-group">
                                                    <label class="control-label" for="">Giá</label>
                                                    <input type="number" min="0" class="form-control  <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('price')??$data->price); ?>" name="price" placeholder="Nhập giá">
                                                    <?php $__errorArgs = ['price'];
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
                                                    <label class="control-label" for="">Giá cũ</label>
                                                    <input type="number" min="0" class="form-control  <?php $__errorArgs = ['old_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('old_price')??$data->old_price); ?>" name="old_price" placeholder="Nhập giá cũ">
                                                    <?php $__errorArgs = ['old_price'];
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
                                                    <label class="control-label" for="">Đơn vị</label>
                                                    <input type="text" min="0" class="form-control  <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('size')??$data->size); ?>" name="size" placeholder="Nhập đơn vị">
                                                    <?php $__errorArgs = ['size'];
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
                                            
                                            <div class="list-item-option wrap-option mt-3">
                                                <h5>Các loại sản phẩm</h5>
                                                <?php $__currentLoopData = $data->options()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item-price">
                                                    <div class="box-content-price">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Nhập đơn vị</label>
                                                            <input type="text" min="0" class="form-control  <?php $__errorArgs = ['sizeOptionOld.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('sizeOptionOld')[$key]??$item->size); ?>" name="sizeOptionOld[]" placeholder="Nhập đơn vị">
                                                            <?php $__errorArgs = ['sizeOptionOld.'.$key];
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
                                                            <label class="control-label" for="">Giá</label>
                                                            <input type="hidden" name="idOption[]" value="<?php echo e($item->id); ?>">
                                                            <input type="number" min="0" class="form-control  <?php $__errorArgs = ['priceOptionOld.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('priceOptionOld')[$key]??$item->price); ?>" name="priceOptionOld[]" placeholder="Nhập giá">
                                                            <?php $__errorArgs = ['priceOptionOld.'.$key];
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
                                                            <label class="control-label" for="">Giá cũ</label>
                                                            <input type="number" min="0" class="form-control  <?php $__errorArgs = ['old_priceOptionOld.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('old_priceOptionOld')[$key]??$item->old_price); ?>" name="old_priceOptionOld[]" placeholder="Nhập giá cũ">
                                                            <?php $__errorArgs = ['old_priceOptionOld.'.$key];
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
                                                    <div class="action">
                                                        <a  class="btn btn-sm btn-danger deleteOptionProductDB" data-url="<?php echo e(route('admin.product.destroyOptionProduct',['id'=>$item->id])); ?>"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            
                                            <div class="">Thêm loại mới  <a data-url="<?php echo e(route('admin.product.loadOptionProduct')); ?>" class="btn  btn-info btn-md float-right " id="addOptionProduct">+ Thêm loại</a></div>
                                            <div class="list-item-option wrap-option mt-3" id="wrapOption">
                                                <?php if(old('priceOption')&&old('priceOption')): ?>
                                                    <?php $__currentLoopData = old('priceOption'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="item-price">
                                                        <div class="box-content-price">

                                                            <div class="form-group">
                                                                <label class="control-label" for="">Nhập đơn vị</label>
                                                                <input type="text" min="0" class="form-control  <?php $__errorArgs = ['sizeOption.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('sizeOption')[$key]); ?>" name="sizeOption[]" placeholder="Nhập đơn vị">
                                                                <?php $__errorArgs = ['sizeOption.'.$key];
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
                                                                <label class="control-label" for="">Giá</label>
                                                                <input type="number" min="0" class="form-control  <?php $__errorArgs = ['priceOption.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e($value); ?>" name="priceOption[]" placeholder="Nhập giá">
                                                                <?php $__errorArgs = ['priceOption.'.$key];
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
                                                                <label class="control-label" for="">Giá cũ</label>
                                                                <input type="number" min="0" class="form-control  <?php $__errorArgs = ['old_priceOption.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e($value); ?>" name="old_priceOption[]" placeholder="Nhập giá cũ">
                                                                <?php $__errorArgs = ['old_priceOption.'.$key];
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
                                                        <div class="action">
                                                            <a  class="btn btn-sm btn-danger deleteOptionProduct"><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
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

<div class="modal fade in" id="loadAjaxParent">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Đoạn văn</h4>
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
     
    // đoạn văn
    $(document).on('click', '.addOptionProductSize', function() {
        // alert('a');
        let id = $(this).data('id');
        event.preventDefault();
        //  let wrapActive = $(this).parents('.wrap-load-active');
        let urlRequest = $(this).data("url");
        //let i = $('.wrap-paragraph tbody').find('tr').length;
        //  alert(urlRequest);
        $.ajax({
            type: "GET",
            url: urlRequest,
            // data: { i: i },
            success: function(data) {
                if (data.code == 200) {
                    let html = data.html;
                    $('#wrapOptionSize'+ id).append(html);
                    // if ($("textarea.tinymce_editor_init").length) {
                    //     tinymce.init(editor_config);
                    // }
                }
            }
        });
    });
    $(document).on('click', '.deleteOptionProductSize', function() {
        event.preventDefault();
        let $this = $(this);
        Swal.fire({
            title: "Bạn có muốn xóa option?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                $this.parents('.item-price').remove();
            }
        })
    });
     // load delete đáp án  khi đáp án chưa thêm database
     $(document).on('click', '.deleteOptionProductDB', function() {
        event.preventDefault();
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa option này',
            text: "Bạn sẽ không thể khôi phục điều này",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            mythis.parents(".item-price").remove();
                        }
                    },
                    error: function() {

                    }
                });
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
        })
    });
</script>
<script>
    $(document).on('click', '.ui-button', function() {
            // let id = $(this).data('id');
            $('.form-input').removeClass('hidden');
            $('.ui-button').addClass('hidden');
    });
    // Lấy slug theo name
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/product/edit.blade.php ENDPATH**/ ?>