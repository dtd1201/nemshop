<div class="content-comment">
    <!--start item-vote -->
    <?php if(!empty($data) && count($data) > 0): ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div class="item-vote fleft">
        <div class="item-vote-header">
            <div class="item-vote-title-left fleft">
                <span class="item-vote-avatar"> <?php echo e(ucfirst(substr("$comment->name", 0, 1))); ?></span>
                <span class="item-vote-user"><?php echo e($comment->name); ?></span>
            </div>
            <div class="item-vote-time-right fright">
                <i class="far fa-clock"></i>
                <?php echo e($comment->created_at->format('d/m/Y')); ?>

            </div>
            <div class="cboth"></div>
        </div>
        <div class="item-vote-info">
            <?php if($comment->stars && $comment->type_comment == 2): ?>
            <div class="item-vote-raiting">
                
                <span class="pro-item-start-rating">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <?php if($i <= $comment->stars): ?>
                            <i class="star-bold far fa-star"></i>
                        <?php else: ?>
                            <i class="far fa-star"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                </span>
            </div>
            <?php endif; ?>
            <div class="item-vote-question">
                
                <?php echo $comment->content; ?>

            </div>
            <div class="btn-rep-cmt respondent">
                <div class="lc_reply link">
                    <a class="btn-modal-create-comment open-modal-reply-comment" data-toggle="modal" data-target="#modalReplyComment" data-name="<?php echo e($comment->name); ?>" data-id="<?php echo e($comment->id); ?>" data-type_comment=<?php echo e($comment->type_comment); ?>>Trả lời</a>
                </div>
                <div class="lc_like link js-like" data-url="<?php echo e(route('product.like.comment')); ?>" data-id="<?php echo e($comment->id); ?>">
                    <span class="icon-like">
                        <?php if($comment->like > 0): ?>
                            <i class="fa fa-thumbs-up"></i>
                        <?php endif; ?>
                    </span>
                    Thích
                    <span class="product-review-cout total-like-<?php echo e($comment->id); ?>" data-like="<?php echo e($comment->like); ?>">
                        <?php echo e($comment->like > 0 ? '('.$comment->like.')' : ''); ?>

                    </span>
                </div>
            </div>
        </div>
    
        <div class="item-comment__box-rep-comment fleft">
            <div class="list-rep-comment">
                <?php
                    $commentM = new App\Models\Comment();
                    $listIdCommentChild = $commentM->getALlCommentChildrenAndSelf($comment->id);
                    unset($listIdCommentChild[0]); 
                    $commentChilds = $commentM->whereIn('id', $listIdCommentChild)->get();
                ?>
                <?php $__currentLoopData = $commentChilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('frontend.components.load-comment-child', ['childs' => $childValue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php endif; ?>
<!--end item-vote -->

<?php /**PATH /var/www/vhosts/demo5.tiemthietke.com/httpdocs/resources/views/frontend/components/load-comment-product.blade.php ENDPATH**/ ?>