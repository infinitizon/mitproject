<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php
            if($content->success) {
                echo $content->message->content; 
            }
            ?>
        </div>
    </div>
</div>