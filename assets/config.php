<?php
$C = [
    'WEB_ROOT' => "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['HTTP_HOST'].'/',
    'TUTORIAL_ROOT' => "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['HTTP_HOST']."/tutorial2",
];
foreach($C as $key => $val){
    define($key, $val);
}
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";