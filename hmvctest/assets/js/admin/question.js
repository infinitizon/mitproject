$(function () {
    $( "#questionType").change(function() {
        var qstTpToShow = $('option:selected', this).attr('data-type');
        $("fieldset.answer-panel").removeClass("d-block").addClass("d-none")
        $("fieldset."+qstTpToShow).removeClass("d-none").removeClass("d-block")
    });
    $('form#lecture').on('submit', function (e) {
        e.preventDefault();
        content=$('.summernote').summernote('code');
        unindexed_array=$(this).serializeArray();
        var data = {};
        $.map(unindexed_array, function(n, i){
            data[n['name']] = n['value'];
        });
        data['course_name'] = $('#course option:selected').attr('data-link');
        data['content'] = content;
        // console.log(data);return;
        $.ajax({
            type: "POST",
            url: config['webroot']['endpoint']+"hmvctest/lectures/create",
            data: data,
            success: function(result){                        
                try{        
                    $result = JSON.parse(result)
                    if($result.success){
                        $('div.alert').addClass('alert-success show').find('strong').html('Success! ').parent().find('span.message').html($result.message);
                        $.each($result.fields, function(key, value) {
                            if(value) {
                                $('#' + key).removeClass('is-invalid');
                                $('#' + key).parents('.form-group').find('.error').html("");
                            }
                        });
                    }else{
                        $spanMessage = $('div.alert').addClass('alert-danger show').find('strong').html('Error! ').parent().find('span.message');
                        $.each($result.message, function(key, value) {
                            if(value) {
                                $spanMessage.append(value)
                                console.log(value);
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parents('.form-group').find('.error').html(value);
                            }else {
                                $('#' + key).removeClass('is-invalid');
                                $('#' + key).parents('.form-group').find('.error').html("");
                            }
                        });
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