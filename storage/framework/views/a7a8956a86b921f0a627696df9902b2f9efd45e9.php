

<?php
$folder .="<i class='fas fa-long-arrow-alt-right'></i>";
?>
<li class=" lb_item_delete  border-bottom">
    <div class="d-flex flex-wrap">
        <div class="box-left lb_list_content_recusive">
            <div class="d-flex">
                <div class="col-sm-10 pt-2 pb-2 name">
                    <?php echo $folder; ?>

                    <?php if($childValue->childs->count()): ?>
                            <i class="fas fa-folder"></i>
                    <?php else: ?>
                            <i class="fas fa-file-alt"></i>
                    <?php endif; ?>
                    <?php echo e($childValue->name); ?>

                </div>
                <div class="col-sm-2 pt-2 pb-2 slug text-center">
                    <?php echo e($childValue->order); ?>

                </div>
            </div>
        </div>
        <div class="pt-1 pb-1 lb_list_action_recusive" >
            <a  class="btn btn-sm btn-danger lb_delete_recusive" data-url="<?php echo e(route($configParagraph['routeDelete'],['id'=>$childValue->id])); ?>"><i class="far fa-trash-alt"></i></a>
            <a  class="btn btn-sm btn-info btnShowParagraph" data-url="<?php echo e(route($configParagraph['routeEdit'],['id'=>$childValue->id])); ?>"><i class="fas fa-edit"></i></a>
            <?php if($childValue->childs->count()): ?>
                <button type="button" class="btn btn-sm btn-primary lb-toggle">
                    <i class="fas fa-plus"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
    <?php if($childValue->childs->count()): ?>
        <ul class="" style="display: none;">
            <?php $__currentLoopData = $childValue->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('admin.components.paragraph.load-list-childs-paragraph', ['childValue' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

</li>

<?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/admin/components/paragraph/load-list-childs-paragraph.blade.php ENDPATH**/ ?>