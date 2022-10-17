
<div class="card p-1 m-1 ">
    <div class="m-3">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create($posts, ["enctype" => "multipart/Form-data"]) ?>
        <div class="Form-group">
            <h3 class="font-weight-bold"><?= __('เพิ่มสินค้า') ?></h3>
            <div class="Form-floating mb-1">
                <label for="floatingemail">โปรโมชั่น</label>
                <?= $this->Form->input('p_title', ['class' => 'Form-control ']); ?>
            </div>
            <div class="Form-floating mb-1">
                <label for="floatingemail">ชื่อสินค้า</label>
                <?= $this->Form->input('p_type_id', ['class' => 'Form-control ']); ?>
            </div>
            <!-- <div class="Form-floating mb-1">
                <label for="floatingemail">ชนิดสินค้า</label>
                <?= $this->Form->input('p_user_id', ['class' => 'Form-control ']); ?>
            </div> -->
            <div class="Form-floating mb-1">
                <label for="floatingemail">รายละเอียดสินค้า</label>
                <?= $this->Form->input('p_detail', ['class' => 'Form-control ']); ?>
            </div>
          
            <div class="Form-group my-2">
                <small>ภาพสินค้า</small>
                <input type="file" name="p_img" class="Form-control" class="image">
            </div>


        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary w-100']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
