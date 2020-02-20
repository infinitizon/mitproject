$(function () {
    $('.icp-auto').iconpicker();
    $('form#course').on('submit', function (e) {
        e.preventDefault();
        content=$('.summernote').summernote('code');
        data=$(this).serialize()+'act=save&content='+content;
        // console.log(data);
        // return;
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: config['webroot']['endpoint']+"hmvctest/courses/create",
            data: data,
            success: function(json){                        
                try{        
                    var obj = jQuery.parseJSON(json);
                    alert( obj['STATUS']);


                }catch(e) {     
                    alert('Exception while request..');
                }       
            },
            error: function(){                      
               alert('Error while request..');
            }
        });
    });
});