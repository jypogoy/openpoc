$(function () {
    $('.menu .item').tab();

    $('#btnAddWorkflow').on('click', function () {
        modals.showWorkflow();
    });

    $('#btnAddTag').on('click', function () {
        $('.ui.tiny.modal.tag')
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
    });

    $('#btnAddColor').on('click', function () {
        $('.ui.tiny.modal.color')
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
    });    
});

function edit(id) {
    $.post('workflow/create/', id, function (data) {
        alert(data);
    })
    .done(function (data) {
        alert('success');
    })
    .fail(function () {
        alert('error');
    })
    .error(function () {
        alert('error');
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