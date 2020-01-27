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
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:1%">1%</div>
                </div>
                HTML is a markup language for buiding pages on the web.
                <ul>
                    <li>The acronym HTML stands for HyperText Markup Language</li>
                    <li>HTML has <em>"elements"</em> they look like this...&lt;b&gt; </li>
                    <li>The elements are called <b><em>tags</em></b> </li>
                </ul>
                <h2>A simple example</h2>
                <div class="row">
                    <div class="col-sm-12 code-display">
<pre class="prettyprint lang-html linenums">
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;title&gt;My Site Title&lt;/title&gt;
&lt;body&gt;
  &lt;h2&gt;My Site Heading&lt;/h2&gt;
  &lt;p&gt;A nice paragraph&lt;/p&gt;
  &lt;b&gt;<b>Some bold text</b>&lt;/b&gt;
&lt;/body&gt;
&lt;/html&gt;
</pre>
<a class="btn btn-primary" href="javascript:;" id="tryOutHTML" data-toggle="modal" data-target="#exampleModalCenter"
  data-lang="html" data-node="endpoint" data-content="Web/?lang=html&content=<!DOCTYPE html>%0A<html>%0A<title>My Site Title</title>%0A<body>%0A  <h2>My Site Heading</h2>%0A  <p>A nice paragraph</p>%0A  <b>Some bold text</b>%0A</body>%0A</html>" >Try it out</a>
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