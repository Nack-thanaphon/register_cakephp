<?php $this->assign('title', 'แก้ไขผู้ใช้งาน'); ?>

<div class="row my-3 m-2">
    <div class="col-12 d-flex justify-content-between my-4">
        <h3 class="font-weight-bold"><?= __('อัพเดตข้อมูลผู้ใช้งาน') ?></h3>
        <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => ' mb-2']) ?>
    </div>
    <div class="col-12 col-md-12 col-lg-12 card">
        <?= $this->Form->create($user, ["enctype" => "multipart/form-data"]) ?>
        <div class="row p-3 ">
            <div class="col-12  my-2">
                <h3>รูปภาพประจำตัว</h3>
            </div>
            <div class="col-12 col-sm-6 my-2">
                <input type="file" name="userimage" id="user_image" value="<?php echo $this->Url->build($user->image, ['fullBase' => true]); ?>">
                <input type="hidden" name="imgold" id="user_image" value="<?php echo $this->Url->build($user->image, ['fullBase' => true]); ?>">
                <input type="hidden" name="userId" value="<?= $user->id ?>">
                <?php if (!empty($user->image)) { ?>
                    <div class="row m-0 py-3 my-auto w-100" style="overflow: hidden;">
                        <a data-fslightbox href="<?php echo $this->Url->build($user->image, ['fullBase' => true]); ?>">
                            <img id="user_image_file" src="<?php echo $this->Url->build($user->image, ['fullBase' => true]); ?>" class="p-3 w-100">
                        </a>
                    </div>
                <?php } else { ?>
                    <img id="user_image_file" src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png" class=" m-auto p-3" alt="">
                <?php } ?>
            </div>
            <div class="form-group col-12 col-sm-6 mt-2">

                <div class="form-floating mb-3">
                    <label for="floatingemail">ชื่อ-นามสกุล</label>
                    <?= $this->Form->input('name', ['class' => 'form-control ', 'placeholder' => 'ชื่อ-นามสกุล']); ?>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">อีเมลล์ผู้ใช้งาน</label>
                    <?= $this->Form->input('email', ['class' => 'form-control ', 'placeholder' => 'อีเมลล์ผู้ใช้งาน']); ?>
                </div>

                <div class="form-floating mb-3">
                    <label for="floatingemail">ตำแหน่งผู้ใช้งาน</label>
                    <select name="user_role_id" class="form-control selectpicker">
                        <option value="4" <?php echo ($user['user_role_id'] == 1) ? 'selected' : '' ?>>เจ้าของร้านค้า</option>
                        <option value="1" <?php echo ($user['user_role_id'] == 2) ? 'selected' : '' ?>>ผู้ใช้งานทั่วไป</option>
                        <option value="2" <?php echo ($user['user_role_id'] == 3) ? 'selected' : '' ?>>ผู้จัดการร้านค้า</option>
                        <option value="3" <?php echo ($user['user_role_id'] == 4) ? 'selected' : '' ?>>ผู้จัดการเว็บไซต์</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">สถานะการยืนยันตัวตน</label>
                    <?php
                    if ($user['verified'] == 0) {
                        echo '
                        <p class="text-danger m-0 p-0"><i class="fas fa-times-circle"></i> ยังไม่ได้ยืนยันตัวตน</p>';
                    }
                    if ($user['verified'] == 1) {
                        echo '<p class="text-success m-0 p-0"><i class="fas fa-check-circle"></i> ยืนยันตัวตนเรียบร้อย</p>';
                    }
                    ?>

                </div>
                <div class="form-floating mb-3">
                    <form action="forgetpassword">
                        <label>ต้องการเปลี่ยนรหัสผ่าน</label>
                        <div type="button" class="input-group-append">
                            <div class="input-group-text">
                                <small type="button" id="resetpass"><i class="fas fa-envelope p-0"></i>
                                    ส่งอีเมลล์เพื่อเปลี่ยนรหัสผ่าน
                                </small>
                                <input type="hidden" id="emailreset" value="<?= $user['email'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">สถานะผู้ใช้งาน</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="p_status[]" value='1' <?php echo ($user['status'] == 0) ? "checked" : ""  ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            ปิดการใช้งาน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="p_status[]" value='0' <?php echo ($user['status'] == 1) ? "checked" : ""  ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            เปิดการใช้งาน
                        </label>
                    </div>
                </div>
                <div class="btn-group w-100 mt-4">
                    <!-- <?= $this->Form->button('ลบผู้ใช้งาน', ['class' => "btn btn text-danger border  w-100"]); ?> -->
                    <?= $this->Form->button(__('บันทึกข้อมูล'), ['class' => 'btn btn-primary  w-100 ']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>

    <!-- <div class="col-12 col-md-12 col-lg-4">
        <div class="card p-3">
            <div class="form-group my-2">
                <small>ภาพบทความ</small>
            </div>
            <input type="file" name="p_image_id[]" id="files" class="form-control" class="image" multiple id="user_image">

            <section class="uploaded-area"></section>
        </div>
    </div> -->
</div>



<script>
    $("#resetpass").click(function() {
        let email = $("#emailreset").val()
        Swal.fire({
            title: 'คุณแน่ใจใช่ไหม?',
            text: "คุณต้องการเปลี่ยนรหัสผ่าน " + email + " ใช่ไหม !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบเลย!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Users', 'action' => 'forgetpassword']) ?>",
                type: "post",
                data: {
                    email: email
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                },
                success: function(resp) {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'ส่งอีเมลล์เรียบร้อย!',
                            'ดำเนินการเรียบร้อย.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'ส่งอีเมลล์เรียบร้อย!',
                            'ดำเนินการเรียบร้อย.',
                            'error'
                        )
                    }
                }
            })
        })
    })

    $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#user_image_file').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#user_image").change(function() {
            readURL(this);
        });
    })
</script>