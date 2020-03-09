<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4 class="card-title">Attempt Quiz</h4>
            </div>
            
            <div data-ng-if="!qdCtrl.start">
                <div class="row">
                    <div class="col-sm-12">
                        Question No. <?php echo $question->question_order ?> 
                    </div>
                </div>
                <div class="row"><div class="col-sm-12">&nbsp;</div></div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $question->question ?> 
                    </div>
                </div>
            </div>
            <form id="saveAndContinue" method="post" action="<?php echo base_url().'cbt/next/'.$quiz_r_k ?>">
            <input type="hidden" class="form-control" name="optionType" value="<?php echo $question->val_id; ?>">
            <input type="hidden" class="form-control" name="questions_r_k" value="<?php echo $question->r_k; ?>">
            <input type="hidden" class="form-control" name="quiz_attempt" value="<?php echo $quiz_attempt; ?>">
            <?php
                // echo '<input type="hidden" name="quiz_r_k" value="'.$quiz_r_k.'">';
                if($question->val_id =='MCSA' || $question->val_id =='MCMA') {
                    echo '<input type="hidden" name="optionType" value="'.$question->val_id.'">';
                    for($i=1; $i<= count($question->answers); $i++ ) {
                    ?>
                    <div class="row <?php echo $question->val_id ?>">
                    <?php
                        echo "<input type='hidden' name='qst_ans' value='".json_encode($question->answers[$i-1])."' >";
                    ?>
                        <div class="col-sm-12" style="margin-top: 10px;">
                            <span class="options"><?php echo $i; ?>.) <br /> </span>
                            <?php if($question->val_id == 'MCMA') { ?>
                                <label class="switch-light switch-ios MCMA" style="width: 100px">
                                    <input type="checkbox" name="atmt_ans_gvn"
                                        <?php echo isset($question->answers[$i-1]->atmt_ans_gvn) ? 
                                            ($question->answers[$i-1]->atmt_ans_gvn=='true'?'checked="checked"':'') :
                                                ''; ?> />
                                    <span><span>Wrong</span><span>Correct</span><a></a></span>
                                </label>
                            <?php } else { ?>
                                <label class="switch switch-sm MCSA">
                                    <input type="radio" name="atmt_ans_gvn" 
                                        <?php echo isset($question->answers[$i-1]->atmt_ans_gvn) ? 
                                                ($question->answers[$i-1]->atmt_ans_gvn=='true'?'checked':'') :
                                                    ''; ?> />
                                    <span><i class="handle"></i></span>
                                </label>
                            <?php } ?>
                            <span class="options"><?php echo $question->answers[$i-1]->exm_qst_ans ?></span>
                        </div>
                    </div>
                <?php
                    }
                }
                echo '<input type="hidden" name="question_order" value="'.($question->question_order+1).'">';
                echo '<input type="hidden" name="answers">';
            ?>
            <input class="btn btn-success" type="submit" value="Save and Continue ">
            </form>
        </div>
    </div>
</div>