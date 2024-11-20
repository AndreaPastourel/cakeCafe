<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $expired
 * @property string|null $status
 * @property int|null $type_id
 * @property int $package_id
 * @property string $user_id
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Package $package
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Reservation extends Entity
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
        'created' => true,
        'expired' => true,
        'status' => true,
        'type_id' => true,
        'package_id' => true,
        'user_id' => true,
        'type' => true,
        'package' => true,
        'user' => true,
    ];
}
