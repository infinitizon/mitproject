$(function () {
    $('form#saveAndContinue').on('submit', function (e) {
        e.preventDefault();
        unindexed_array=$(this).serializeArray();
        var data = {};
        $.map(unindexed_array, function(n){
            data[n['name']] = n['value'];
        });
        answer = []
        $("div."+$('input[name="optionType"]').val()).each(function(key, elem){
            $questionOptions = JSON.parse($(elem).find('input[name="qst_ans"]').val());
            if($('input[name="optionType"]').val() == 'MTC'){
                answer.push(
                    {'exm_qst_ans':$(elem).find('input[name="exm_qst_ans"]').val(), 'exm_qst_vld':$(elem).find('input[name="exm_qst_vld"]').val()})
            } else if($('input[name="optionType"]').val() == 'MCSA' || $('input[name="optionType"]').val() == 'MCMA') {
                $questionOptions['atmt_ans_gvn']=$(elem).find('input[name="atmt_ans_gvn"]').is(':checked')?true:false
            }
            answer.push($questionOptions);
        });
        $('input[name="answers"]').val(JSON.stringify(answer));
        
        // console.log($('input[name="optionType"]').val());
        this.submit(); 
        return;
    });
});