

<ul class="pl-0">
    <li class="border-top font-weight-bold pl-3">
        <div class="row">
            <div class="box-left" style="width:calc(100% - 110px);">
                <div class="row">
                    <div class="col-sm-1 pt-2 pb-2">
                        ID
                    </div>
                    <div class="col-sm-4 pt-2 pb-2">
                        Tên danh mục
                    </div>
                    <div class="col-sm-4 pt-2 pb-2">
                        Đường dẫn
                    </div>
                    <div class="col-sm-3 pt-2 pb-2">
                        Danh mục cha
                    </div>
                </div>
            </div>
            <div class="pt-2 pb-2" style="width:110px;">
                Action
            </div>
        </div>
    </li>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="border-top border-success font-weight-bold pl-3 ">
            <div class="row">
                <div class="box-left" style="width:calc(100% - 110px);">
                    <div class="row">
                        <div class="col-sm-1 pt-2 pb-2">
                            <?php echo e($value->id); ?>

                        </div>
                        <div class="col-sm-4 pt-2 pb-2">
                            <?php echo e($value->name); ?>

                        </div>
                        <div class="col-sm-4 pt-2 pb-2">
                            <?php echo e($value->slug); ?>

                        </div>
                        <div class="col-sm-3 pt-2 pb-2">
                            
                            Cha
                        </div>
                    </div>
                </div>

                <div class="pt-2 pb-2" style="width:110px;">
                    <a href="<?php echo e(route('admin.menu.getEdit',['id'=>$value->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                    <a data-url="<?php echo e(route('admin.menu.getDelete',['id'=>$value->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                    <?php if($value->childs->count()): ?>
                        <button type="button" class="btn btn-sm btn-primary lb-toggle">
                            <i class="fas fa-plus"></i>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($value->childs->count()): ?>
                <ul class="border font-weight-normal" style="display: none;">
                    <?php $__currentLoopData = $value->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('admin.components.menu-child', ['childs' => $childValue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/components/menu.blade.php ENDPATH**/ ?>