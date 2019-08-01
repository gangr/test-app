$(document).ready(function () {

    let $deleteButtons = $('.btn-delete'),
        $popup = $('.popup'),
        $cancelBtn = $popup.find('.btn-cancel'),
        $deleteBtn = $popup.find('.btn-sure-delete'),
        idToDelete = null;

    $deleteButtons.on('click', function() {
        idToDelete = this.dataset.itemid;
        $popup.show();
    });

    $cancelBtn.on('click', () => {
        $popup.hide();
        idToDelete = null;
    });

    $deleteBtn.on('click', () => {
        $popup.hide();

        let url = "/admin/delete/" + idToDelete;

        let request = $.ajax({
            url: url,
            method: "GET",
            dataType: "json"
        });

        request.done(function( data ) {
            if(data.success === 1) {
                $('#' + idToDelete).slideUp(function () {
                    $(this).remove();
                });
            }
        });

        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });

        request.always(function() {
            idToDelete = null;
        });
    });

});