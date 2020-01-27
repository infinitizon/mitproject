
$(function(){
    $("#tryOutHTML").click(function () {
        $lang = $(this).attr("data-lang");
        $node = $(this).attr("data-node");
        $content = $(this).attr("data-content");

        console.log($lang);
        console.log($node);
        console.log($content);
        console.log(config[$lang][$node]+$content);
        $("#frame").attr("src", config[$lang][$node]+$content);
    });
});