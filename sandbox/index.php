<?php
// ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_ERROR);
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

    switch ($errno) {
        case E_ERROR:
        case E_USER_ERROR:
        case E_CORE_ERROR:
        case E_COMPILE_ERROR:
            echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            exit(1);
            break;
        case E_PARSE:
        case E_USER_PARSE:
            echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            exit(1);
            break;

        case E_WARNING:
        case E_USER_WARNING:
        case E_CORE_WARNING:
        case E_COMPILE_WARNING:
            echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
            break;

        case E_USER_NOTICE:
        case E_NOTICE:
            echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
            break;

        default:
            echo "Unknown error type: [$errno] $errstr<br />\n";
            break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}
function shutdownHandler() {
    $lasterror = error_get_last();
    // var_dump($lasterror);
    switch ($lasterror['type']) {
        case E_ERROR:
        case E_CORE_ERROR:
        case E_COMPILE_ERROR:
        case E_USER_ERROR:
        case E_RECOVERABLE_ERROR:
        case E_CORE_WARNING:
        case E_COMPILE_WARNING:
        case E_PARSE:
            echo $lasterror['message'] .  " on line:" . $lasterror['line'];
            // mylog($error, "fatal");
    }
    exit;
}
set_error_handler("myErrorHandler");
register_shutdown_function("shutdownHandler");
// $temp = fopen($_SERVER['DOCUMENT_ROOT']."/".time().".php", "a");
// $temp = tmpfile();
// var_dump($temp);
// fwrite($temp, "writing to tempfile");
// fseek($temp, 0);
// echo fread($temp, 1024);
// fclose($temp);
// ob_start();
// // eval("echo "This is some really fine output."");
// // $this_first_string = ob_get_clean();
// eval("echo 'This is some more fine output.';");
// $this_second_string = ob_get_contents();
// ob_end_clean();
$prefix = "<?php";
$suffix = "?>";
$editorContent = $_POST['myEditor'];
// var_dump($editorContent);
if (substr($editorContent, 0, strlen($prefix)) == $prefix) {
    $editorContent = substr($editorContent, strlen($prefix));
}
// $editorContent = substr($editorContent, 0, strpos($editorContent, "? >"));

// var_dump($editorContent);
try{
    ob_start();
    eval($editorContent);
    $this_string = ob_get_contents();
    ob_end_clean();
    echo $this_string;
} catch (Exception $e) {
    echo $e->getMessage();
}


?>