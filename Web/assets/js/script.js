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
        var post_url = $(this).attr("action") + $('#language option:selected').text() + "sandbox/"; //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission
        // console.log(form_data); return;

        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data
        }).done(function(response){ //
            $("#result").html(response);
        });
    });
});