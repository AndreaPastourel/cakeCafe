<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
   <?php $this->loadHelper('Authentication.Identity');?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Arras </span>Games</a>
        </div>
        <div class="top-nav-links">
        <ul>
        <?php if ($this->Identity->isLoggedIn()): ?>
            <?php $user = $this->Identity->get('role'); ?>
            
            <!-- Utilisateur connecté -->
            <?php if ($user === 'admin'): ?>
                <li><?= $this->Html->link('Forfaits', ['controller' => 'Packages', 'action' => 'index','plugin' => null]); ?></li>
                <li><?= $this->Html->link('Réservations', ['controller' => 'Reservations', 'action' => 'index','plugin' => null]); ?></li>
                <li><?= $this->Html->link('Machines', ['controller' => 'Machines', 'action' => 'index','plugin' => null]); ?></li>
                <li><?= $this->Html->link('Maintenance', ['controller' => 'Maintenance', 'action' => 'index']); ?></li>
                <li><?= $this->Html->link('Mon compte', ['controller' => 'Users', 'action' => 'profil']); ?></li>
                <li><?= $this->Html->link('Déconnexion', ['controller' => 'Users', 'action' => 'logout']); ?></li>
            
            <?php else: ?>
                <!-- Utilisateur non admin mais connecté -->
                <li><?= $this->Html->link('Forfaits', ['controller' => 'Packages', 'action' => 'index','plugin' => null]); ?></li>
                <li><?= $this->Html->link('Mes Réservations', ['controller' => 'Reservations', 'action' => 'myReservations','plugin' => null]); ?></li>
                <li><?= $this->Html->link('Mon compte', ['controller' => 'Users', 'action' => 'profile']); ?></li>
                <li><?= $this->Html->link('Déconnexion', ['controller' => 'Users', 'action' => 'logout']); ?></li>
            <?php endif; ?>
        
        <?php else: ?>
            <!-- Utilisateur non connecté -->
            <li><?= $this->Html->link('Forfaits', ['controller' => 'Packages', 'action' => 'index','plugin' => null]); ?></li>
            <li><?= $this->Html->link('Connexion', ['controller' => 'Users', 'action' => 'login']); ?></li>
        <?php endif; ?>
    </ul>
        </div>
    </nav>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>© 2024 CakePHP - Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>