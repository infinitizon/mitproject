<?php
$C = [
    'WEB_ROOT' => 'http://localhost:81/Mitproject',
    'TUTORIAL_ROOT' => 'http://localhost:81/Mitproject/tutorial2',
];
foreach($C as $key => $val){
    define($key, $val);
}
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";