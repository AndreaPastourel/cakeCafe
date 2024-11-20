<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MachinesGame $machinesGame
 * @var string[]|\Cake\Collection\CollectionInterface $games
 * @var string[]|\Cake\Collection\CollectionInterface $machines
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $machinesGame->games_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $machinesGame->games_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Machines Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="machinesGames form content">
            <?= $this->Form->create($machinesGame) ?>
            <fieldset>
                <legend><?= __('Edit Machines Game') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
