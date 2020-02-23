
$(function(){
    $("#tryOutHTML").click(function () {
        $lang = $(this).attr("data-lang");
        $node = $(this).attr("data-node");
        $content = $(this).attr("data-content");
// console.log(config); return;
        $("#frame").attr("src", config[$lang][$node]+$content);
    });
});