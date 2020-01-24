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
    WEB_ROOT."assets/js/script.js",
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
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:1%">1%</div>
            </div>
            HTML is a markup language for buiding pages on the web.
            <ul>
                <li>The acronym HTML stands for HyperText Markup Language</li>
                <li>HTML has "elements" they look like this...&lt;b&gt; </li>
                <li>The elements are called tags </li>
            </ul>
            </div>
          </div>
        </div>
    </div>

    <?php
require_once('../assets/footer.php');
    ?>
</body>
</html>