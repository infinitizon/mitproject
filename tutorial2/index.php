<?php
require_once('../assets/config.php');
$styles = [
  WEB_ROOT."/assets/vendor/codemirror-5.49.2/lib/codemirror.css",
  WEB_ROOT."/assets/vendor/prettify/src/prettify.css",
  //Pignose Calender
  TUTORIAL_ROOT."/vendor/pg-calendar/css/pignose.calendar.min.css",
  //Chartist
  TUTORIAL_ROOT."/vendor/chartist/css/chartist.min.css",
  TUTORIAL_ROOT."/vendor/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css",
  TUTORIAL_ROOT."/assets/css/style.css",

];
$scripts = [
    WEB_ROOT."/assets/vendor/prettify/src/prettify.js",
    WEB_ROOT."/assets/vendor/prettify/src/lang-css.js",
    WEB_ROOT."/assets/vendor/jquery-3.4.1.min.js",
    WEB_ROOT."/assets/vendor/bootstrap/4.3.1/js/bootstrap.min.js",
    WEB_ROOT."/assets/js/config.js",
    TUTORIAL_ROOT."/vendor/common/common.min.js",
    TUTORIAL_ROOT."/assets/js/custom.min.js",
    TUTORIAL_ROOT."/assets/js/settings.js",
    TUTORIAL_ROOT."/assets/js/gleek.js",
    TUTORIAL_ROOT."/assets/js/styleSwitcher.js",
    TUTORIAL_ROOT."/assets/js/script.js",
    // Chartjs
    TUTORIAL_ROOT."/vendor/chart.js/Chart.bundle.min.js",
    // Circle progress
    TUTORIAL_ROOT."/vendor/circle-progress/circle-progress.min.js",
    // Datamap
    TUTORIAL_ROOT."/vendor/d3v3/index.js",
    TUTORIAL_ROOT."/vendor/topojson/topojson.min.js",
    TUTORIAL_ROOT."/vendor/datamaps/datamaps.world.min.js",
    // Morrisjs
    TUTORIAL_ROOT."/vendor/raphael/raphael.min.js",
    TUTORIAL_ROOT."/vendor/morris/morris.min.js",
    // Pignose Calender
    TUTORIAL_ROOT."/vendor/moment/moment.min.js",
    TUTORIAL_ROOT."/vendor/pg-calendar/js/pignose.calendar.min.js",
    // ChartistJS
    TUTORIAL_ROOT."/vendor/chartist/js/chartist.min.js",
    TUTORIAL_ROOT."/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js",
    // ChartistJS
    TUTORIAL_ROOT."/assets/js/dashboard/dashboard-1.js",
];
$title = "Home";
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