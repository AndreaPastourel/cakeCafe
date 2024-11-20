<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Machine Entity
 *
 * @property int $machine_id
 * @property string|null $processor
 * @property string|null $memory
 * @property string|null $os
 * @property string|null $status
 * @property int|null $type_id
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Game[] $games
 */
class Machine extends Entity
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
        'processor' => true,
        'memory' => true,
        'os' => true,
        'status' => true,
        'type_id' => true,
        'type' => true,
        'games' => true,
    ];
}
