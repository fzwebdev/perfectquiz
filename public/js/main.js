
(function ($) {
    "use strict";


     /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    // var input = $('.validate-input .input100');

    // $('.validate-form').on('submit',function(){
    //     var check = true;

    //     for(var i=0; i<input.length; i++) {
    //         if(validate(input[i]) == false){
    //             showValidate(input[i]);
    //             check=false;
    //         }
    //     }

    //     return check;
    // });


    // $('.validate-form .input100').each(function(){
    //     $(this).focus(function(){
    //        hideValidate(this);
    //     });
    // });

    // function validate (input) {
    //     if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
    //         if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
    //             return false;
    //         }
    //     }
    //     else {
    //         if($(input).val().trim() == ''){
    //             return false;
    //         }
    //     }
    // }

    // function showValidate(input) {
    //     var thisAlert = $(input).parent();

    //     $(thisAlert).addClass('alert-validate');
    // }

    // function hideValidate(input) {
    //     var thisAlert = $(input).parent();

    //     $(thisAlert).removeClass('alert-validate');
    // }

    $(".toggle-password").click(function() {
        console.log("hj");
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password");
        console.log(input.attr("type"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });

    // for form validation and insert into user table


    // for email exist or not exist

    function duplicateEmail(element){
        var email = $(element).val();
        $.ajax({
            type: "POST",
            url: 'checkemail',
            data: {email:email},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    alert('true');
                }else{
                    alert('false');
                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }

})(jQuery);
