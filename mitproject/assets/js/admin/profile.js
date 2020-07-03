$(function () {
    $('form#profile').on('submit', function (e) {
        e.preventDefault();
        if($('input[name="cpass"]').val() != '') {
            if($('input[name="npass"]').val() != $('input[name="npassAgain"]').val()) {
                swal('Error', 'New passwords entered do not match', 'error'); return;
            } 
        }
        unindexed_array=$(this).serializeArray();
        var data = {};
        $.map(unindexed_array, function(n){
            data[n['name']] = n['value'];
        });
        $.ajax({
            type: "POST",
            url: config['webroot']['endpoint']+"mitproject/profile",
            data: data,
            success: function(result){                        
                try{        
                    $result = JSON.parse(result)
                    if($result.success){
                        $('div.alert').addClass('alert-success show').find('strong').html('Success! ').parent().find('span.message').html($result.message);
                        swal('Congratulations', $result.message, 'success');
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