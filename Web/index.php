<?php
require_once('../assets/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/assets/vendor/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/assets/vendor/fontawesome/5.12.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/lib/codemirror.js"></script>
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/lib/codemirror.css">
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/javascript/javascript.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/python/python.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/htmlmixed/htmlmixed.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/htmlembedded/htmlembedded.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/addon/mode/multiplex.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/xml/xml.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/css/css.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/clike/clike.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/codemirror-5.49.2/mode/php/php.js"></script>
</head>
<body>
    <div class="container">
        <form action="http://localhost/MITProject/" method="post" id="my_form">
            <div class="row">
                <div class="col-md-5">
                    <div class="text-right form-group">
                        <select class="form-control" id="language" name="language">
                            <option value="application/x-ejs">html</option>
                            <option value="application/x-httpd-php">php</option>
                            <option value="python">python</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-flex h-100">
                <div class="col-md-6">
                    <textarea name="myEditor" id="myEditor" ><!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
</head>
<body>
  <h1>This is a Heading</h1>
  <p>This is a paragraph.</p>
</body>
</html></textarea></div>
<div class="col-md-1 text-center justify-content-center align-self-center">
<span class="glyphicon glyphicon-print"></span>
    <button type="submit" class="btn btn-sm btn-primary d-none d-md-block" id="exceute">
        <i class="far fa-paper-plane"></i> Run
    </button>
    <button type="submit" class="btn btn-sm btn-primary d-md-none d-lg-none" id="exceute">
        <i class="far fa-paper-plane"></i> Execute
    </button>
</div>

<div class="col-md-5">
    <div class="result-container">
        <div class="result-row">
            <div class="column left">
            <span class="dot" style="background:#ED594A;"></span>
            <span class="dot" style="background:#FDD800;"></span>
            <span class="dot" style="background:#5AC05A;"></span>
            </div>
            <div class="column middle">
                <input type="text" id="url" value="file:///C:/Users/Desktop/myFile.html">
            </div>
            <div class="column right">
            <div style="float:right">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            </div>
        </div>

        <div id="result">
            <p>Your result shows up here.</p>
        </div>
    </div>
</div>
            </div>
        </form>
    </div>
    <script src="<?php echo WEB_ROOT; ?>/assets/vendor/jquery-3.4.1.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/js/config.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>