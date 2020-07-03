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
                <form name="lecture">
                <?php              
                    $this->load->model('Common');
                    $this->Common->setTable('cms');
                    $courses = $this->Common->get_where(['record_type'=>20200139]) ;
                    // Get quizes in the system
                    $this->db->select('q.r_k,q.quiz_name')
                        ->from('quiz q');
                    $quizzes = $this->db->get();
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
                            <label>Base link for the lecture</label>
                            <input type="text" class="form-control" placeholder="A link for lecture, e.g. html"
                                name="link" id="link" value="<?php echo isset($lecture->link) ? substr($lecture->link, strrpos($lecture->link, '/') + 1) : '' ?>" />
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Lecture Type</label>
                            <span id="record_type" class="d-none">
                                <?php echo isset($lecture->record_type) ? $lecture->record_type : '' ?>
                            </span>

                            <label class="switch-light switch-ios" style="width: 100px">
                                <input type="checkbox" id="lectureType" name="record_type" />
                                <span><span>Lecture</span><span>Quiz</span><a></a></span>
                            </label>
                        </div>
                        <div class="form-group col-md-4">
                            <div id="quiz">
                                <label>Quiz Name</label>
                                <select  class="form-control" name='menu_name'>
                                    <?php
                                    if($quizzes->num_rows() > 0){
                                        foreach($quizzes->result() as $quiz){
                                            echo "<option value='".$quiz->r_k."'>".$quiz->quiz_name."</option>";
                                        }
                                    } else {
                                        echo "<option value='' disabled selected>No Quiz in System</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="lecture">
                                <label>lecture Name</label>
                                <input type="text" class="form-control" placeholder="Enter a lecture name"
                                    name="menu_name" id="menu_name" value="<?php echo isset($lecture->menu_name) ? $lecture->menu_name : '' ?>" />
                                <span class="error text-danger"></span>
                            </div>
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