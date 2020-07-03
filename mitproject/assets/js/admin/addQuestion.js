$(function () {
    $('.add').on('click', function (e) {
        e.preventDefault();
        unindexed_array=$(this).parents('form').serializeArray();
        var data = {};
        $.map(unindexed_array, function(n){
            data[n['name']] = n['value'];
        });
        data['questions_r_k'] =$(this).attr('data-question');

        $clicked = $(this);
        $.ajax({
            type: "POST",
            url: config['webroot']['endpoint']+"mitproject/quiz/addToQuiz",
            data: data,
            success: function(result){                        
                try{        
                    $result = JSON.parse(result)
                    if($result.success){
                        $clicked.html($result.message).attr('disabled', 'disabled');
                    }else{
                        $spanMessage = $('div.alert').addClass('alert-danger show').find('strong').html('Error! ').parent().find('span.message');
                    }
                }catch(e) {     
                    alert('Exception while processing request...');
                }       
            },
            error: function(){                      
               alert('Error while request..');
            }
        });
    });
});