<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4 class="card-title">Attempt Quiz</h4>
            </div>
            <div class="table-responsive">
                <form action="<?php echo base_url().'cbt/next/'.$quiz_r_k ?>" method="post">
                    <table class="table">
                        <tbody>
                            <tr><th>Quiz Name</th><td><?php echo $quiz->quiz_name ?></td></tr>
                            <tr><th>Description</th><td><?php echo $quiz->description ?></td></tr>
                            <tr>
                                <th>Start Date (Quiz can be attempted after this date. YYYY-MM-DD HH:II:SS )</th>
                                <td><?php echo $quiz->start_date ?></td>
                            </tr>
                            <tr>
                                <th>End Date (Quiz can be attempted before this date. eg. 2017-12-31 23:59:00 )</th>
                                <td><?php echo $quiz->end_date ?></td>
                            </tr>
                            <tr>
                                <th>Duration (in min.)</th><td><?php echo $quiz->duration ?></td>
                            </tr>
                            <tr>
                                <th>Allow Maximum Attempts</th><td><?php echo $quiz->max_attempts ?></td>
                            </tr>
                            <tr>
                                <th>Minimum Percentage Required to Pass</th><td><?php echo $quiz->min_pass_pct ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="question_count" value="<?php echo $quiz->question_count ?>">
                    <input type="hidden" name="question_order" value="1">
                    <input type="hidden" name="quiz_attempt" value="<?php echo $quiz->quiz_attempt ?>">
                    <button class="btn btn-primary" type="submit">Start Quiz</button>
                </form>
            </div>
        </div>
    </div>
</div>