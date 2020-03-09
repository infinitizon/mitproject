<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New Question</h4>
            <div class="basic-form">
                <form name="question" id="question">
                    <input type="hidden" name="isQuestion" value="true">
                    <input type="hidden" name="questionType" value="<?php echo $this->input->post('questionType'); ?>">
                    <input type="hidden" name="optionType" value="<?php echo $this->input->post('optionType'); ?>">
                    <input type="hidden" name="noOfOptions" value="<?php echo $this->input->post('noOfOptions'); ?>">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Question</label>
                            <span class="error text-danger"></span>
                            <div class="summernote question" id="content">
                                <?php echo isset($result)?$result->question:''; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        echo isset($result) ? "<input type='hidden' name='r_k' value='$result->r_k' />":'';
// var_dump($result->answers);
                        for($i=1; $i<=$this->input->post('noOfOptions'); $i++ ) {
                            if($this->input->post('optionType') == 'MCSA' || $this->input->post('optionType') == 'MCMA'){ 
                    ?>
                    <fieldset class="<?php echo $this->input->post('optionType'); ?>">
                        <div class="row answer">
                            <div class="col-sm-12" style="margin-top: 10px;">
                                Option <?php echo $i; ?>.) <br />Select as answer
                                <?php if($this->input->post('optionType') == 'MCMA') { ?>
                                    <label class="switch-light switch-ios MCMA" style="width: 100px">
                                        <input type="checkbox" name="exm_qst_vld"
                                            <?php echo isset($result) ? 
                                                    ($result->answers[$i-1]->exm_qst_vld=='true'?'checked="checked"':'') :
                                                     ''; ?> />
                                        <span><span>Wrong</span><span>Correct</span><a></a></span>
                                    </label>
                                <?php } else { ?>
                                    <label class="switch switch-sm MCSA">
                                        <input type="radio" name="exm_qst_vld" 
                                            <?php echo isset($result) ? 
                                                    ($result->answers[$i-1]->exm_qst_vld=='true'?'checked':'') :
                                                     ''; ?> />
                                        <span><i class="handle"></i></span>
                                    </label>
                                <?php } ?>
                                <div class="summernote noteAnswer">
                                    <?php echo isset($result) ? $result->answers[$i-1]->exm_qst_ans : ''; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <?php 
                            } elseif ($this->input->post('optionType') == 'MTC') {
                        ?>
                            <fieldset class="<?php echo $this->input->post('optionType'); ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="exm_qst_ans" placeholder="Enter an Answer"
                                                value="<?php echo isset($result) ? $result->answers[$i-1]->exm_qst_ans : ''; ?>">
                                        </div>
                                        <div class="col-sm-1 text-center">=</div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="exm_qst_vld" placeholder="Correct Match"
                                                value="<?php echo isset($result) ? $result->answers[$i-1]->exm_qst_vld : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php
                            }
                        }
                    ?>
                    <button type="submit" class="btn btn-dark">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>