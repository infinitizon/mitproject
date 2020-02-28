$(function () {
    $( "#questionType").change(function() {
        $("fieldset."+qstTpToShow).find( "div.answer:first" ).removeClass("d-block").addClass("d-none")
            .find("label:not(."+qstTpToShow+")").removeClass("d-block").addClass("d-none");
        $("fieldset."+qstTpToShow).find( "div.answer:not(:first)" ).each(function(){ $(this).remove(); });
        var qstTpToShow = $('option:selected', this).attr('data-type');
        $("fieldset.answer-panel").removeClass("d-block").addClass("d-none")
        $("fieldset."+qstTpToShow).removeClass("d-none").removeClass("d-block")
            .find("label."+qstTpToShow).removeClass("d-none").removeClass("d-block");
    });
    $('i.fa-plus-square')
        .click(function() {
            $selectedOpt = $('#questionType option:selected', this).attr('data-type');
            $answers = $(this).parent().siblings("div.answer");
            var $count = $answers.length + 1;
            if( $answers.last().hasClass("d-none")) {
                $answers.removeClass("d-none").removeClass("d-block");
            } else {
                $answers.last().clone().insertAfter($answers.last()).find("span.length").html($count);
            }
        });
    $('form#lecture').on('submit', function (e) {
        e.preventDefault();
        unindexed_array=$(this).serializeArray();
        var data = {};
        $.map(unindexed_array, function(n){
            data[n['name']] = n['value'];
        });
        
        $question=$('.question').summernote('code');
        data['selectedOpt'] = $('#questionType option:selected').attr('data-type');
        data['content'] = $question;
        $("fieldset."+data['selectedOpt']).find("div.answer").each(function(key, elem){
            console.log(elem)
        });

        console.log(data);return;
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