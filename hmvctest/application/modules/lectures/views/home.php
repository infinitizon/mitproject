<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">
                        <?php echo anchor('lectures/create','<i class="far fa-plus-square fa-2x float-right text-primary"></i>'); ?>
                        Lectures 
                    </h4>
                </div>
                <div class="basic-list-group">
                    <div class="list-group">
                        <?php
                        if ($lectures->num_rows() > 0) {
                            foreach($lectures->result() as $lecture) {
                            ?>
                                <a href="<?php echo base_url()."lectures/create/".$lecture->r_k; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $lecture->menu_name; ?></h5><small>created <?php echo $lecture->create_date; ?></small>
                                    </div>
                                    <small>Click to edit.</small>
                                    <span class="action-buttons">
                                        <i class="fas fa-minus-circle"></i>
                                    </span>
                                </a>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>