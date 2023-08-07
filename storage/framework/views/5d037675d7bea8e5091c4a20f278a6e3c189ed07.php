<footer id="footer">
    <div class="top" id="<?php echo e($footer['lien_he']->slug); ?>">
        <div class="container">
            <div class="row">
                <?php if($footer['dang_ky']): ?>
                <div class="col-lg-6 col-md-6 col-12">
                    <article class="cta-container">
                        <h2 class="sub-title"><?php echo e($footer['dang_ky']->name); ?></h2>
                        <p class="desc">
                            <?php echo e($footer['dang_ky']->value); ?>

                        </p>
                        <form id="recruiment-form" action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="email" name="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" placeholder="Email..." required>
                            <button class="button" type="submit">Đăng kí</button>
                        </form>
                    </article>
                </div>
                <?php endif; ?>
                <?php if($footer['info']): ?>
                <div class="col-lg-6 col-md-6 col-12">
                    <article class="information-container">
                    <h2 class="sub-title">
                        <?php echo e($footer['info']->name); ?>

                    </h2>
                    <?php if($footer['info']->childs->count()>0): ?>
                    <ul class="information-list">
                        <?php $__currentLoopData = $footer['info']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item"><a href="<?php echo e($item->slug??'#'); ?>"><?php echo e($item->name); ?>: <?php echo e($item->value); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                    </article>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="copyrights">
    <div class="container">
        <div class="row">
            <?php if($footer['copy_right']): ?>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="copyrights-text">
                <p><?php echo e($footer['copy_right']->name); ?></p>
                </div>
            </div>
            <?php endif; ?>
            <?php if($footer['sosial'] && $footer['sosial']->childs->count()>0): ?>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="social-container">
                    <?php $__currentLoopData = $footer['sosial']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($item->slug??'#'); ?>" class="social-item">
                        <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>" />
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</footer>



<?php /**PATH C:\xampp\htdocs\demola\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>