<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>
            <div class="row">
                <?php echo anchor('users','<i title="Back to Users" class="fas fa-3x fa-long-arrow-alt-left"></i>'); ?>
                
            </div>
            <?php
		if($this->input->post()){
            ?>
            <div class="row">
                <div class="alert alert-<?php echo validation_errors()?'danger':'success' ?> alert-dismissible show fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo validation_errors()?'Error!':'Succss' ?></strong><span class="message"><?php echo validation_errors(); ?></span>
                </div>
            </div>
            <?php
        }?>
            <div class="basic-form">
                <form id="user" action="<?php echo base_url().'users/edit' ?>" method="post">
                
                <?php
                    echo isset($user) && $user->r_k ? '<input type="hidden" name="r_k" value="'.$user->r_k.'">' : '';
                    echo isset($user) && $user->ut_r_k ? '<input type="hidden" name="ut_r_k" value="'.$user->ut_r_k.'">' : '';
                    
                    $this->db->select('l.r_k,l.val_dsc')
                        ->from('t_wb_lov l')
                        ->where('l.def_id','USR-TP');
                    $user_types = $this->db->get();
                ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                value="<?php echo isset($user) && $user->email ? $user->email : '' ?>">
                            <span class="error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Role</label>
                            <select  class="form-control" id="user_type" name='user_type'>
                                <?php
                                if($user_types->num_rows() > 0){
                                    foreach($user_types->result() as $user_type){
                                        echo "<option value='".$user_type->r_k."' ".(isset($user) && $user_type->r_k == $user->l_r_k?'selected="selected"':'')." >".$user_type->val_dsc."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Reset Password</label>
                            <a href="javascript:;" id="reset" class="btn btn-sm btn-info text-white">Generate new password </a>
                            <input type="text" class="form-control" name="password" id="password" placeholder="password" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <label class="switch-light switch-ios MCMA" style="width: 100px">
                                <input type="checkbox" name="active" 
                                    <?php echo isset($user) && $user->active==1 ? 'checked="checked"' : '' ?>/>
                                <span><span>Inactive</span><span>Active</span><a></a></span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark"><?php echo isset($user) && $user->r_k ?'Update':'Create'?></button>

                </form>
            </div>
        </div>
    </div>
</div>