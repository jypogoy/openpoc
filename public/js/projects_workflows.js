$(function () {
    loadWorkflowList();
    $('#btnAddWorkflow').on('click', function () {
        clear(); // See form.js
        modals.showWorkflow();
    });
});

function loadWorkflowList() {
    $.get('../../workflows/listbyproject/' + $('#projectId').val(), function (data) {    
        $('#workflowListWrapper').html(data);
    })
    .done(function (msg) {
        // Do nothing...
    })
    .fail(function (xhr, status, error) {
        toastr.error(error);
    });
}

function editWorkflow(id) {
    clear(); // See form.js
    $.post('../../workflows/get/' + id, function (data) {
        $('form *').filter(':input').each(function () {
            var el = this;
            el.value = data[0][el.id]; 
        });  
        modals.showWorkflow();
    })
    .done(function (msg) {
        // Do nothing...
    })
    .fail(function (xhr, status, error) {
        toastr.error(error);
    });
}

function saveWorkflow(id, isSaveNew) {    
    var isValid = Form.validate(true); // See form.js    
    if (isValid) {
        var action;
        if (id) {
            action = '../../workflows/save'
        } else {
            action = '../../workflows/create'
        }
        $.post(action, $('form').serialize(), function (msg) {    
            var startPos = msg.indexOf('>') + 1;
            var endPos = msg.indexOf('<', startPos);
            var textMsg = msg.substring(startPos, endPos);  
            if (msg.indexOf('danger') != -1) {                
                toastr.error(textMsg);
            } else if (msg.indexOf('success') != -1) {                
                toastr.success(textMsg);
            }            
        })
        .done(function (msg) {
            if (isSaveNew) {
                clear(); // See form.js
            } else {                
                modals.hideWorkflow();
            }
            $('.loader').fadeIn();
            loadWorkflowList();
        })
        .fail(function (xhr, status, error) {
            toastr.error(error);
        });
    }    
}

function del(id, name) {

    $('.custom-text').html('<p>Are you sure you want to delete workflow <strong>' + name + '</strong>? Click OK to proceed.</p>');

    $('.ui.tiny.modal.delete')
    .modal({
        inverted : true,
        closable : true,
        observeChanges : true, // <-- Helps retain the modal position on succeeding show.
        onDeny : function(){
            // Do nothing
        },
        onApprove : function() {
            window.location = '../../workflows/delete/' + id;
        }
    })
    .modal('show');

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