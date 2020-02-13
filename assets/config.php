<?php
$C = [
    'WEB_ROOT' => "http://localhost:{$_SERVER['SERVER_PORT']}/Mitproject",
    'TUTORIAL_ROOT' => "http://localhost:{$_SERVER['SERVER_PORT']}/Mitproject/tutorial2",
];
foreach($C as $key => $val){
    define($key, $val);
}
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";