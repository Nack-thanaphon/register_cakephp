<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cartitem $cartitem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cartitem'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cartitem form content">
            <?= $this->form->create($cartitem) ?>
            <fieldset>
                <legend><?= __('Add Cartitem') ?></legend>
                <?php
                    echo $this->form->control('cart_user_id');
                    echo $this->form->control('cart_product_id');
                    echo $this->form->control('cart_qty');
                    echo $this->form->control('c_created_at');
                    echo $this->form->control('c_updated_at');
                ?>
            </fieldset>
            <?= $this->form->button(__('Submit')) ?>
            <?= $this->form->end() ?>
        </div>
    </div>
</div>
