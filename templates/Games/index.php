<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Game> $games
 */
?>
<div class="games index content">
    <?= $this->Html->link(__('New Game'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Games') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('games_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('genre') ?></th>
                    <th><?= $this->Paginator->sort('publisher') ?></th>
                    <th><?= $this->Paginator->sort('realease_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($games as $game): ?>
                <tr>
                    <td><?= $this->Number->format($game->games_id) ?></td>
                    <td><?= h($game->name) ?></td>
                    <td><?= h($game->genre) ?></td>
                    <td><?= h($game->publisher) ?></td>
                    <td><?= h($game->realease_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $game->games_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $game->games_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $game->games_id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->games_id)]) ?>
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