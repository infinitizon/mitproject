<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <?php echo $quiz?'Edit Quiz':'Create Quiz' ?>
            </h4>
            <div class="row">
                <div class="alert alert-dismissible hide fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong><span class="message">
                        <?php echo validation_errors(); ?>
                    </span>
                </div>
            </div>
            <div class="basic-form">
                <form name="quiz" id="quiz" method="post">
                    <?php echo $quiz?'<input type="hidden" name="r_k" value="'.$quiz->r_k.'" />':'' ?>
                    <input type='hidden' name='users_r_k' value="<?php echo $this->session->userdata('logged_in')->r_k ?>" />
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Quiz Name <span class="error text-danger"></span></label>
                            <input type="text" name="quiz_name" id="quiz_name"  class="form-control" placeholder="Give quiz a name" value="<?php echo $quiz?$quiz->quiz_name:'' ?>" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <span class="error text-danger"></span>
                            <div class="summernote description" id="content"><?php echo $quiz?$quiz->description:'' ?></div>
                        </div>
                    </div>
                    <div class="row form-material">
                        <div class="col-md-12">
                            <a href="javascript:;" data-toggle="collapse" data-target="#advanceOptions">Advance options</a>
                        </div>
                        <div id="advanceOptions" class="collapse col-md-12">
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <label class="m-t-40">Start Date (Quiz can be attempted after this date. YYYY-MM-DD HH:II:SS)</label>
                                    <input type="text" name="start_date" class="form-control min-date" placeholder="e.g 2020-02-29 18:05:51" value="<?php echo $quiz?date("Y-m-d H:i:s",strtotime($quiz->start_date)):date("Y-m-d H:i:s"); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="m-t-40">End Date (eg. YYYY-MM-DD HH:II:SS)</label>
                                    <input type="text" name="end_date" class="form-control min-date" placeholder="2020-02-29 18:05:51" value="<?php echo $quiz?date("Y-m-d H:i:s", strtotime($quiz->end_date)):date("Y-m-d H:i:s", strtotime('+1 year')); ?>">
                                </div>
                            </div>
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <label class="m-t-40">Duration (in min.)</label>
                                    <input type="number" name="duration" class="form-control" value="<?php echo $quiz?$quiz->duration:10 ?>" placeholder="Duration (in min.). 0 means no limit">
                                </div>
                                <div class="col-md-6">
                                    <label class="m-t-40">Allow Maximum Attempts</label>
                                    <input type="number" name="max_attempts" class="form-control" value="<?php echo $quiz?$quiz->max_attempts:10 ?>" placeholder="Allow Maximum Attempts. 0 means no limit">
                                </div>
                            </div>
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <label class="m-t-40">Minimum Percentage Required to Pass</label>
                                    <input type="number" name="min_pass_pct" class="form-control" value="<?php echo $quiz?$quiz->min_pass_pct:50 ?>" placeholder="Minimum Percentage Required to Pass">
                                </div>
                            </div>
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <label class="m-t-40">Correct Score</label>
                                    <input type="text" name="correct_scr" class="form-control" value="<?php echo $quiz?$quiz->correct_scr:1 ?>" placeholder="Correct Score">
                                </div>
                                <div class="col-md-6">
                                    <label class="m-t-40">InCorrect Score</label>
                                    <input type="text" name="incorrect_scr" class="form-control" value="<?php echo $quiz?$quiz->incorrect_scr:0 ?>" placeholder="InCorrect Score">
                                </div>
                            </div>
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <label class="m-t-40">Allowed ip address to attempt this quiz. To allow any, leave empty.</label>
                                    <input type="text" name="allowed_ip" class="form-control" value="<?php echo $quiz?$quiz->allowed_ip:'' ?>" placeholder="Allowed ip address to attempt this quiz. To allow any, leave empty.">
                                </div>
                            </div>
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <label class="m-t-40">Allow to view correct answers after submitting quiz</label>
                                    <label class="switch-light switch-ios MCMA" style="width: 100px">
                                        <input type="checkbox" name="view_ans_after" <?php echo $quiz?($quiz->view_ans_after==1?'checked="checked"':''):'checked="checked"' ?> />
                                        <span><span>No</span><span>Yes</span><a></a></span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="m-t-40">Open Quiz - can be attempted without login?*</label>
                                    <label class="switch-light switch-ios MCMA" style="width: 100px">
                                        <input type="checkbox"name="open_quiz" <?php echo $quiz?($quiz->open_quiz==1?'checked="checked"':''):'' ?> />
                                        <span><span>No</span><span>Yes</span><a></a></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <div class="table-responsive">
                            <?php 
                                if ($quiz_questions->num_rows() > 0) {
                                ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th><th>Question</th><th>Question Type</th><th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($quiz_questions->result() as $key => $question) {
                                            ?>
                                            <tr>
                                                <th><?php echo $key+1; ?></th>
                                                <td><?php echo $question->question; ?></td>
                                                <td><?php echo $question->val_dsc; ?></td>
                                                <td>
                                                    <?php echo $key!=0? '<i class="fa fa-2x cursor-pointer changeOrder fa-arrow-up text-green"></i>' : ''; ?> &nbsp;
                                                    <?php echo $key!=$quiz_questions->num_rows()-1? '<i class="fa fa-2x cursor-pointer changeOrder fa-arrow-down text-warning"></i>' : ''; ?>
                                                    <i class="fa fa-2x cursor-pointer fa-minus-circle text-danger" data-r_k="<?php echo $question->quiz_questions; ?>"></i> &nbsp;
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark next">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>