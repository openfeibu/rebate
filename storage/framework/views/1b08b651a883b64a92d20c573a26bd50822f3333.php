<?php if($message = Session::get('success')): ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><?php echo e(trans('app.flash.success')); ?></strong> <?php echo e($message); ?>

  </div>
  <?php echo e(Session::forget('success')); ?>

<?php endif; ?>

<?php if($message = Session::get('error')): ?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><?php echo e(trans('app.flash.error')); ?>:</strong> <?php echo e($message); ?>

  </div>
  <?php echo e(Session::forget('error')); ?>

<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
  <div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><?php echo e(trans('app.flash.warning')); ?>:</strong> <?php echo e($message); ?>

  </div>
  <?php echo e(Session::forget('warning')); ?>

<?php endif; ?>

<?php if($message = Session::get('info')): ?>
  <div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><?php echo e(trans('app.flash.info')); ?>:</strong> <?php echo e($message); ?>

  </div>
  <?php echo e(Session::forget('info')); ?>

<?php endif; ?>

<?php if(isset($errors) && $errors->all()): ?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><?php echo e(trans('app.flash.error')); ?>:</strong>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo e($message); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php endif; ?>
