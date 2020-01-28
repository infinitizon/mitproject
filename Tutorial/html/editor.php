<?php
require_once('../../assets/config.php');

$styles = [
    WEB_ROOT."assets/vendor/bootstrap/4.3.1/css/bootstrap.min.css",
    WEB_ROOT."assets/vendor/codemirror-5.49.2/lib/codemirror.css",
    WEB_ROOT."assets/vendor/prettify/src/prettify.css",
    WEB_ROOT."tutorial/assets/css/style.css",
];
$scripts = [
    WEB_ROOT."assets/vendor/prettify/src/prettify.js",
    WEB_ROOT."assets/vendor/prettify/src/lang-css.js",
    WEB_ROOT."assets/vendor/jquery-3.4.1.min.js",
    WEB_ROOT."assets/vendor/bootstrap/4.3.1/js/bootstrap.min.js",
    WEB_ROOT."/assets/js/config.js",
    WEB_ROOT."tutorial/assets/js/script.js",
];
require_once('../assets/header.php');
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
              <?php
require_once('../assets/menu.php');
              ?>
              <hr class="d-sm-none">
            </div>
            <div class="col-sm-9">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:2%">2%</div>
                </div>
                <h2>You need an HTML Editor</h2>
                <p>In this tutorial, you will <b>not</b> need an editor because I provide a Try It Yourself link for each assignment.</p>
                However, if you want to follow along on your computer, you will need an HTML editor.<br />
                All computers come with an editor called...notepad (Windows) or TextEdit (Mac)
                <div class="row">
                    <div class="col-sm-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?php echo WEB_ROOT."tutorial/html/" ?>" class="btn btn-sm btn-primary">Start &nbsp;&nbsp;&nbsp;:<< Previous</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?php echo WEB_ROOT."tutorial/html/editor.php" ?>" class="btn btn-sm btn-primary float-right">Next >>: &nbsp;&nbsp;&nbsp;Editor</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <?php
require_once('../assets/footer.php');
    ?>
</body>
</html>