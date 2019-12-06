<?php
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
ob_start();
eval($editorContent);
$this_string = ob_get_contents();
ob_end_clean();
echo $this_string;
?>