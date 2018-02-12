$(function() {
    
    $('.loader').fadeOut();

    $('.ui.dropdown').dropdown();

    $('#listForm').form({});

    $('#resetBtn').click(function () {
        $('#fieldKeyword').val('');
        $('#listForm').submit();
    });

    // Alert message controls
    $('.close.icon').on('click', function () {
        $('.message').fadeOut();
    });
    setTimeout(function () {
        $('.message').fadeOut();
    }, 3000);

});

function del(id, name) {

    $('.custom-text').html('<p>Are you sure you want to delete project <strong>' + name + '</strong>? Click OK to proceed.</p>');

    $('.ui.tiny.modal.delete')
    .modal({
        inverted : true,
        closable : true,
        observeChanges : true, // <-- Helps retain the modal position on succeeding show.
        onDeny : function(){
            // Do nothing
        },
        onApprove : function() {
            window.location = 'projects/delete/' + id;
        }
    })
    .modal('show');

}

function sort(sortField, sortDirection) {
    $('#sortField').val(sortField);
    $('#sortDirection').val(sortDirection);
    $('#listForm').submit();
}