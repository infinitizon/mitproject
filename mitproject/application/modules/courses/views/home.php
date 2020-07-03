
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">
                        <?php echo anchor('courses/create','<i class="far fa-plus-square fa-2x float-right text-primary"></i>'); ?>Custom content </h4>
                </div>
                <div class="basic-list-group">
                    <div class="list-group">
<?php
if ($courses->num_rows() > 0) {
    foreach($courses->result() as $course) {
    ?>
        <a href="<?php echo base_url()."courses/create/".$course->r_k; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $course->menu_name; ?></h5><small>created <?php echo $course->create_date; ?></small>
            </div>
            <p class="mb-1"><?php echo $course->content ?>.</p><small>Click to edit.</small>
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