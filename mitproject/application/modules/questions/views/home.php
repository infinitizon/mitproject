<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">
                        <?php echo anchor('questions/create','<i class="far fa-plus-square fa-2x float-right text-primary"></i>'); ?>
                        Question Bank 
                    </h4>
                </div>
                <div class="basic-list-group">
                    <div class="list-group">
                        <?php
                        if ($questions->num_rows() > 0) {
                            foreach($questions->result() as $question) {
                            ?>
                                <a href="<?php echo base_url()."questions/edit/".$question->r_k; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $question->question; ?></h5><small>created <?php echo $question->create_date; ?></small>
                                    </div>
                                    <small><?php echo $question->val_dsc; ?></small>
                                </a>
                            <?php
                            }
                        } else {
                        ?>
                        <h3 class="text-center">No questions have been entered yet</h3>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>