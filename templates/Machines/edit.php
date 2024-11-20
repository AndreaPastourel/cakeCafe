<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 * @var string[]|\Cake\Collection\CollectionInterface $types
 * @var string[]|\Cake\Collection\CollectionInterface $games
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $machine->machine_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $machine->machine_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Machines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="machines form content">
            <?= $this->Form->create($machine) ?>
            <fieldset>
                <legend><?= __('Edit Machine') ?></legend>
                <?php
                    echo $this->Form->control('processor');
                    echo $this->Form->control('memory');
                    echo $this->Form->control('os');
                    echo $this->Form->control('status');
                    echo $this->Form->control('type_id', ['options' => $types, 'empty' => true]);
                    echo $this->Form->control('games._ids', ['options' => $games]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
