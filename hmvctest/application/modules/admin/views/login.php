<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <img src="<?php echo webroot_url(); ?>/assets/images/chd-logo-3.png" class="rounded mx-auto d-block" width="70%">
                                </a>
        
                                <?php
                    if (isset($result)) {
                        ?>
                        <div
                            class="alert alert-dismissible fade in <?php echo ($result['success']) ? 'alert-success' : 'alert-danger' ?>">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo (!$result['success']) ? 'Error!' : 'Success!' ?></strong> <?php echo $result['message'] ?>
                        </div>
                        <?php
                    }
                    ?>
                                <form class="mt-5 mb-5 login-input" action="<?php echo base_url(); ?>admin/p_login/login" method='post' name='process'>
                                    <div class="form-group">
                                        <label class="sr-only" for="username">Username</label>
                                        <input type="email" name="username" class="form-control" placeholder="Email">
                                        <span class="text-danger"><?php echo form_error('username') ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <span class="text-danger"><?php echo form_error('password') ?></span>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="<?php echo base_url() ?>admin/register" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>