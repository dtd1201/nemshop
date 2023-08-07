<?php
if(!isset($urlActive)){
    $urlActive=url()->current();
}

?>
<div id="side-bar">
    

<?php
    $postsHotNew = \App\Models\Post::where([
            ['active', 1],
            ['hot', 1],
            ['category_id', $category->id],
        ])->orderby('order')->orderByDesc('created_at')->limit(5)->get();
?>
    <div class="side-bar">
        <div class="title-sider-bar">
            <?php echo e(__('home.tin_noi_bat')); ?>

        </div>
        <?php if( isset($postsHotNew) && $postsHotNew->count()>0 ): ?>
        <div class="list-trending">
            <ul>
                <?php $__currentLoopData = $postsHotNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $postTrans = $item->translationsLanguage()->first();
                ?>

                    <li>
                        <div class="box">
                            <div class="icon">
                                <a href="<?php echo e($item->slug_full); ?>">
									<img src="<?php echo e($item->avatar_path != null ?  asset($item->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($postTrans->name); ?>">
                                </a>
                            </div>
                            <div class="content">
                                <h3 class="name"><a href="<?php echo e($item->slug_full); ?>"><?php echo e($postTrans->name); ?></a></h3>
                                
                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>


    
    

    

</div>


<?php /**PATH /var/www/vhosts/demo9.dkcauto.net/httpdocs/resources/views/frontend/components/sidebar.blade.php ENDPATH**/ ?>