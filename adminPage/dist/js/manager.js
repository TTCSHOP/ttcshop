function getdata(elem) {
     console.log(1);
    $.ajax({
        url: "../handler/edit.php",
        method: "post",
        data: {
            id: $(elem).data('id')
        },
        success: function (result) {
            // $('#modal-content').html(result);
            // $('#modal-popup').modal();
        }
    });
}

function closeForm(){
    $.modal.close();
}

function askDelete(elem) {
    // console.log(1);
    $.ajax({
        url: "../../../controller/admin/form_edit/form-product.php",
        method: "post",
        data: {
            id: $(elem).data('id')
        },
        success: function (result) {
            $('#modal-delete').html(result);
            $('#modal-popup').modal();
        }
    });
}