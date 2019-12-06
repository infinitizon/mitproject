$(function(){
    var myTextArea = document.getElementById("myEditor");
    var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: true,
        matchBrackets: true,
        mode: $('#language option:selected').text(),
        indentUnit: 3,
        indentWithTabs: true
    });
    $('#language').on('change', function() {
        myCodeMirror.setOption("mode", this.value );
    });
    // $("#my_form").submit(function(event){
    //     event.preventDefault();
    //     var post_url = $(this).attr("action"); //get form action url
    //     var request_method = $(this).attr("method"); //get form GET/POST method
    //     var form_data = $(this).serialize(); //Encode form elements for submission
        
    //     $.ajax({
    //         url : post_url,
    //         type: request_method,
    //         data : form_data
    //     }).done(function(response){ //
    //         $("#result").html(response);
    //         console.log(response);
    //     });
    // });
    $("#my_form").submit(function(event){
        event.preventDefault();
        // using https://docs.jdoodle.com/compiler-api/
        var post_url = "https://api.jdoodle.com/v1/execute";

        // Using a local server
        $lang = $('#language option:selected').text();
        // $endpoint = $('#language option:selected').attr("data-endpoint");
        // var post_url = $endpoint + "sandbox/";
        // post_url += $lang=='python'?'process':'';
        var request_method = $(this).attr("method"); //get form GET/POST method
        // var form_data = $(this).serialize(); //Encode form elements for submission
        // console.log(form_data); return;

        var form_data = {
            script: $("#myEditor").val(),
            language: $lang,
            versionIndex: "0",
            clientId: "8a175e04ec3826d689006b13250c4f89",
            clientSecret:"434341b7301743c172062efa0254d8e8cbcdb0403a71bdce299df88c6137cb74",
        }

        $.ajax({
            url : post_url,
            type: request_method,
            data : JSON.stringify(form_data),
            contentType:"application/json;",
            dataType:"json",
        }).done(function(response){ //
            $("#result").html(response);
        });
    });
});