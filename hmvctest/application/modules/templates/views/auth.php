<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $pageTitle; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="<?php echo webroot_url(); ?>/assets/favicon/favicon.ico">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?php echo assets_url(); ?>/css/style.css" rel="stylesheet">
    
    <?php 
        foreach($styles as $style) {
    ?>
        <link rel="stylesheet" href="<?php echo $style; ?>">
    <?php
        }
    ?>
</head>

<body class="h-100">
    
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

    



    
<?php
$this->load->view($module.'/'.$view_file);
?>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?php echo assets_url(); ?>/plugins/common/common.min.js"></script>
    <script src="<?php echo assets_url(); ?>/js/custom.min.js"></script>
    <script src="<?php echo assets_url(); ?>/js/settings.js"></script>
    <script src="<?php echo assets_url(); ?>/js/gleek.js"></script>
    <script src="<?php echo assets_url(); ?>/js/styleSwitcher.js"></script>
    <script src="<?php echo webroot_url(); ?>/assets/js/config.js"></script>
       
<?php foreach($scripts as $script) { ?>
<script src="<?php echo  $script; ?>"></script>
<?php } ?>
</body>
</html>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <iframe id="frame" src="" width="100%" height="500" frameBorder="0"></iframe>
        </div>
    </div>
    </div>
</div>