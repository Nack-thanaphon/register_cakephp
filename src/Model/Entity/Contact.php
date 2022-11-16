<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string|null $b_name
 * @property string|null $b_adress
 * @property string|null $b_phone
 * @property string|null $b_phone1
 * @property string|null $b_phone2
 * @property string|null $b_phone3
 * @property string|null $b_social
 * @property string|null $b_social1
 * @property string|null $b_social2
 * @property string|null $b_payment1
 * @property string|null $b_payment2
 * @property string|null $b_payment3
 * @property string|null $b_img
 * @property string|null $b_img1
 * @property string|null $b_img2
 * @property string|null $b_img3
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $created_at
 */
class Contact extends Entity
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
        'b_adress' => true,
        'b_phone' => true,
        'b_phone1' => true,
        'b_phone2' => true,
        'b_phone3' => true,
        'b_social' => true,
        'b_social1' => true,
        'b_social2' => true,
        'b_payment1' => true,
        'b_payment2' => true,
        'b_payment3' => true,
        'b_img' => true,
        'b_img1' => true,
        'b_img2' => true,
        'b_img3' => true,
        'updated_at' => true,
        'created_at' => true,
    ];
}
