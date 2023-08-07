<?php
$level .='-'.($loop->index + 1);
$index .='.'.($loop->index + 1);
?>
<?php
$tranParagraph=($childs->translationsLanguage()->first());
if(!$tranParagraph){
    $tranParagraph=($childs->translationsLanguage(config('languages.default'))->first());
}
?>
<li>
    <h3><a class="scrollLink" href="<?php echo e(request()->url()); ?>#para-<?php echo e($typeKey . '-' . ($level)); ?>"><span class="index"><?php echo e($index); ?> </span> <?php echo $tranParagraph->name; ?></a></h3>
    <?php if($childs->childs()->where([
        ['active',1],
        ['type', $typeKey]
    ])->count()): ?>
        <ul>
            <?php $__currentLoopData = $childs->childs()->where([
                ['active',1],
                ['type', $typeKey]
            ])->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('frontend.components.paragraph-child', ['childs' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li>

<?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/frontend/components/paragraph-child.blade.php ENDPATH**/ ?>