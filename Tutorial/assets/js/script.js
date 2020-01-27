
$(function(){
    $("#tryOutHTML").click(function () {
        $lang = $(this).attr("data-lang");
        $node = $(this).attr("data-node");
        $content = $(this).attr("data-content");

        $("#frame").attr("src", config[$lang][$node]+$content);
    });
});