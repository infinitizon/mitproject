<?php
require_once('../assets/config.php');
$styles = [
  WEB_ROOT."/assets/vendor/codemirror-5.49.2/lib/codemirror.css",
  WEB_ROOT."/assets/vendor/prettify/src/prettify.css",
  //Pignose Calender
  TUTORIAL_ROOT."/assets/plugins/pg-calendar/css/pignose.calendar.min.css",
  //Chartist
  TUTORIAL_ROOT."/assets/plugins/chartist/css/chartist.min.css",
  TUTORIAL_ROOT."/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css",
  TUTORIAL_ROOT."/assets/css/style.css",

];
$scripts = [
    WEB_ROOT."/assets/vendor/prettify/src/prettify.js",
    WEB_ROOT."/assets/vendor/prettify/src/lang-css.js",
    WEB_ROOT."/assets/vendor/jquery-3.4.1.min.js",
    WEB_ROOT."/assets/vendor/bootstrap/4.3.1/js/bootstrap.min.js",
    WEB_ROOT."/assets/js/config.js",
    TUTORIAL_ROOT."/assets/plugins/common/common.min.js",
    TUTORIAL_ROOT."/assets/js/custom.min.js",
    TUTORIAL_ROOT."/assets/js/settings.js",
    TUTORIAL_ROOT."/assets/js/gleek.js",
    TUTORIAL_ROOT."/assets/js/styleSwitcher.js",
    TUTORIAL_ROOT."/assets/js/script.js",
    // Chartjs
    TUTORIAL_ROOT."/assets/plugins/chart.js/Chart.bundle.min.js",
    // Circle progress
    TUTORIAL_ROOT."/assets/plugins/circle-progress/circle-progress.min.js",
    // Datamap
    TUTORIAL_ROOT."/assets/plugins/d3v3/index.js",
    TUTORIAL_ROOT."/assets/plugins/topojson/topojson.min.js",
    TUTORIAL_ROOT."/assets/plugins/datamaps/datamaps.world.min.js",
    // Morrisjs
    TUTORIAL_ROOT."/assets/plugins/raphael/raphael.min.js",
    TUTORIAL_ROOT."/assets/plugins/morris/morris.min.js",
    // Pignose Calender
    TUTORIAL_ROOT."/assets/plugins/moment/moment.min.js",
    TUTORIAL_ROOT."/assets/plugins/pg-calendar/js/pignose.calendar.min.js",
    // ChartistJS
    TUTORIAL_ROOT."/assets/plugins/chartist/js/chartist.min.js",
    TUTORIAL_ROOT."/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js",
    // ChartistJS
    TUTORIAL_ROOT."/assets/js/dashboard/dashboard-1.js",
];
$config = ['title'=>"Home", 'stretch_height'=> true];
require_once('assets/header.php');
?>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
<?php 
// Include the topbar menu
require_once('assets/nav_top_side_bar.php');
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
            Content here
            </div>
            <!-- #/ container-fluid -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
    <?php
require_once('assets/footer_content.php');
    ?>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php
require_once('assets/footer.php');
    ?>