<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add question to quiz: <?php echo $quiz->quiz_name ?> </h4>
            
            <div class="table-responsive">
                <?php echo anchor('quiz/create/'.$quiz->r_k, '<< Back to quiz', array('class' => 'btn btn-secondary')); ?>

                <form name="addToQuiz" id="addToQuiz" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th><th>Question</th><th>Question Type</th><th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <input type='hidden' name='users_r_k' value="<?php echo $this->session->userdata('logged_in')->r_k ?>" />
                            <input type='hidden' name='quiz_r_k' value="<?php echo $quiz->r_k; ?>" />
                            <?php
                            if ($questions->num_rows() > 0) {
                                foreach($questions->result() as $key => $question) {
                                ?>
                                <tr>
                                    <th><?php echo ++$key; ?></th>
                                    <td><?php echo $question->question; ?></td>
                                    <td><?php echo $question->val_dsc; ?></td>
                                    <td>
                                        <button class="btn btn-primary add" data-question="<?php echo $question->r_k; ?>" <?php echo $question->quiz_questions ? 'disabled="disabled"' : '' ?>>
                                            <?php echo $question->quiz_questions ? 'Added' : 'Add' ?>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr><td colspan="4"><h3 class="text-center">No questions in system yet</h3></td></tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>