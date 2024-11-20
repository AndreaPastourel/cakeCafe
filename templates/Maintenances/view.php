<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maintenance $maintenance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Maintenance'), ['action' => 'edit', $maintenance->id_maintenance], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Maintenance'), ['action' => 'delete', $maintenance->id_maintenance], ['confirm' => __('Are you sure you want to delete # {0}?', $maintenance->id_maintenance), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Maintenances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Maintenance'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="maintenances view content">
            <h3><?= h($maintenance->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($maintenance->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($maintenance->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($maintenance->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($maintenance->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $maintenance->hasValue('machine') ? $this->Html->link($maintenance->machine->machine_id, ['controller' => 'Machines', 'action' => 'view', $maintenance->machine->machine_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Maintenance') ?></th>
                    <td><?= $this->Number->format($maintenance->id_maintenance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($maintenance->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>