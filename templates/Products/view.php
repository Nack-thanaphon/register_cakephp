<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->p_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->p_id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->p_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($product->p_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('P Id') ?></th>
                    <td><?= $this->Number->Format($product->p_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('P User Id') ?></th>
                    <td><?= $this->Number->Format($product->p_user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Type Id') ?></th>
                    <td><?= $this->Number->Format($product->p_type_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Price') ?></th>
                    <td><?= $this->Number->Format($product->p_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Promotion') ?></th>
                    <td><?= $this->Number->Format($product->p_promotion) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Image Id') ?></th>
                    <td><?= $this->Number->Format($product->p_image_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Created At') ?></th>
                    <td><?= h($product->p_created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Updated At') ?></th>
                    <td><?= h($product->p_updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('P Title') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->p_title)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('P Detail') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->p_detail)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
