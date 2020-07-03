<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Question</h4>
            <div class="row">
                <div class="alert alert-dismissible hide fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong><span class="message">
                    <?php echo validation_errors(); ?>
                    </span>
                </div>
            </div>
            <div class="basic-form">
                <form name="preQuestion" id="preQuestion" method="post">
                <?php  
                    $this->db->select('l.r_k, l.val_id, l.val_dsc')->from('t_wb_lov l');
                    $this->db->where("l.def_id LIKE '%QST-TP%'");
                    $questionTypes = $this->db->get();
                    // echo isset($lecture->r_k)? "<input type='hidden' name='r_k' value='$lecture->r_k' />":'';
                ?>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Choose Question Type <span class="text-danger"><?php echo form_error('questionType') ?></span></label>
                            <select  class="form-control" id="questionType" name='questionType'>
                                <?php
                                if($questionTypes->num_rows() > 0){
                                    foreach($questionTypes->result() as $row){
                                        echo "<option data-type='$row->val_id' value='".$row->r_k."'>".$row->val_dsc."</option>";
                                    }
                                }
                                ?>
                            </select>
                            <input type='hidden' name='optionType' id="optionType" />
                        </div>
                    </div>
                    <div class="form-row noOfOptions">
                        <div class="form-group col-md-8">
                            <label>Number of Options <span class="text-danger"><?php echo form_error('noOfOptions') ?></span></label>
                            <input type="text" class="form-control" placeholder="Enter the number of options "
                                name="noOfOptions" id="noOfOptions" 
                                value="<?php echo array_key_exists("noOfOptions",$_POST)?$this->input->post('noOfOptions'):4; ?>" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark next">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>