<div class="row my-3">
    <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => 'col-12 d-flex justify-content-end mb-2']) ?>
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card p-3">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create($product, ["enctype" => "multipart/Form-data"]) ?>
            <div class="Form-group">
                <h3 class="font-weight-bold"><?= __('เพิ่มสินค้า') ?></h3>
                <div class="Form-floating mb-1">
                    <label for="floatingemail">โปรโมชั่น</label>
                    <select name="p_promotion" class="Form-control selectpicker">
                        <?php
                        foreach ($promotion as $row) {
                            echo '<option value="' . $row->pr_id . '" >' . $row->pr_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="Form-floating mb-1">
                    <label for="floatingemail">ชื่อสินค้า</label>
                    <?= $this->Form->input('p_title', ['class' => 'Form-control ']); ?>
                </div>
                <div class="Form-floating mb-1">
                    <label for="floatingemail">ชนิดสินค้า</label>
                    <select name="p_type_id" class="Form-control selectpicker">
                        <?php
                        foreach ($productsType as $row) {
                            echo '<option value="' . $row->p_id . '" >' . $row->pt_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="Form-floating mb-1">
                    <label for="floatingemail">รายละเอียดสินค้า</label>
                    <?= $this->Form->input('p_detail', ['class' => 'Form-control ']); ?>
                </div>
                <div class="Form-floating mb-1">
                    <label for="floatingemail">ราคาสินค้า</label>
                    <?= $this->Form->input('p_price', ['class' => 'Form-control ']); ?>
                </div>

            </div>

        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4">
      <div class="card p-3">
      <div class="Form-group my-2">
            <small>ภาพสินค้า</small>
            <input type="file" name="p_image_id" class="Form-control" class="image">
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary w-100']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
</div>