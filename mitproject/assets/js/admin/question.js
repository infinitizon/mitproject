$(function () {
    $( "#questionType").change(function() {
        $optionType = $('option:selected', this).attr('data-type');
        if($optionType=='SA' || $optionType=='LA'){
            $("#noOfOptions").parents(".noOfOptions").addClass("d-none").removeClass("d-block")
        } else {
            $("#noOfOptions").parents(".noOfOptions").removeClass("d-none").addClass("d-block");
            $("#optionType").val($optionType);
        }
    }).trigger('change');
    $('form#question').on('submit', function (e) {
        e.preventDefault();
        unindexed_array=$(this).serializeArray();
        var data = {};
        $.map(unindexed_array, function(n){
            data[n['name']] = n['value'];
        });
        data['question'] = $('.question').summernote('code');
        answer = []
        $("fieldset."+$('input[name="optionType"]').val()).each(function(key, elem){
            if($('input[name="optionType"]').val() == 'MTC'){
                answer.push(
                    {'exm_qst_ans':$(elem).find('input[name="exm_qst_ans"]').val(), 'exm_qst_vld':$(elem).find('input[name="exm_qst_vld"]').val()})
            } else if($('input[name="optionType"]').val() == 'MCMA' || $('input[name="optionType"]').val() == 'MCSA') {
                $noteAnswer = $(elem).find('.noteAnswer').summernote('code');
                answer.push(
                    {'exm_qst_vld':($(elem).find('input[name="exm_qst_vld"]').is(':checked')?true:false), 'exm_qst_ans':$noteAnswer})
            }
        });
        data['answers'] = answer
        $.ajax({
            type: "POST",
            url: config['webroot']['endpoint']+"mitproject/questions/create",
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