<div class="row my-3">
    <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => 'col-12 d-flex justify-content-end mb-2']) ?>
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card p-3">
            <?= $this->Form->create($PostsData, ["enctype" => "multipart/form-data"]) ?>
            <div class="form-group">
                <h3 class="font-weight-bold"><?= __('เพิ่มบทความ') ?></h3>
                <div class="form-floating mb-1">
                    <label for="floatingemail">วัน/เดือน/ปี</label> <br>
                    <?=
                    $this->Form->input(
                        'p_date',
                        array(
                            'label' => true,
                            'type' => 'date',
                            'dateFormat' => 'YMD',
                            'minYear' => date('Y') - 70,
                            'maxYear' => date('Y') + 10,
                        )
                    );
                    ?>
                </div>
                <div class="form-floating mb-1">
                    <label for="floatingemail">หัวข้อบทความ</label>
                    <?= $this->Form->input('p_title', ['class' => 'form-control ', 'placeholder' => 'กรุณาใส่หัวข้อบทความ']); ?>
                </div>
                <div class="form-floating mb-1">
                    <label for="floatingemail">ชนิดบทความ</label>
                    <select name="p_type_id" class="form-control selectpicker">
                      <option value="1">ข่าวทั่วไป</option>
                      <option value="2">ข่าวประชาสัมพันธ์</option>
                      <option value="3">บทความ</option>
                      <option value="4">เรื่องน่ารู้</option>
                      <option value="4">วิธีทำอาหาร</option>
                    </select>
                </div>
                <div class="form-floating mb-1">
                    <label for="floatingemail">รายละเอียดบทความ</label>
                    <textarea name="p_detail" id="editor1" rows="10" cols="80" required></textarea>
                </div>
                <div class="form-floating mb-1">
                    <label for="floatingemail">สถานะบทความ</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="p_status" value='1' checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            เผยแพร่
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="p_status" value='0'>
                        <label class="form-check-label" for="flexRadioDefault2">
                            ไม่เผยแพร่
                        </label>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4">
        <div class="card p-3">
            <div class="form-group my-2">
                <small>ภาพบทความ</small>
            </div>
            <input type="file" name="p_image_id[]" id="files" class="form-control" class="image" multiple id="gallery-photo-add">

            <section class="uploaded-area"></section>
            <?= $this->Form->button(__('บันทึกข้อมูล'), ['class' => 'btn btn-primary w-100 mt-2']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>



<script>
    CKEDITOR.replace('editor1');
    const uploadedArea = document.querySelector(".uploaded-area");

    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Byte';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }

    $(document).ready(function() {
        if (window.File &&
            window.FileList &&
            window.FileReader) {
            $("#files").on("change", async function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                var filemore = '';
                //เช็คค่า
                for (var i = 0; i < filesLength; i++) {
                    var filesize = files[i].size;
                    var filename = files[i].name
                    var fileSize = bytesToSize(filesize)
                    //เช็คชื่อ
                    if (filename.length >= 12) {
                        let splitName = filename.split('.');
                        filename = splitName[0].substring(0, 13) + "... ." + splitName[1];
                    }
                    // check ขนาดไฟล์
                    if (filesize <= 5000000) {
                        var fileReader = await new FileReader();
                        let uploadedHTML =
                            `<li class="d-flex justify-content-between row m-0 p-0 my-2">
                    <div class="content upload align-items-center d-flex content">
                        <i class="fas fa-file-alt"></i>
                        <div class="ml-3 details">
                        <span class="name">${filename}|</span>
                        <span class="size text-muted">${fileSize}</span>
                        </div>
                    </div>
                    <i class="fas fa-trash m-0 p-0 remove" ></i>
                </li>`;
                        uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
                        $(".remove").click(function() {
                            $(this).parent(".row").remove();
                        });
                        await fileReader.readAsDataURL(f);
                    } else {
                        filemore += filename + '\n'
                    }
                } //end loop
                if (filemore)
                    alert('File size > 3MB \n' + filemore)
            });
        }
    });
</script>