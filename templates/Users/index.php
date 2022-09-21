
<div class="container ">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="row   my-5">
        <table class="col-12 mt-4 table table-dark table-borderless">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->phone) ?></td>
                        <td><?= h($user->firstname) ?></td>
                        <td><?= h($user->lastname) ?></td>
                        <td><?= h($user->address) ?></td>
                        <td class="actions">
                            <div class="btn-group k" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary ">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class' => 'text-white <text-decoration-none></text-decoration-none>']) ?>
                                </button>
                                <button type="button" class="btn btn-warning">
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class' => 'text-white <text-decoration-none></text-decoration-none>']) ?>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id],['class' => 'text-white <text-decoration-none></text-decoration-none>'], ['confirm' => ($user->id)]) ?>
                                </button>
                            </div>
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