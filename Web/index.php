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

    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>assets/vendor/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/lib/codemirror.js"></script>
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/lib/codemirror.css">
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/javascript/javascript.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/python/python.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/htmlmixed/htmlmixed.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/htmlembedded/htmlembedded.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/addon/mode/multiplex.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/xml/xml.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/css/css.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/clike/clike.js"></script>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/codemirror-5.49.2/mode/php/php.js"></script>
</head>
<body>
    <div class="container">
        <form action="http://localhost/MITProject/" method="post" id="my_form">
            <div class="row">
                <div class="col-sm-6">
                    <div class="text-right">
                        <select id="language" name="language">
                            <option value="application/x-ejs">html</option>
                            <option value="application/x-httpd-php">php</option>
                            <option value="python">python</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary" id="exceute">Execute</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <textarea name="myEditor" id="myEditor" style="margin-left:50px;"><!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
</head>
<body>
  <h1>This is a Heading</h1>
  <p>This is a paragraph.</p>
</body>
</html></textarea></div>
                <div class="col-sm-6" id="result"></div>
            </div>
        </form>
    </div>
    <script src="<?php echo WEB_ROOT; ?>assets/vendor/jquery-3.4.1.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>/assets/js/config.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>