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
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <!-- Lien vers les différentes pages CRUD -->
            <a href="<?= $this->Url->build(['controller' => 'Packages', 'action' => 'index','plugin'=>null]) ?>">Forfaits</a>
            <a href="<?= $this->Url->build(['controller' => 'Reservations', 'action' => 'myReservations','plugin'=>null]) ?>">Mes Réservations</a>
            <a href="<?= $this->Url->build(['controller' => 'Games', 'action' => 'index','plugin'=>null]) ?>">Jeux</a>
            <a href="<?= $this->Url->build(['controller' => 'Machines', 'action' => 'index','plugin'=>null]) ?>">Machines</a>
            <a href="<?= $this->Url->build(['controller' => 'Maintenances', 'action' => 'index','plugin'=>null]) ?>">Maintenances</a>

            <!-- Vérifie si l'utilisateur est connecté -->
            <?php if ($this->request->getAttribute('identity')): ?>
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Déconnexion</a>
            <?php else: ?>
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">Connexion</a>
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']) ?>">Inscription</a>
            <?php endif; ?>
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