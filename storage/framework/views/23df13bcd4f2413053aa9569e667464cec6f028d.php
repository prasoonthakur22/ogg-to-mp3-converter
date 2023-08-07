    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title><?php echo e(config('app.name')); ?></title>

    <!-- Metas -->
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Anurag Deep | https://anuragdeep.com">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="asd" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(URL::asset('images/logo.png')); ?>" />

    <?php echo $__env->yieldPushContent('css'); ?>
    <!-- Main Stylesheet -->
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css" />

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!-- Javascripts -->
    <script src="<?php echo e(URL::asset('js/app.js')); ?>"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=asd]').attr('content')
            }
        });
    </script><?php /**PATH /mnt/c/Users/AnuragDeep/OneDrive/Desktop/Freelancing/ogg2mp3/resources/views/components/master.blade.php ENDPATH**/ ?>