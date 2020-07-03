
$(function(){
    $("#tryOutHTML").click(function () {
        $lang = $(this).attr("data-lang");
        $node = $(this).attr("data-node");
        $content = $(this).attr("data-content");
        $("#frame").attr("src", config[$lang][$node]+$content);
    });
    
    $('a[data-quiz]').on('click', function() {
        $("#frame").attr("src",config['webroot']['endpoint']+"mitproject/cbt/quiz/"+$(this).data('quiz'));
    })
});