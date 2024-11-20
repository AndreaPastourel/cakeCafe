<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id_reservation], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id_reservation], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id_reservation), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reservations view content">
            <h3><?= h($reservation->id_reservation) ?></h3>
            <table>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($reservation->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $reservation->hasValue('type') ? $this->Html->link($reservation->type->name, ['controller' => 'Types', 'action' => 'view', $reservation->type->type_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Package') ?></th>
                    <td><?= $reservation->hasValue('package') ? $this->Html->link($reservation->package->name, ['controller' => 'Packages', 'action' => 'view', $reservation->package->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reservation->hasValue('user') ? $this->Html->link($reservation->user->username, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reservation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($reservation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expired') ?></th>
                    <td><?= h($reservation->expired) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>