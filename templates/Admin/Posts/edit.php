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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $post->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="posts Form content">
            <?= $this->Form->create($post) ?>
            <fieldset>
                <legend><?= __('Edit Post') ?></legend>
                <?php
                    echo $this->Form->control('p_title');
                    echo $this->Form->control('p_type_id');
                    echo $this->Form->control('p_user_id');
                    echo $this->Form->control('p_detail');
                    echo $this->Form->control('p_status');
                    echo $this->Form->control('p_views');
                    echo $this->Form->control('p_created_at');
                    echo $this->Form->control('p_updated_at');
                    echo $this->Form->control('p_img');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
