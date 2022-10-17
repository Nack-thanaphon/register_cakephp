

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