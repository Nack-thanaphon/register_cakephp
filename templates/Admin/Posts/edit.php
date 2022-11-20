<div class="container">
    <div class="row m-0 p-0 my-3">

        <div class="col-12 col-sm-8">
            <div class="card m-2 p-3">
                <?= $this->Form->create($post, ["enctype" => "multipart/form-data"]) ?>
                <div class="form-group">
                    <h3 class="font-weight-bold"><?= __('อัพเดตบทความ') ?></h3>
                    <div class="form-floating mb-1">
                        <label for="floatingemail">วัน/เดือน/ปี</label>
                        <br>
                        <?=
                        $this->Form->input(
                            'p_date',
                            array(
                                'label' => true,
                                'type' => 'date',
                                'dateFormat' => 'YMD',
                                'minYear' => date('Y') - 70,
                                'maxYear' => date('Y') + 10,
                                'value' => $post->p_date,
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
                            <select name="p_type_id" class="form-control selectpicker">
                                <option value="1">ข่าวทั่วไป</option>
                                <option value="2">ข่าวประชาสัมพันธ์</option>
                                <option value="3">บทความ</option>
                                <option value="4">เรื่องน่ารู้</option>
                                <option value="4">วิธีทำอาหาร</option>
                            </select>
                        </select>
                    </div>
                    <div class="form-floating mb-1">
                        <label for="floatingemail">รายละเอียดบทความ</label>
                        <textarea name="p_detail" id="editor1" rows="10" cols="80" required><?= $post->p_detail; ?></textarea>
                    </div>
                    <div class="form-floating mb-1">
                        <label for="floatingemail">สถานะบทความ</label>
                        <div class="form-check">
                            <?php echo '<input class="form-check-input" type="radio" name="p_status" value= 1  ' . (($post->p_status == 1) ? "checked" : "") . '  >' ?>

                            <label class="form-check-label" for="flexRadioDefault1">
                                เผยแพร่
                            </label>
                        </div>
                        <div class="form-check">
                            <?php echo '<input class="form-check-input" type="radio" name="p_status" value= 0  ' . (($post->p_status == 0) ? "checked" : "") . '  >' ?>

                            <label class="form-check-label" for="flexRadioDefault2">
                                ไม่เผยแพร่
                            </label>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-12 col-sm-4">
            <div class="card m-2 p-2">
                <p>รูปภาพในระบบ</p>
                <div class="row m-0 p-0">
                    <?php foreach ($coverimage as $image) : ?>
                        <div class="col-6 ">
                            <img src="<?= $this->Url->build($image->image) ?>" class="w-75 h-75" alt="">
                            <!-- <div class="btn btn-primary my-1 " onclick="selected(<?= $image->id ?>)">เลือกเป็นภาพหน้าปก</div> -->
                        </div>
                    <?php endforeach; ?>
                </div>
                <?= $this->Form->button(__('บันทึกข้อมูล'), ['class' => 'btn btn-primary w-100 mt-2']) ?>
                <button class="btn btn danger mt-3" id="deletepost" value="<?= $post->id ?>">ลบข้อมูล</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('editor1');
    $('#deletepost').click(function() {
        let id = $('#deletepost').val()
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Posts', 'action' => 'delete']) ?>",
            type: "post",
            data: {
                id: id
            },
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(resp) {

            }
        })
    })
</script>