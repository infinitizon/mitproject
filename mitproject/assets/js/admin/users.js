// $(function () {
//     $('#reset').on('click', function(e){
//         e.preventDefault();
//         swal({
//             title: "Warning!", type: "warning",
//             text: "A new password will be generated for user.",
//             showCancelButton: !0, closeOnConfirm: !1, showLoaderOnConfirm: !0,confirmButtonText: "Proceed!",
//             animation: "slide-from-top",
//         },
//         function(inputValue){
//             if(inputValue){
//                 $.ajax({
//                     type: "POST",
//                     url: config['webroot']['endpoint']+"mitproject/users/resetPass",
//                     data: $('form#user').serialize(),
//                     success: function(result){       
//                         try{        
//                             $result = JSON.parse(result)
//                             if($result.success){
//                                 swal('Done!',$result.message, 'success');
//                                 $('#newPass').html($result.message)
//                             }else{
//                                 swal($result.message);
//                             }
//                         }catch(e) {     
//                             swal('Error!', e.message, 'error');
//                         }                        
//                     },
//                     error: function(xhr, status, error){
//                         swal('Error!',xhr.status + ": " + xhr.statusText, 'error');
//                     }
//                 });
//             } 
//         });
//     });
//     $('input[name="active"]').on('change', function(e){
//         e.preventDefault();

//         $elem = $(this);
//         $state = $(this).is(":checked");
//         console.log($state);
//         swal({
//             title: "Confirm!",
//             text: "Are you sure you want to make user "+($state?'active':'inactive'),
//             showCancelButton: !0, closeOnConfirm: !1, showLoaderOnConfirm: !0,
//             animation: "slide-from-top",
//         },
//         function(inputValue){
//             if(inputValue){
//                 $.ajax({
//                     type: "POST",
//                     url: config['webroot']['endpoint']+"hmvctest/users/update",
//                     data: {'r_k':$('input[name="r_k"]').val(),'active':($state?1:0)},
//                     success: function(result){    
//                         try{        
//                             $result = JSON.parse(result)
//                             if($result.success){
//                                 swal('Changed!',$result.message, 'success');
//                                 $('#newPass').html($result.message)
//                             }else{
//                                 swal($result.message);
//                             }
//                         }catch(e) {     
//                             swal('Error!', e.message, 'error');
//                         }                        
//                     },
//                     error: function(xhr, status, error){
//                         swal('Error!',xhr.status + ": " + xhr.statusText, 'error');
//                     }
//                 });
//             } else {
//                 $elem.prop("checked", !$state);
//             }
//         });
//     });
// });