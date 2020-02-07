<?php
require_once('../assets/config.php');
$styles = [
    "https://use.fontawesome.com/releases/v5.5.0/css/all.css",
  TUTORIAL_ROOT."/assets/css/style.css",
];
$scripts = [
    TUTORIAL_ROOT."/assets/plugins/common/common.min.js",
    TUTORIAL_ROOT."/assets/js/custom.min.js",
    TUTORIAL_ROOT."/assets/js/settings.js",
    TUTORIAL_ROOT."/assets/js/gleek.js",
    TUTORIAL_ROOT."/assets/js/styleSwitcher.js",
];
$config = ['title'=>"Login", 'stretch_height'=> true];
require_once('assets/header.php');
?>


<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="index.html"> <h4>Infinitizon</h4></a>
                            <form class="mt-5 mb-5 login-input">
                                <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"  placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" required>
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign in</button>
                            </form>
                                <p class="mt-5 login-form__footer">Have account <a href="login.php" class="text-primary">Sign Up </a> now</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once('assets/footer.php');
?>