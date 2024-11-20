<h1>Mes Réservations</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nom du Forfait</th>
            <th>Prix</th>
            <th>Date de Réservation</th>
            <th>Date d'Expiration</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation): ?>
        <tr>
            <td><?= h($reservation->package->name) ?></td>
            <td><?= h($reservation->package->price) ?> €</td>
            <td><?= h($reservation->created) ?></td>
            <td><?= h($reservation->expired) ?></td>
            <td><?= h($reservation->status) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Retour aux Forfaits', ['controller' => 'Packages', 'action' => 'index'], ['class' => 'btn btn-secondary']) ?>