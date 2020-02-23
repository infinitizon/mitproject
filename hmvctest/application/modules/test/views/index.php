<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php
            // echo $content['message']['content']? $content['message']['content'] : 'Nothing';
            // echo $this->router->class;
            // echo $this->router->method;
            // echo $content->message->content ;
            if($content->success) {
                echo $content->message->content; 
            }
            ?>
        </div>
    </div>
</div>