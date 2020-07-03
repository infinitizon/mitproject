$(function () {
    // 20200140==Lecture, 20200141=Quiz
    $('#record_type').html() == 20200141 ? 
    $('input[name="record_type"]').prop("checked", true) :
        $('input[name="record_type"]').prop("checked", false) ;

    var $quiz = $("#quiz").children().clone();
    var $lecture = $("#lecture").children().clone();
    $('#lectureType').change(function (e) {
        $("#quiz").html("");
        $("#lecture").html("");
        if($(this).is(":checked")){
            $("#quiz").append($quiz)
        } else {
            $("#lecture").append($lecture)
        }
    }).trigger('change');
    // $("a").click(function(e){
    //     e.stopPropagation();
    //     e.stopImmediatePropagation();
    //     e.preventDefault();
    //     console.log(e.target);
    // });
    $('form[name="lecture"]').on('submit', function (e) {
        e.preventDefault();
        content=$('.summernote').summernote('code');
        unindexed_array=$(this).serializeArray();
        var data = {};
        $.map(unindexed_array, function(n, i){
            data[n['name']] = n['value'];
        });
        data['course_name'] = $('#course option:selected').attr('data-link');
        data['record_type'] =$('input[name="record_type"]').is(':checked')?20200141:20200140;
        data['content'] = content;
        // console.log(data);return;
        $.ajax({
            type: "POST",
            url: config['webroot']['endpoint']+"mitproject/lectures/create",
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