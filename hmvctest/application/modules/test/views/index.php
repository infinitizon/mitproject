<?php
// echo $content['message']['content']? $content['message']['content'] : 'Nothing';
echo $this->router->class;
echo $this->router->method;
// echo $content->message->content ;
if($content->success) {
    echo $content->message->content; 
}
// echo "<pre>";
// var_dump($content);
// echo "</pre>";