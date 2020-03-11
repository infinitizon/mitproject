<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">
                        <?php echo anchor('quiz/create','<i class="far fa-plus-square fa-2x float-right text-primary"></i>'); ?>
                        Quiz 
                    </h4>
                </div>
                <div class="basic-list-group">
                    <div class="list-group">
                        <?php
                        if ($quizes->num_rows() > 0) {
                            foreach($quizes->result() as $quiz) {
                            ?>
                                <a href="<?php echo base_url()."quiz/create/".$quiz->r_k; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $quiz->quiz_name; ?></h5><small>created <?php echo $quiz->create_date; ?></small>
                                    </div>
                                    <small><?php echo $quiz->total_questions ?> question(s) added</small>
                                </a>
                            <?php
                            }
                        } else {
                        ?>
                            <h3 class="text-center">No quizes created yet</h3>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>