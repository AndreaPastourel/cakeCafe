<h1>Réserver le Forfait : <?= h($package->name) ?></h1>

<?= $this->Form->create($reservation) ?>
<fieldset>
    <legend><?= __('Informations de Réservation') ?></legend>

    <!-- Supprimé le champ 'user_id' car il sera rempli automatiquement dans le contrôleur -->
    <?= $this->Form->control('package_id', ['type' => 'hidden', 'value' => $package->id]) ?>
    <?= $this->Form->control('type_id', [
        'type' => 'select',
        'options' => $types,
        'empty' => 'Sélectionner un type de package',
        'label' => 'Type de Package'
    ]) ?>

</fieldset>
<?= $this->Form->button(('Réserver')) ?>
<?= $this->Form->end() ?>