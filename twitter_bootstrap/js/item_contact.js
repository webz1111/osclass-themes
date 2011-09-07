$(document).ready(function(){
    $("#yourName").bind({
        "blur": function (e) {
            text_validation($(this));
        },
        "focus": function (e) {
            $(this).parent().parent().removeClass('error') ;
            $(this).parent().find(".help-inline").remove() ;
        }
    });

    $("#yourEmail").bind({
        "blur": function (e) {
            mail_validation($(this));
        },
        "focus": function (e) {
            $(this).parent().parent().removeClass('error') ;
            $(this).parent().find(".help-inline").remove() ;
        }
    });

    $("#phoneNumber").bind({
        "blur": function (e) {
            text_validation($(this));
        },
        "focus": function (e) {
            $(this).parent().parent().removeClass('error') ;
            $(this).parent().find(".help-inline").remove() ;
        }
    });

    $("#message").bind({
        "blur": function (e) {
            text_validation($(this));
        },
        "focus": function (e) {
            $(this).parent().parent().removeClass('error') ;
            $(this).parent().find(".help-inline").remove() ;
        }
    });
});


function text_validation (element) {
    if( $(element).val().length == 0 ) {
        if ( $(element).parent().parent().hasClass('error') == false ) {
            $(element).parent().parent().addClass('error') ;
            var span = $("<span>").attr('class', 'help-inline').html(text_error_required);
            $(element).parent().append(span) ;
        }
        return false;
    }
    return true;
}

function mail_validation (element) {
    if( $(element).val().length == 0 ) {
        if ( $(element).parent().parent().hasClass('error') == false ) {
            $(element).parent().parent().addClass('error') ;
            var span = $("<span>").attr('class', 'help-inline').html(text_error_required);
            $(element).parent().append(span) ;
        }
        return false ;
    } else if ( !valid_email($(element).val()) ) {
        if ( $(element).parent().parent().hasClass('error') == false ) {
            $(element).parent().parent().addClass('error') ;
            var span = $("<span>").attr('class', 'help-inline').html(text_valid_email);
            $(element).parent().append(span) ;
        }
        return false ;
    }
    return true ;
}

function valid_email( email ) {
    return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(email);
}

function doContact() {
    var error = false;
    if ( !text_validation($("#yourName")) ) {
        error =  true;
    }

    if ( !mail_validation($("#yourEmail")) ) {
        error =  true;
    }

    if ( !text_validation($("#phoneNumber")) ) {
        error =  true;
    }

    if ( !text_validation($("#message")) ) {
        error =  true;
    }

    return !error;
}