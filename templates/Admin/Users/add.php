<?php $this->assign('title', 'เพิ่มผู้ใช้งาน'); ?>

<div class="row my-3 m-2">
    <div class="col-12 d-flex justify-content-between">
        <h3 class="font-weight-bold"><?= __('เพิ่มผู้ใช้งาน') ?></h3>
        <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => ' mb-2']) ?>
    </div>
    
    <div class="col-12 col-md-12 col-lg-12 card">
        <div class="row p-3 ">
            <div class="col-12 col-sm-6 my-2">
                <?= $this->Flash->render() ?>
                <h3>รูปภาพประจำตัว</h3>
                <input type="file" name="" id="">
                <input type="hidden" name="adminside" value="qwewebdbdfgbfgbdfngjndr">
                <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png" class="w-100 my-auto" alt="">
            </div>
            <div class="form-group col-12 col-sm-6 my-auto ">
                <?= $this->Form->create($user,['action' => 'register', "enctype" => "multipart/form-data"]); ?>
                <div class="form-floating mb-3">
                    <label for="floatingemail">ชื่อ-นามสกุล</label>
                    <?= $this->Form->input('name', ['class' => 'form-control ', 'placeholder' => 'ชื่อ-นามสกุล']); ?>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">อีเมลล์ผู้ใช้งาน</label>
                    <?= $this->Form->input('email', ['class' => 'form-control ', 'placeholder' => 'อีเมลล์ผู้ใช้งาน']); ?>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">รหัสผ่าน</label>
                    <?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control ', 'placeholder' => 'รหัสผ่าน']); ?>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">ตำแหน่งผู้ใช้งาน</label>
                    <select name="p_type_id" class="form-control selectpicker">
                        <option value="1">ผู้ใช้งานทั่วไป</option>
                        <option value="2">ผู้จัดการร้านค้า</option>
                        <option value="3">ผู้จัดการเว็บไซต์</option>
                        <option value="4">เจ้าของร้านค้า</option>
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <label for="floatingemail">สถานะผู้ใช้งาน</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="p_status" value='0'>
                        <label class="form-check-label" for="flexRadioDefault2">
                            เปิดการใช้งาน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input " type="radio" name="p_status" value='1' checked>
                        <label class="form-check-label text-danger" for="flexRadioDefault1">
                            ปิดการใช้งาน
                        </label>
                    </div>

                </div>
                <?= $this->Form->button(__('บันทึกข้อมูล'), ['class' => 'btn btn-primary w-100 mt-2 m-0']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <!-- <div class="col-12 col-md-12 col-lg-4">
        <div class="card p-3">
            <div class="form-group my-2">
                <small>ภาพบทความ</small>
            </div>
            <input type="file" name="p_image_id[]" id="files" class="form-control" class="image" multiple id="gallery-photo-add">

            <section class="uploaded-area"></section>
        </div>
    </div> -->
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