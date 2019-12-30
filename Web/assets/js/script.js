function getParamValue(paramName)
{
    var url = window.location.search.substring(1); //get rid of "?" in querystring
    var qArray = url.split('&'); //get key-value pairs
    for (var i = 0; i < qArray.length; i++) 
    {
        var pArr = qArray[i].split('='); //split key and value
        if (pArr[0] == paramName) 
            return pArr[1]; //return value
    }
}
$(function(){
    var lang = getParamValue('lang');
    langFromIFrame = $('#language option:contains('+lang+')').val();
    $('#language option[value="' + langFromIFrame + '"]').attr('selected',true);
    $("#myEditor").val(decodeURI(getParamValue('content')))
    if(lang !='' && lang !== 'undefined'){
        $('.container').removeClass( "container" )
    }

    var myTextArea = document.getElementById("myEditor");
    var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: true,
        matchBrackets: true,
        mode: $('#language option:selected').val(),
        indentUnit: 2,
        indentWithTabs: true
    });
    $('#language').on('change', function() {
        myCodeMirror.setOption("mode", this.value );
    });
    $("#my_form").submit(function(event){
        event.preventDefault();
        // Using a local server
        $lang = $('#language option:selected').text();
        $endpoint = config[$lang]['endpoint'];
        var post_url = $endpoint + "sandbox/";
        // post_url += $lang=='python'?'process':'';
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission
        // console.log(form_data); return;

        if($lang ==="html"){
            $("#result").html($("#myEditor").val());
        } else {
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data,
            }).done(function(response){ //
                $("#result").html(response);
            });
        }
    });
});
autosize($('textarea'));