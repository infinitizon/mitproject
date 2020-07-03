$(function () {
    $('.changeOrder').on('click', function (e) {
        swal({
            title: "Confirm movement!",
            text: "Confirm you want to move question to position:",
            type: "input",
            showCancelButton:!0,closeOnConfirm:!1,
            inputValue:parseInt(question.r_n)+parseInt(direction),
            animation: "slide-from-top",
            inputPlaceholder: "Enter Position"
        },
        function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }

            var changes = {};
            changes['new_val'] = inputValue;
            changes['old_val'] = question.qz_qst_ord;
            changes['r_k'] = question.r_k;
            changes['cbt_sch_qz'] = quiz.r_k;
            changes['dir'] = parseInt(direction) * -1;
            var data=angular.copy(CommonServices.postData);
            data.factName = "reorder";
            data.factObjects=[changes];
            data.transactionEventType = "PUT";
            DataService.post('cbt', data).then(function (response) {
                swal("Great!", "Update successful", "success");
                vm.getQuizQuestions(0,{},quiz,quizIndex)
            });
            return false
        });
    });
    $('.fa-minus-circle').on('click', function (e) {
        $clicked = $(this);
        swal(
            {
                title:"Are you sure to delete?",
                text:"You will need to re-add if you need this question",
                type:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#DD6B55",
                confirmButtonText:"Yes, delete it !!",
                showLoaderOnConfirm:!0,
                closeOnConfirm:!1
            },
            function (isConfirm) {
                if (isConfirm) {
                    data = {'r_k':$clicked.attr('data-r_k')};
                    $.ajax({
                        type: "POST",
                        url: config['webroot']['endpoint']+"mitproject/quiz/removeQuestion",
                        data: data,
                        success: function(result){                        
                            try{        
                                $result = JSON.parse(result)
                                if($result.success){
                                    swal($result.message);
                                    $clicked.parents('tr').remove();
                                }else{
                                    swal($result.message);
                                }
                            }catch(e) {     
                                swal('Error!', e.message, 'error');
                            }       
                        },
                        error: function(xhr, status, error){
                            swal('Error!',xhr.status + ": " + xhr.statusText, 'error');
                        }
                    });
                }
            }
        );
    });
    $('form#quiz').on('submit', function (e) {
        e.preventDefault();
        unindexed_array=$(this).serializeArray();
        var data = {};
        $.map(unindexed_array, function(n){
            data[n['name']] = n['value'];
        });
        data['view_ans_after'] = data['view_ans_after']=='on'?true:false;
        data['open_quiz'] = data['open_quiz']=='on'?true:false;
        data['description'] = $('.summernote').summernote('code');
        $.ajax({
            type: "POST",
            url: config['webroot']['endpoint']+"mitproject/quiz/create",
            data: data,
            success: function(result){                        
                try{        
                    $result = JSON.parse(result)
                    if($result.success){
                        window.location = config['webroot']['endpoint']+"mitproject/quiz/addquestion/"+$result.message['r_k'];
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