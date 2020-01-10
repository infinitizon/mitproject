
$(function(){
    $("#tryOutHTML").click(function () { 
        $("#frame").attr("src", config['php']['endpoint']+"Web/?lang=html&content=<!DOCTYPE html>%0A<html>%0A<title>HTML Tutorial</title>%0A<body>%0A  <h1>Hello student</h1>%0A</body>%0A</html>");
    });
});