<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart $cart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cart Form content">
            <?= $this->Form->create($cart) ?>
            <fieldset>
                <legend><?= __('Add Cart') ?></legend>
                <?php
                    echo $this->Form->control('c_detail');
                    echo $this->Form->control('c_user_id');
                    echo $this->Form->control('c_status');
                    echo $this->Form->control('c_created_at');
                    echo $this->Form->control('c_updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
