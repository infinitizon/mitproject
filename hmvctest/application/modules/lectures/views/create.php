<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create/Edit lecture</h4>
            <div class="row">
                <div class="alert alert-dismissible hide fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong><span class="message"></span>
                </div>
            </div>
            <div class="basic-form">
                <form name="lecture" id="lecture">
                <?php              
                    $this->load->model('Common');
                    $this->Common->setTable('cms');
                    $courses = $this->Common->get_where(['is_course'=>1]) ;
                    echo isset($lecture->r_k)? "<input type='hidden' name='r_k' value='$lecture->r_k' />":'';
                ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Choose Course</label>
                <select  class="form-control" id="course" name='course'>
                    <?php
                    if($courses->num_rows() > 0){
                        foreach($courses->result() as $row){
                            echo "<option data-link='$row->link' value='".$row->r_k."'".($lecture->par_id == $row->r_k?'selected="selected"':'').">".$row->menu_name."</option>";
                        }
                    }
                    ?>
                </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>lecture Name</label>
                            <input type="text" class="form-control" placeholder="Enter a lecture name"
                                name="menu_name" id="menu_name" value="<?php echo isset($lecture->menu_name) ? $lecture->menu_name : '' ?>" />
                            <span class="error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Base link for the lecture</label>
                            <input type="text" class="form-control" placeholder="A link for lecture, e.g. html"
                                name="link" id="link" value="<?php echo isset($lecture->link) ? substr($lecture->link, strrpos($lecture->link, '/') + 1) : '' ?>" />
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Content</label>
                            <span class="error text-danger"></span>
                            <div class="summernote" id="content">
                                <?php echo isset($lecture->content) ? $lecture->content : '' ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark"><?php echo $lecture->r_k?"Update":"Create"; ?></button>
                </form>
            </div>
        </div>
    </div>
</div>