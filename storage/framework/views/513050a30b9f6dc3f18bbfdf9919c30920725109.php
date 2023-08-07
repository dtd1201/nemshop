<div class="item-price">
    <div class="box-content-price">
        <div class="form-group">
            <label class="control-label" for="">Nhập size</label>
            <input type="text" class="form-control autoplate_name  <?php $__errorArgs = ['valueOption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  valueOption="<?php echo e(old('valueOption')); ?>" name="valueOption[]" placeholder="Nhập size">
            <?php $__errorArgs = ['valueOption'];
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
            <label class="control-label" for="">Ẩn size (Hết size)</label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input <?php $__errorArgs = ['statusOption[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        is-invalid
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="0" name="statusOption[]" <?php if(old('statusOption')==="1" ): ?> <?php echo e('checked'); ?> <?php endif; ?>>
                </label>
            </div>
            <?php $__errorArgs = ['statusOption[]'];
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
        
        <div class="action">
            <a class="btn btn-sm btn-danger deleteOptionProductSize"><i class="far fa-trash-alt"></i></a>
        </div>
    </div>
    
</div><?php /**PATH /var/www/vhosts/sieuthithoitrangcaocap.com/httpdocs/resources/views/admin/components/load-option-product-size.blade.php ENDPATH**/ ?>