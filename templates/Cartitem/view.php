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
            <?= $this->Html->link(__('Edit Cartitem'), ['action' => 'edit', $cartitem->cart_id], ['class' => 'side-nav-item']) ?>
            <?= $this->form->postLink(__('Delete Cartitem'), ['action' => 'delete', $cartitem->cart_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartitem->cart_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cartitem'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cartitem'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cartitem view content">
            <h3><?= h($cartitem->cart_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cart Id') ?></th>
                    <td><?= $this->Number->format($cartitem->cart_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cart User Id') ?></th>
                    <td><?= $this->Number->format($cartitem->cart_user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cart Product Id') ?></th>
                    <td><?= $this->Number->format($cartitem->cart_product_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cart Qty') ?></th>
                    <td><?= $this->Number->format($cartitem->cart_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('C Created At') ?></th>
                    <td><?= h($cartitem->c_created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('C Updated At') ?></th>
                    <td><?= h($cartitem->c_updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
