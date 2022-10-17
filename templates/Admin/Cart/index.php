<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cart> $cart
 */
?>
<div class="cart index content">
    <?= $this->Html->link(__('New Cart'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cart') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('c_id') ?></th>
                    <th><?= $this->Paginator->sort('c_user_id') ?></th>
                    <th><?= $this->Paginator->sort('c_status') ?></th>
                    <th><?= $this->Paginator->sort('c_created_at') ?></th>
                    <th><?= $this->Paginator->sort('c_updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $cart): ?>
                <tr>
                    <td><?= $this->Number->Format($cart->c_id) ?></td>
                    <td><?= $cart->c_user_id === null ? '' : $this->Number->Format($cart->c_user_id) ?></td>
                    <td><?= h($cart->c_status) ?></td>
                    <td><?= h($cart->c_created_at) ?></td>
                    <td><?= h($cart->c_updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cart->c_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cart->c_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cart->c_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->c_id)]) ?>
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
