<h1>Liste des Forfaits</h1>
<div class="mb-3">
   
    <?php $this->loadHelper('Authentication.Identity');?>
    <?php if ($this->Identity->isLoggedIn() && $this->Identity->get('role') === 'admin'): ?>
    <?= $this->Html->link('Ajouter un Forfait', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?php endif; ?>
    
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
                <?php if ($this->Identity->isLoggedIn()): ?>
            <!-- Utilisateur connecté : bouton Commander -->
            <?= $this->Html->link(
                'Commander',
                ['controller' => 'Orders', 'action' => 'add', $package->id],
                ['class' => 'btn btn-primary']
            ); ?>
        <?php else: ?>
            <!-- Utilisateur non connecté : bouton Se connecter -->
            <?= $this->Html->link(
                'Se connecter',
                ['controller' => 'Users', 'action' => 'login'],
                ['class' => 'btn btn-secondary']
            ); ?>
        <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>