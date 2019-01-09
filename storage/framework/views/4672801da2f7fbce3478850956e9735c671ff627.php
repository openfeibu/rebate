<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo Theme::getTitle(); ?></title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo Theme::asset()->styles(); ?>

    <?php echo Theme::asset()->scripts(); ?>

    <?php echo Theme::asset()->container('layer_mobile')->scripts(); ?>

</head>
<body  ontouchstart >
<?php echo Theme::partial('header'); ?>

<?php echo Theme::content(); ?>

<?php echo Theme::partial('footer'); ?>

</body>
</html>