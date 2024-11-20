<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MachinesGame> $machinesGames
 */
?>
<div class="machinesGames index content">
    <?= $this->Html->link(__('New Machines Game'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Machines Games') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('games_id') ?></th>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($machinesGames as $machinesGame): ?>
                <tr>
                    <td><?= $machinesGame->hasValue('game') ? $this->Html->link($machinesGame->game->name, ['controller' => 'Games', 'action' => 'view', $machinesGame->game->games_id]) : '' ?></td>
                    <td><?= $machinesGame->hasValue('machine') ? $this->Html->link($machinesGame->machine->machine_id, ['controller' => 'Machines', 'action' => 'view', $machinesGame->machine->machine_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $machinesGame->games_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $machinesGame->games_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $machinesGame->games_id], ['confirm' => __('Are you sure you want to delete # {0}?', $machinesGame->games_id)]) ?>
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