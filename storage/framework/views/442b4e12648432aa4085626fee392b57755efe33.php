
<?php
$folder ="";
?>

<ul class="nav nav-tabs">
    <?php $__currentLoopData = $configParagraph['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="nav-item">
        <a class="nav-link <?php echo e($loop->first?'active':''); ?>" data-toggle="tab" href="#type_paragraph_<?php echo e($key); ?>"><?php echo e($value); ?></a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<div class="tab-content">
    <?php $__currentLoopData = $configParagraph['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="type_paragraph_<?php echo e($key); ?>" class="container tab-pane <?php echo e($loop->first?'active show':''); ?> fade">
        <div class="">
            <ul class="lb_list_category">
                <li class="border-bottom font-weight-bold  title-card-recusive">
                    <div class="d-flex">
                        <div class="box-left lb_list_content_recusive">
                            <div class="d-flex">
                                <div class="col-sm-10 pt-2 pb-2 name">
                                    Danh sách đoạn văn
                                </div>
                                <div class="col-sm-2 pt-2 pb-2 slug text-center">
                                    STT
                                </div>
                            </div>
                        </div>
                        <div class="pt-2 pb-2 lb_list_action_recusive">
                            Tác Vụ
                        </div>
                    </div>
                </li>


                <?php $__currentLoopData = $data->paragraphs()->where('type',$key)->where('parent_id',0)->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraphItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class="lb_item_recusive font-weight-bold  lb_item_delete  border-bottom">
                    <div class="d-flex">
                        <div class="box-left lb_list_content_recusive ">
                            <div class="d-flex">
                                <div class="col-sm-10 pt-2 pb-2 name">
                                    <?php if($paragraphItem->childs->count()): ?>
                                        <i class="fas fa-folder"></i>
                                    <?php else: ?>
                                    <i class="fas fa-file-alt"></i>
                                    <?php endif; ?>
                                    <?php echo e($paragraphItem->name); ?>

                                </div>
                                <div class="col-sm-2 pt-2 pb-2 slug text-center">
                                    <?php echo e($paragraphItem->order); ?>

                                </div>
                            </div>
                        </div>

                        <div class="pt-1 pb-1 lb_list_action_recusive">
                            <a  class="btn btn-sm btn-danger lb_delete_recusive" data-url="<?php echo e(route($configParagraph['routeDelete'],['id'=>$paragraphItem->id])); ?>"><i class="far fa-trash-alt"></i></a>
                            <a  class="btn btn-sm btn-info btnShowParagraph" data-url="<?php echo e(route($configParagraph['routeEdit'],['id'=>$paragraphItem->id])); ?>"><i class="fas fa-edit"></i></a>
                            <?php if($paragraphItem->childs->count()): ?>
                            <button type="button" class="btn btn-sm btn-primary lb-toggle">
                                <i class="fas fa-plus"></i>
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($paragraphItem->childs->count()): ?>
                        <ul class="font-weight-normal" style="display: none;">
                            <?php $__currentLoopData = $paragraphItem->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php echo $__env->make('admin.components.paragraph.load-list-childs-paragraph', [
                                      'childs' => $childValue
                                  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/admin/components/paragraph/load-list-paragraph.blade.php ENDPATH**/ ?>