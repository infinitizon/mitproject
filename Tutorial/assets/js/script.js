$(function(){
    $("#tryOutHTML").click(function () { 
        $("#frame").attr("src", "http://localhost:81/Mitproject/Web/?lang=php&content=<?php%0Aecho 'Hello';");
    });
});