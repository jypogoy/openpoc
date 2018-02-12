$(function () {
    $('#dataForm').form(rules);
    $("form input:text, input:password, textarea").first().focus();
    $("form .alert").hide();
});

var rules = {

    fields : {
        name : {
            identifier : 'name',
            rules : [
                {
                    type : 'empty',
                    prompt : 'Please enter a project name'
                }    
            ]
        }
    }
    
};