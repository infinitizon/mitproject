<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>Users</h4>
                <div class="row">
                    <?php echo anchor('users/edit','<i class="fas fa-2x fa-user-plus"></i>'); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Email</th><th>Active</th><th>Role</th><th>Actions</th>
                    </tr>
                    <?php
                        if($users->success && count($users->message)>0){
                            foreach($users->message as $user){
                                ?>
                                <tr>
                                    <td><?php echo $user->email ?></td>
                                    <td><?php echo $user->active==1?'Active':'Inactive' ?></td>
                                    <td><?php echo $user->val_dsc ?></td>
                                    <td><?php echo anchor('users/edit/'.$user->r_k,'<i class="far fa-2x fa-edit"></i>'); ?><td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo '<tr><td colspan="3">'.$users->message.'</td></tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>