

<?php if(isset($data) && $data): ?>
    <?php $__currentLoopData = $data->paragraphs()->where([['type', $typeKey], ['active', 1], ['parent_id', 0]])->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $level = $loop->index + 1;
            $index = $loop->index + 1;
        ?>
     <?php
            $tranParagraph=($paragraph->translationsLanguage()->first());
            if(!$tranParagraph){
                $tranParagraph=($paragraph->translationsLanguage(config('languages.default'))->first());
            }
    ?>
        <li><h2>
            <a class="scrollLink" href="<?php echo e(request()->url()); ?>#para-<?php echo e($typeKey . '-' . $level); ?>"><span class="index"><?php echo e($index); ?>

                </span><?php echo $tranParagraph->name; ?></a></h2>

            <?php if($paragraph->childs()->where([['active', 1], ['type', $typeKey]])->count()): ?>
                <ul class="">
                    <?php $__currentLoopData = $paragraph->childs()->where([['active', 1], ['type', $typeKey]])->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php echo $__env->make('frontend.components.paragraph-child', ['childs' => $childValue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/cus05.largevendor.com/httpdocs/resources/views/frontend/components/paragraph.blade.php ENDPATH**/ ?>