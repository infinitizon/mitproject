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
                    <hr>
                    <p><h3>Step 1 (open an editor)</h3></p>
                    <p><b>On Windows</b></p>
                    <p>Open the start screen and search for notepad</p>
                    <p><b>On Mac</b></p>
                    <p>Open Start > Programs > Accessories > Notepad</p>
                    <hr>
                    <p><h3>Step 2 (Write your html code)</h3></p>
                    <p>Write (don't copy. It is better you write) the code below</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 code-display">
<pre class="lang-html">
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;title&gt;My Site Title&lt;/title&gt;
&lt;body&gt;
  &lt;h2&gt;My Site Heading&lt;/h2&gt;
  &lt;p&gt;A nice paragraph&lt;/p&gt;
  &lt;b&gt;<b>Some bold text</b>&lt;/b&gt;
&lt;/body&gt;
&lt;/html&gt;
</pre></div></div>
                <div class="row">
                    <div class="col-sm-12">
                    <hr>
                    <p><h3>Save the file as HTML</h3></p>
                    <p>Save the file to your computer by selecting <b>File > Save as</b> and giving it a name of your choice. Here we use <b>index.html</b> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <p><h3>View it in your browser</h3></p>
                        <p>Open the file you just saved in your favourite browser. The result should look like this:</p>
                        <img src="<?php echo WEB_ROOT."tutorial/assets/images/myPage.png" ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <p><h3>Our Online Editor</h3></p>
                        <p>Like we said previously, we would be using our online editor. So Let us run that code in our editor. 
                            <a class="btn btn-primary" href="javascript:;" id="tryOutHTML" data-toggle="modal" data-target="#exampleModalCenter"
                            data-lang="html" data-node="endpoint" data-content="Web/?lang=html&url=http://localhost&content=<!DOCTYPE html>%0A<html>%0A<title>My Site Title</title>%0A<body>%0A  <h2>My Site Heading</h2>%0A  <p>A nice paragraph</p>%0A  <b>Some bold text</b>%0A</body>%0A</html>" >Try it out</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?php echo WEB_ROOT."tutorial/html/editor.php" ?>" class="btn btn-sm btn-primary">Editor &nbsp;&nbsp;&nbsp;<<= Previous</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?php echo WEB_ROOT."tutorial/html/quiz.php" ?>" class="btn btn-sm btn-primary float-right">Next =>> &nbsp;&nbsp;&nbsp;Quiz:</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">&nbsp;</div>
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