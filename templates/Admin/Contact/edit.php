<div class="container">
    <div class="row my-3">
        <div class="col-12">
            <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'd-flex justify-content-end my-3']) ?>
            <div class="card p-3">
                <?= $this->Form->create($contact) ?>
                <h1>อัพเดตข้อมูลบริษัท</h1>
                <fieldset>
                    <?php
                    echo $this->Form->input('b_name', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_adress', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_phone', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_phone1', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_phone2', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_phone3', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_social', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_social1', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_social2', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_payment1', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_payment2', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_payment3', ['class' => 'form-control mb-2', 'type' => 'text']);
                    echo $this->Form->control('b_img', ['class' => 'form-control mb-2', 'type' => 'file']);
                    echo $this->Form->control('b_img1', ['class' => 'form-control mb-2', 'type' => 'file']);
                    echo $this->Form->control('b_img2', ['class' => 'form-control mb-2', 'type' => 'file']);
                    echo $this->Form->control('b_img3', ['class' => 'form-control mb-2', 'type' => 'file']);
                    ?>
                </fieldset>
                <button type="submit" class="btn btn-primary w-100">อัพเดตข้อมูล</button>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
</div>