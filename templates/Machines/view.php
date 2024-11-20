<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Machine'), ['action' => 'edit', $machine->machine_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Machine'), ['action' => 'delete', $machine->machine_id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->machine_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Machines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Machine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="machines view content">
            <h3><?= h($machine->machine_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Processor') ?></th>
                    <td><?= h($machine->processor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Memory') ?></th>
                    <td><?= h($machine->memory) ?></td>
                </tr>
                <tr>
                    <th><?= __('Os') ?></th>
                    <td><?= h($machine->os) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($machine->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $machine->hasValue('type') ? $this->Html->link($machine->type->name, ['controller' => 'Types', 'action' => 'view', $machine->type->type_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Machine Id') ?></th>
                    <td><?= $this->Number->format($machine->machine_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Games') ?></h4>
                <?php if (!empty($machine->games)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Games Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Genre') ?></th>
                            <th><?= __('Publisher') ?></th>
                            <th><?= __('Realease Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($machine->games as $game) : ?>
                        <tr>
                            <td><?= h($game->games_id) ?></td>
                            <td><?= h($game->name) ?></td>
                            <td><?= h($game->genre) ?></td>
                            <td><?= h($game->publisher) ?></td>
                            <td><?= h($game->realease_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $game->games_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $game->games_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $game->games_id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->games_id)]) ?>
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