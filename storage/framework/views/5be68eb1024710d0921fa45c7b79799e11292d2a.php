
<li class="border pl-3">
    <div class="row">
        <div class="box-left" style="width:calc(100% - 110px );">
            <div class="row">
                <div class="col-sm-1 pt-2 pb-2">
                    <?php echo e($childValue->id); ?>

                </div>
                <div class="col-sm-4 pt-2 pb-2">
                    <?php echo e($childValue->name); ?>

                </div>
                <div class="col-sm-4 pt-2 pb-2">
                    <?php echo e($childValue->slug); ?>

                </div>
                <div class="col-sm-3">
                    
                    
                    <?php echo $__env->make('admin.components.breadcrumbs',['breadcrumbs'=>$childValue->breadcrumb], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="pt-2 pb-2" style="width:110px;">
            <a href="<?php echo e(route('admin.categorypost.getEdit',['id'=>$childValue->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
            <a data-url="<?php echo e(route('admin.categorypost.getDelete',['id'=>$childValue->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
            <?php if($childValue->childs->count()): ?>
            <button type="button" class="btn btn-sm btn-primary lb-toggle">
                <i class="fas fa-plus"></i>
            </button>
            <?php endif; ?>
        </div>
    </div>
    <?php if($childValue->childs->count()): ?>
        <ul class="" style="display: none;">
            <?php $__currentLoopData = $childValue->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('admin.components.category-post-child', ['childValue' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li>

<?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/components/category-post-child.blade.php ENDPATH**/ ?>