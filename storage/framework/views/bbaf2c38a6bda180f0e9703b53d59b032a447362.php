
<div class="warp-item-child-comment">
    <div class="item-rep-comment">
        <div class="item-vote-header">
            <div class="item-vote-title-left fleft">
                <span class="item-vote-user"><?php echo e($childValue->name); ?></span>
            </div>
            <div class="item-vote-time-right fright">
                <i class="far fa-clock"></i>
                <?php echo e($childValue->created_at->format('d/m/Y')); ?>

            </div>
            <div class="cboth"></div>
        </div>
        <div class="box-cmt__box-question">
            <div class="item-vote-question">
                
                <?php echo $childValue->content; ?>

            </div>
    
            <div class="btn-rep-cmt respondent">
                <div class="lc_reply link">
                    <a class="btn-modal-create-comment open-modal-reply-comment" data-toggle="modal" data-target="#modalReplyComment" data-name="<?php echo e($childValue->name); ?>" data-id="<?php echo e($childValue->id); ?>" data-type_comment=<?php echo e($childValue->type_comment); ?>>Trả lời</a>
                </div>
                <div class="lc_like link js-like" data-url="<?php echo e(route('product.like.comment')); ?>" data-id="<?php echo e($childValue->id); ?>">
                    <span class="icon-like">
                        <?php if($childValue->like > 0): ?>
                            <i class="fa fa-thumbs-up"></i>
                        <?php endif; ?>
                    </span>
                    Thích
                    <span class="product-review-cout total-like-<?php echo e($childValue->id); ?>" data-like="<?php echo e($childValue->like); ?>">
                        <?php echo e($childValue->like > 0 ? '('.$childValue->like.')' : ''); ?></span>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/frontend/components/load-comment-child.blade.php ENDPATH**/ ?>