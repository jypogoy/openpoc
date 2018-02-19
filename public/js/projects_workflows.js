$(function () {
    $('#btnAddWorkflow').on('click', function () {
        clear(); // See form.js
        modals.showWorkflow();
    });
});

function editWorkflow(id) {
    $.post('../../workflows/get/' + id, function (data) {
        $('form *').filter(':input').each(function () {
            var el = this;
            el.value = data[0][el.id]; 
        });  
        modals.showWorkflow();
    })
    .done(function (msg) {
        //alert('success');
    })
    .fail(function (xhr, status, error) {
        //alert(error);
    });
}

function saveWorkflow() {    
    var valid = true;
    var data;
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

    $.post('../../workflows/save', $('form').serialize(), function (data) {
        alert(data);
        // $('form *').filter(':input').each(function () {
        //     var el = this;
        //     el.value = data[0][el.id]; 
        // });  
        // modals.showWorkflow();        
    })
    .done(function (msg) {
        modals.hideWorkflow();
    })
    .fail(function (xhr, status, error) {
        alert(error);
    });
}

var modals = {
    showWorkflow : function () {
        $('.ui.tiny.modal.flow')
        .modal('setting',
        {
            inverted : true,
            closable : true,
            onDeny : function(){
                // Do nothing
            },
            onApprove : function() {
                //window.location = 'projects/delete/' + id;
            }
        })
        .modal('setting', { detachable:false })
        .modal('show');
    },
    hideWorkflow : function () {
        $('.ui.tiny.modal.flow').modal('hide');
    }
}