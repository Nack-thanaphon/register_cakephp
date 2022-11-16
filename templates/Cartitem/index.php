<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cartitem> $cartitem
 */
?>
<div class="cartitem index content">
    <?= $this->Html->link(__('New Cartitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cartitem') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('cart_id') ?></th>
                    <th><?= $this->Paginator->sort('cart_user_id') ?></th>
                    <th><?= $this->Paginator->sort('cart_product_id') ?></th>
                    <th><?= $this->Paginator->sort('cart_qty') ?></th>
                    <th><?= $this->Paginator->sort('c_created_at') ?></th>
                    <th><?= $this->Paginator->sort('c_updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartitem as $cartitem): ?>
                <tr>
                    <td><?= $this->Number->format($cartitem->cart_id) ?></td>
                    <td><?= $this->Number->format($cartitem->cart_user_id) ?></td>
                    <td><?= $this->Number->format($cartitem->cart_product_id) ?></td>
                    <td><?= $this->Number->format($cartitem->cart_qty) ?></td>
                    <td><?= h($cartitem->c_created_at) ?></td>
                    <td><?= h($cartitem->c_updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cartitem->cart_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cartitem->cart_id]) ?>
                        <?= $this->form->postLink(__('Delete'), ['action' => 'delete', $cartitem->cart_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartitem->cart_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
