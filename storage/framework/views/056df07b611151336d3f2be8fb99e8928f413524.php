<form class="form-horizontal formEditParagaphAjax" data-url="<?php echo e($urlUpload); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="loadHtmlErrorValide">

    </div>
    <div class="text-right mb-3">
        <button class="btn btn-primary btn-lg" type="submit">Lưu lại</button>
    </div>
    <div class="row">
        <div class="col-md-9">
            <ul class="nav nav-tabs">
                <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($langItem['value']==$langDefault?'active':''); ?>" data-toggle="tab" href="#thong_tin_paragraph_edit_<?php echo e($loop->index."_".$langItem['value']); ?>"><?php echo e($langItem['name']); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="tab-content">
                <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="thong_tin_paragraph_edit_<?php echo e($loop->index."_".$langItem['value']); ?>" class="container tab-pane <?php echo e($langItem['value']==$langDefault?'active show':''); ?> fade">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label" for="">Tên đoạn</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="<?php echo e(old('nameParagraphEdit_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->name); ?>" name="nameParagraphEdit_<?php echo e($langItem['value']); ?>" placeholder="Nhập tên" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label" for="">Nhập nội dung đoạn</label>
                            <div class="col-sm-10">
                                <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['valueParagraphEdit_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="valueParagraphEdit_<?php echo e($langItem['value']); ?>" id="" rows="15" value=""  placeholder="Nhập nội dung đoạn văn" >
                                    <?php echo e(old('valueParagraphEdit_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->value); ?>

                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="wrap-load-image mb-3">
                
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Chọn kiểu</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="paragraphType" data-url="<?php echo e($routeLoadParagraphType); ?>" value="" name="typeParagraphEdit" required>
                            <option value="">--- Chọn kiểu đoạn ---</option>
                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e($key== $data->type?"selected":""); ?>> <?php echo e($value); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Chọn đoạn văn cha</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="paragraphParent" value="" name="parentIdParagraphEdit">
                            <option value="">--- Chọn đoạn văn ---</option>
                            <?php if(isset($htmlselect)): ?>
                            <?php echo $htmlselect; ?>

                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Số thứ tự</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control"  value="<?php echo e($data->order); ?>" name="orderParagraphEdit" placeholder="Nhập số thứ tự">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Trạng thái</label>
                    <div class="col-sm-8">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input checkParagraph" value="1" name="activeParagraphEdit" <?php echo e((old('activeParagraphEdit')??$data->active)==1?"checked":""); ?>>Hiện
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input checkParagraph" value="0" name="activeParagraphEdit" <?php echo e((old('activeParagraphEdit')??$data->active)==0?"checked":""); ?>>Ẩn
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
<?php /**PATH /var/www/vhosts/kingphar.vn/httpdocs/resources/views/admin/components/paragraph/edit-paragraph.blade.php ENDPATH**/ ?>