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
                <div class="row">
                    <div class="col-sm-7">
                        <h1>HTML</h1>
                        <h5>The major language for building web pages</h5>
                        <div class="fakeimg"><a href="#" class="btn btn-light">LEARN HTML</a></div>
                    </div>
                    <div class="col-sm-5 code-display">
<pre class="prettyprint lang-html linenums">
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;title&gt;HTML Tutorial&lt;/title&gt;
&lt;body&gt;
  &lt;h1&gt;Hello student&lt;/h1&gt;
&lt;/body&gt;
&lt;/html&gt;
</pre>
<a class="btn btn-primary btn-sm" href="javascript:;" id="tryOutHTML" data-toggle="modal" data-target="#exampleModalCenter">Try it out</a>
                    </div>
                </div>
              
                <div class="row">&nbsp;</div>
                <div class="row">
                  <div class="col-sm-6 code-display">
<pre class="prettyprint lang-css linenums">
body {
  background-color: lightblue;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
</pre>
                  </div>
                    <div class="col-sm-6">
                        <h1>CSS</h1>
                        <h5>This helps us to make our sites beautiful</h5>
                        <div class="fakeimg"><a href="#" class="btn btn-light">LEARN CSS</a></div>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row bg-secondary">
                  <div class="col-sm-12">
                    <div class="row m-5">
                      <div class="col-sm-6">
                        <div class="card text-center bg-light">
                          <div class="card-body">
                            <h2>PHP</h2>
                            <h6 class="card-subtitle mb-2 text-muted">A server side programming language</h6>
                            <a href="#" class="btn btn-secondary mt-5">LEARN PHP</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="card text-center bg-light">
                          <div class="card-body">
                            <h2>Python</h2>
                            <h6 class="card-subtitle mb-2 text-muted">A programming language</h6>
                            <a href="#" class="btn btn-secondary mt-5">LEARN PYTHON</a>
                          </div>
                        </div>
                      </div>
                    </div>
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