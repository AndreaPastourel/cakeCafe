<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Machine> $machines
 */
?>
<div class="machines index content">
    <?= $this->Html->link(__('New Machine'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Machines') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th><?= $this->Paginator->sort('processor') ?></th>
                    <th><?= $this->Paginator->sort('memory') ?></th>
                    <th><?= $this->Paginator->sort('os') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('type_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($machines as $machine): ?>
                <tr>
                    <td><?= $this->Number->format($machine->machine_id) ?></td>
                    <td><?= h($machine->processor) ?></td>
                    <td><?= h($machine->memory) ?></td>
                    <td><?= h($machine->os) ?></td>
                    <td><?= h($machine->status) ?></td>
                    <td><?= $machine->hasValue('type') ? $this->Html->link($machine->type->name, ['controller' => 'Types', 'action' => 'view', $machine->type->type_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $machine->machine_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $machine->machine_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $machine->machine_id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->machine_id)]) ?>
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