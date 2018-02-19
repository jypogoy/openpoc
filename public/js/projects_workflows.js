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
    $.post('../../workflows/save', function (data) {
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
                window.location = 'projects/delete/' + id;
            }
        })
        .modal('setting', { detachable:false })
        .modal('show');
    }
}