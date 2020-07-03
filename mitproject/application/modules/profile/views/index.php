<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Myy Profile</h4>
            <div class="row">
                <div class="alert alert-dismissible hide fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong><span class="message"></span>
                </div>
            </div>
            <div class="basic-form">
                <form id="profile" action="<?php echo base_url().'profile' ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user->email; ?>">
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Current Password</label>
                            <div><small>To change your password, enter you old password, then your preferred password</small></div>
                            <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Enter Current Password">
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Preferred Password</label>
                            <input type="password" class="form-control" name="npass" id="npass" placeholder="Enter Preferred Password">
                            <span class="error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Preferred Password Again</label>
                            <input type="password" class="form-control" name="npassAgain" id="npassAgain" placeholder="Enter Preferred Password Again">
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>