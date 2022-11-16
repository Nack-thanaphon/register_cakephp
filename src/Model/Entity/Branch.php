<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Branch Entity
 *
 * @property int $id
 * @property string $b_name
 * @property string $b_province
 * @property string $b_map
 * @property int $b_status
 * @property string $b_phone
 * @property string $b_link
 * @property \Cake\I18n\FrozenTime $b_created_at
 */
class Branch extends Entity
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
    protected $_accessible = [
        'b_name' => true,
        'b_province' => true,
        'b_map' => true,
        'b_status' => true,
        'b_phone' => true,
        'b_link' => true,
        'b_created_at' => true,
    ];
}
