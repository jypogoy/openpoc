var SignUp = {
    validate: function () {        
        var valid = true;
        $('#registerForm *').filter(':input').each(function () {
            var el = this;
            if ($.trim(el.value) == '') {
                $("#" + el.id + "_div").addClass('error');
                $("#" + el.id + "_alert").removeClass('hidden');
                $("#" + el.id + "_alert").addClass('visible');
                valid = false;
            } else {    
                $("#" + el.id + "_div").removeClass('error');
                $("#" + el.id + "_alert").addClass('hidden');
                $("#" + el.id + "_alert").removeClass('visible');
            }
        });        

        $('.error').find('input:text, input:password, textarea').first().focus();
        if (!valid) return false;

        $("#registerForm")[0].submit();
    }
}

$(document).ready(function () {
    $("#registerForm input:text, input:password, #registerForm textarea").first().focus();
    $("#registerForm .alert").hide();
    $("div.profile .alert").hide();
});
