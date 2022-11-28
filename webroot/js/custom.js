

$(".delete").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.delete', function () {
    let delete_form = $(this).parent().find('form');


    Swal.fire({
        title: 'คุณแน่ใจใช่ไหม?',
        text: "คุณต้องการลบข้อมูลนี้ใช่ไหม!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบเลย!',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            delete_form.submit()
            Swal.fire(
                'เรียบร้อย!',
                'ข้อมูลของคุณถูกลบเรียบร้อย.',
                'success'
            )

        }
    })
});

var singleimagesPreview = function (input) {

    if (input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (event) {
            $('#singleimages').attr('src', event.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }

};


var Payment_Preview = function (input) {

    if (input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (event) {
            $('#payment_show').attr('src', event.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }

};



var multiimagesPreview = function (input, placeToInsertImagePreview) {

    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function (event) {
                $($.parseHTML('<img class="col-4 p-1 ">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }

};