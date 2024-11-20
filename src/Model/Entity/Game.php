<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property int $games_id
 * @property string|null $name
 * @property string|null $genre
 * @property string|null $publisher
 * @property \Cake\I18n\Date|null $realease_date
 *
 * @property \App\Model\Entity\Machine[] $machines
 */
class Game extends Entity
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
        'genre' => true,
        'publisher' => true,
        'realease_date' => true,
        'machines' => true,
    ];
}
