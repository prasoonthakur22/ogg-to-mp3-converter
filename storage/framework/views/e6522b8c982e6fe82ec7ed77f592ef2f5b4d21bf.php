    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Ogg to Mp3 (Free & Unlimited)</title>

    <!-- Metas -->
    <meta name="description" content="Here convert Ogg to Mp3 within Micro Second, Just Upload or Drag And Drop Your Ogg/.Ogg file. Convert Unlimited Ogg To Mp3, No Sign-Up No Login Needed.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Anurag Deep | https://anuragdeep.com">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="asd" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(URL::asset('images/logo.png')); ?>" />

    <?php echo $__env->yieldPushContent('css'); ?>
    <!-- Main Stylesheet -->
    <link href="<?php echo e(asset('css/ad.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css" />

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!-- Javascripts -->
    <script src="<?php echo e(URL::asset('js/app.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=asd]').attr('content')
            }
        });
    </script>
<?php /**PATH /var/www/html/ogg2mp3/resources/views/components/master.blade.php ENDPATH**/ ?>