$(function () {
    $("form input:text, input:password, textarea").first().focus();
    $("form .alert").hide();
});

var Save = {
    validate: function (saveNew) {        
        var valid = true;
        $('form *').filter(':input').each(function () {
            var el = this;
            if ($("#" + el.id + "_div").hasClass('required')) {
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
            }    
        });        

        $('.error').find('input:text, input:password, textarea').first().focus();
        if (!valid) return false;

        $('#saveNew').val(saveNew);
        $("form")[0].submit();
    }
}

function clear() { //TODO Add reset for numeric and combobox.
    $('form *').filter(':input').each(function () {
        var el = this;
        el.value = ''; 
    }); 
    $("form input:text, input:password, textarea").first().focus(); 
}