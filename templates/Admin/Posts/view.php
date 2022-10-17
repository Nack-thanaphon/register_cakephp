<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="posts view content">
            <h3><?= h($post->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('P Status') ?></th>
                    <td><?= h($post->p_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Img') ?></th>
                    <td><?= h($post->p_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->Format($post->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Type Id') ?></th>
                    <td><?= $this->Number->Format($post->p_type_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('P User Id') ?></th>
                    <td><?= $this->Number->Format($post->p_user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Views') ?></th>
                    <td><?= $this->Number->Format($post->p_views) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Created At') ?></th>
                    <td><?= h($post->p_created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Updated At') ?></th>
                    <td><?= h($post->p_updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('P Title') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->p_title)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('P Detail') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->p_detail)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
