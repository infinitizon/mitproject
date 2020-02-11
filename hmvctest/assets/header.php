<!DOCTYPE html>
<html <?php echo $config['stretch_height']?'class="h-100"':'' ?> lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title']; ?></title>

    <?php
        foreach($styles as $stylesheet){
    ?>
    <link href="<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css">
    <?php
        }
    ?>
</head>
<body <?php echo $config['stretch_height']? 'class="h-100"':'' ?> >

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->