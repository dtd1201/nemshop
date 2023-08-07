<?php
$level .= '-' . ($loop->index + 1);
$index .='.'.($loop->index + 1);
?>
<?php
$tranParagraph=($childs->translationsLanguage()->first());
if(!$tranParagraph){
    $tranParagraph=($childs->translationsLanguage(config('languages.default'))->first());
}
?>
<div id="para-<?php echo e($typeKey . '-' . $level); ?>">

    <div class="name-p"><span class="index"><?php echo e($index); ?> </span> <span><?php echo $tranParagraph->name; ?></span></div>
    <div class="content-p">
     <?php echo $tranParagraph->value; ?>

  </div>
</div>
<?php if($childs->childs()->where([['active', 1], ['type', $typeKey]])->count()): ?>
    <?php $__currentLoopData = $childs->childs()->where([['active', 1], ['type', $typeKey]])->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('frontend.components.paragraph-content-child', ['childs' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/frontend/components/paragraph-content-child.blade.php ENDPATH**/ ?>