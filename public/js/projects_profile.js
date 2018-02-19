$(function () {
    $('.menu .item').tab();    

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