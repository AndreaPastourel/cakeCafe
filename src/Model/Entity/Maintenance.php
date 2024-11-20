<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Maintenance Entity
 *
 * @property int $id_maintenance
 * @property string|null $name
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $created
 * @property string|null $modified
 * @property string|null $description
 * @property int|null $machine_id
 *
 * @property \App\Model\Entity\Machine $machine
 */
class Maintenance extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'description' => true,
        'machine_id' => true,
        'machine' => true,
    ];
}
