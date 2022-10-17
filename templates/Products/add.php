<!-- 
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
<div class="card p-1 m-1 ">
    <div class="m-3">
        <?= $this->Form->create($product) ?>
        <div class="Form-group">
            <h3 class="font-weight-bold"><?= __('เพิ่มสินค้า') ?></h3>
            <div class="Form-floating mb-1">
                <?= $this->Form->input('p_promotion', ['class' => 'Form-control ']); ?>
                <label for="floatingemail">โปรโมชั่น</label>
            </div>
            <div class="Form-floating mb-1">
                <?= $this->Form->input('p_title', ['class' => 'Form-control ']); ?>
                <label for="floatingemail">ชื่อสินค้า</label>
            </div>
            <div class="Form-floating mb-1">
                <?= $this->Form->input('p_type_id', ['class' => 'Form-control ']); ?>
                <label for="floatingemail">ชนิดสินค้า</label>
            </div>
            <div class="Form-floating mb-1">
                <?= $this->Form->input('p_detail', ['class' => 'Form-control ']); ?>
                <label for="floatingemail">รายละเอียดสินค้า</label>
            </div>
            <div class="Form-floating mb-1">
                <?= $this->Form->input('p_price', ['class' => 'Form-control ']); ?>
                <label for="floatingemail">ราคาสินค้า</label>
            </div>
            <div class="Form-group my-2">
                <small>ภาพสินค้า</small>
                <?= $this->Form->file('p_image_id', ['class' => 'Form-control ']); ?>

            </div>


        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary w-100']) ?>
        <?= $this->Form->end() ?>
    </div>