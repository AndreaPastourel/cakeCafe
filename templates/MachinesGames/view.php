<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MachinesGame $machinesGame
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Machines Game'), ['action' => 'edit', $machinesGame->games_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Machines Game'), ['action' => 'delete', $machinesGame->games_id], ['confirm' => __('Are you sure you want to delete # {0}?', $machinesGame->games_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Machines Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Machines Game'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="machinesGames view content">
            <h3><?= h($machinesGame->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Game') ?></th>
                    <td><?= $machinesGame->hasValue('game') ? $this->Html->link($machinesGame->game->name, ['controller' => 'Games', 'action' => 'view', $machinesGame->game->games_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $machinesGame->hasValue('machine') ? $this->Html->link($machinesGame->machine->machine_id, ['controller' => 'Machines', 'action' => 'view', $machinesGame->machine->machine_id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>