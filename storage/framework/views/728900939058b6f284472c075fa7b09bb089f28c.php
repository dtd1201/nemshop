


<?php
    $folder ="";
?>

<ul class="lb_list_category">
    <li class="border-bottom font-weight-bold  title-card-recusive">
        <div class="d-flex">
            <div class="box-left lb_list_content_recusive">
                <div class="d-flex">
                    <div class="col-sm-1 pt-2 pb-2 white-space-nowrap folder">
                        Folder
                    </div>
                    <div class="col-sm-3 pt-2 pb-2 name">
                        Tên danh mục
                    </div>
                    <div class="col-sm-3 pt-2 pb-2 slug">
                        Mô tả
                    </div>
                    <div class="col-sm-3 pt-2 pb-2 slug">
                       Key code
                    </div>
                    <div class="col-sm-3 pt-2 pb-2 parent">
                        Danh mục cha
                    </div>
                </div>
            </div>
            <div class="pt-2 pb-2 lb_list_action_recusive">
                Action
            </div>
        </div>
    </li>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="lb_item_recusive font-weight-bold  lb_item_delete  border-bottom">
            <div class="d-flex">
                <div class="box-left lb_list_content_recusive ">
                    <div class="d-flex">
                        <div class="col-sm-1 pt-2 pb-2 white-space-nowrap folder">
                            
                            <?php if($value->childs->count()): ?>
                              <i class="fas fa-folder"></i>
                            <?php else: ?>
                            <i class="fas fa-file-alt"></i>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-3 pt-2 pb-2 name">
                            <?php echo e($value->name); ?>

                        </div>
                        <div class="col-sm-3 pt-2 pb-2 slug">
                            <?php echo e($value->description); ?>

                        </div>
                        <div class="col-sm-3 pt-2 pb-2 slug">
                            <?php echo e($value->key_code); ?>

                        </div>
                        <div class="col-sm-2 pt-2 pb-2 parent">
                            
                            Cha
                        </div>
                    </div>
                </div>

                <div class="pt-2 pb-2 lb_list_action_recusive">
                    <a href="<?php echo e(route($routeNameEdit,['id'=>$value->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo e(route($routeNameAdd,['parent_id'=>$value->id])); ?>" class="btn btn-sm btn-info">+ Thêm</a>
                    <a data-url="<?php echo e(route($routeNameDelete,['id'=>$value->id])); ?>" class="btn btn-sm btn-danger lb_delete_recusive"><i class="far fa-trash-alt"></i></a>
                    <?php if($value->childs->count()): ?>
                    <button type="button" class="btn btn-sm btn-primary lb-toggle">
                        <i class="fas fa-plus"></i>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($value->childs->count()): ?>
                <ul class="font-weight-normal" style="display: none;">
                    <?php $__currentLoopData = $value->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('admin.components.permission-child', ['childs' => $childValue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/components/permission.blade.php ENDPATH**/ ?>