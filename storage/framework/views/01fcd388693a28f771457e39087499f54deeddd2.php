
<div class="main">
    <div class="vipType">
        <?php if($account_vip): ?>
            <div class="vipType-test">
                <p>VIP3</p>
            </div>
        <?php else: ?>
            <div class="vipType-test">
                <p class="no-vip"></p>
            </div>
        <?php endif; ?>
        <div class="vipType-btn">
            <a href="<?php echo e(url('vip')); ?>">升级会员</a>
        </div>
    </div>
    <div class="showData fb-clearfix">
        <div class="showData-item">
            <img src="<?php echo theme_asset('images/wallte.png'); ?>" alt="">
            <p>金币</p>
            <span><?php echo e(Auth::user()->userInsureScore()); ?></span>
        </div>
        <div class="showData-item">
            <img src="<?php echo theme_asset('images/mp1-active.png'); ?>" alt="">
            <p>返佣金币</p>
            <span><?php echo e(Auth::user()->userRebateCount()); ?></span>
        </div>
    </div>

    <div class="vip-explain">
        <?php $__currentLoopData = $vips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vip_key => $vip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="vip-explain-item">
                <div class="vip-explain-item-header"><?php echo e($vip->VipName); ?></div>
                <div class="vip-explain-item-test">
                    <?php echo e($vip->Detail); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
