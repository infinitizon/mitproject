<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php 
                if($question->question_order != 0){
            ?>
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
            <?php
                }
            ?>
            <form id="saveAndContinue" method="post" action="<?php echo base_url().'cbt/next/'.$quiz_r_k ?>">
                <input type="hidden" class="form-control" name="optionType" value="<?php echo $question->optionType; ?>">
                <input type="hidden" class="form-control" name="quiz_attempt" value="<?php echo $quiz_attempt; ?>">
            <?php
                if($question->question_order != 0){
                    // echo '<input type="hidden" name="quiz_r_k" value="'.$quiz_r_k.'">';
                    if($question->optionType =='MCSA' || $question->optionType =='MCMA') {
                        echo '<input type="hidden" name="optionType" value="'.$question->optionType.'">';
                        for($i=1; $i<= count($question->answers); $i++ ) {
                        ?>
                        <div class="row <?php echo $question->optionType ?>">
                        <?php
                            echo "<input type='hidden' name='qst_ans' value='".json_encode($question->answers[$i-1])."' >";
                        ?>
                            <div class="col-sm-12" style="margin-top: 10px;">
                                <span class="options"><?php echo $i; ?>.) <br /> </span>
                                <?php if($question->optionType == 'MCMA') { ?>
                                    <label class="switch-light switch-ios MCMA" style="width: 100px">
                                        <input type="checkbox" name="atmt_ans_gvn"
                                            <?php echo isset($question->answers[$i-1]->atmt_ans_gvn) ? 
                                                ($question->answers[$i-1]->atmt_ans_gvn=='true'?' checked="checked" ':'') :
                                                    ''; 
                                                echo ((isset($quiz_completed) && $quiz_completed == 'true')? ' disabled="disabled" ' :'') 
                                            ?> />
                                        <span><span>Wrong</span><span>Correct</span><a></a></span>
                                    </label>
                                <?php } else { ?>
                                    <label class="switch switch-sm MCSA">
                                        <input type="radio" name="atmt_ans_gvn" 
                                            <?php echo isset($question->answers[$i-1]->atmt_ans_gvn) ? 
                                                    ($question->answers[$i-1]->atmt_ans_gvn=='true'?' checked="checked" ':'') :
                                                        ''; 
                                                echo ((isset($quiz_completed) && $quiz_completed == 'true')? ' disabled="disabled" ' :'') 
                                            ?> />
                                        <span><i class="handle"></i></span>
                                    </label>
                                <?php } ?>
                                <span class="options"><?php echo $question->answers[$i-1]->exm_qst_ans ?></span>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    echo '<input type="hidden" class="form-control" name="questions_r_k" value="'.$question->r_k.'">';
                }
                echo '<input type="hidden" name="question_count" value="'.$question_count.'">';
                echo '<input type="hidden" name="question_order" value="'.($question->question_order+1).'">';
                echo '<input type="hidden" name="answers">';
                echo '<input type="hidden" name="attempt_answer" value="'.$question->attempt_answer.'">';
                
                if((isset($quiz_completed) && $quiz_completed == 'true') || $question->question_order==$question_count) {
                    echo '<input type="hidden" name="quiz_completed" value="true">';
                }
                if($question->question_order>=2) {
                    echo '<a href="javascript:;" class="btn btn-primary text-white" id="previous">Previous</a>';
                }
                if($question->question_order == 0){
                    echo "<h3>You have completed quiz</h3>";
                    echo "<h5>Your score is {$quiz_summary->totalScore}/{$quiz_summary->totalPassScore}</h5>";
                }
                if((isset($quiz_completed) && $quiz_completed == 'true' && $question->question_order!=$question_count) || !isset($quiz_completed)) {
            ?>
                
                <a href="javascript:;" class="btn btn-<?php echo $question->question_order==$question_count?'info submit':'primary' ?>" id="next">
                    <?php echo $question->question_order==$question_count?'Submit':($question->question_order == 0?'View Answers':'Next')?>
                </a>
                <?php 
                } 
            ?>
            </form>
        </div>
    </div>
</div>