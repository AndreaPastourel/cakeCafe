<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game $game
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Game'), ['action' => 'edit', $game->games_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Game'), ['action' => 'delete', $game->games_id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->games_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Game'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="games view content">
            <h3><?= h($game->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($game->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genre') ?></th>
                    <td><?= h($game->genre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Publisher') ?></th>
                    <td><?= h($game->publisher) ?></td>
                </tr>
                <tr>
                    <th><?= __('Games Id') ?></th>
                    <td><?= $this->Number->format($game->games_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Realease Date') ?></th>
                    <td><?= h($game->realease_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Machines') ?></h4>
                <?php if (!empty($game->machines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Processor') ?></th>
                            <th><?= __('Memory') ?></th>
                            <th><?= __('Os') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($game->machines as $machine) : ?>
                        <tr>
                            <td><?= h($machine->machine_id) ?></td>
                            <td><?= h($machine->processor) ?></td>
                            <td><?= h($machine->memory) ?></td>
                            <td><?= h($machine->os) ?></td>
                            <td><?= h($machine->status) ?></td>
                            <td><?= h($machine->type_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machine->machine_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machine->machine_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machine->machine_id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->machine_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>