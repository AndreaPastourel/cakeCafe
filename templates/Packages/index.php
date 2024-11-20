<h1>Liste des Forfaits</h1>
<div class="mb-3">
    <?= $this->Html->link('Ajouter un Forfait', ['action' => 'add'], ['class' => 'btn btn-success']) ?>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($packages as $package): ?>
        <tr>
            <td><?= h($package->name) ?></td>
            <td><?= h($package->price) ?> €</td>
            <td><?= h($package->description) ?></td>
            <td>
                <?= $this->Html->link('Voir', ['action' => 'view', $package->id]) ?>
                <?= $this->Html->link('Commander', ['controller' => 'Reservations', 'action' => 'reserve', $package->id], ['class' => 'btn btn-primary']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>