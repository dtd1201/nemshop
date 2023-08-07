<tr class="paragraph">
    <td class="" style="width:calc(100% - 50px);">

        <div class="row">
            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e($langItem['value']==$langDefault?'active':''); ?>" data-toggle="tab" href="#thong_tin_paragraph_<?php echo e($i.$langItem['value']); ?>"><?php echo e($langItem['name']); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="tab-content">
                    <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="thong_tin_paragraph_<?php echo e($i.$langItem['value']); ?>" class="container tab-pane <?php echo e($langItem['value']==$langDefault?'active show':''); ?> fade">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">Tên đoạn</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  value="" name="nameParagraph_<?php echo e($langItem['value']); ?>[]" placeholder="Nhập tên" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">Nhập nội dung đoạn</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control tinymce_editor_init <?php $__errorArgs = ['valueParagraph_'.$langItem['value']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="valueParagraph_<?php echo e($langItem['value']); ?>[]" id="" rows="15" value=""  placeholder="Nhập nội dung đoạn văn" ></textarea>
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
                            <select class="form-control" id="" value="" name="typeParagraph[]" required>
                                <option value="">--- Chọn kiểu đoạn ---</option>
                                <?php $__currentLoopData = $configParagraph['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($key); ?>"> <?php echo e($value); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?php if(isset($htmlselect)): ?>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 control-label" for="">Chọn đoạn văn cha</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="" value="" name="parentIdParagraph[]" required>
                                <option value="">--- Chọn đoạn văn ---</option>
                               <?php echo e($htmlselect); ?>

                            </select>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 control-label" for="">Số thứ tự</label>
                        <div class="col-sm-8">
                            <input type="number" min="0" class="form-control"  value="" name="orderParagraph[]" placeholder="Nhập số thứ tự">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 control-label" for="">Trạng thái</label>
                        <div class="col-sm-8">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                     <input type="checkbox" class="form-check-input checkParagraph" value="1" name="activeParagraph[]" checked>Hiện
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                     <input type="checkbox" class="form-check-input checkParagraph" value="0" name="activeParagraph[]">Ẩn
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
<?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/admin/components/paragraph/add-paragraph.blade.php ENDPATH**/ ?>