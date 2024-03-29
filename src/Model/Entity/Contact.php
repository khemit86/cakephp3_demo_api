<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property \Cake\I18n\FrozenTime|null $created
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
     * @var array
     */
	protected $_accessible = [
        'firstname' => true,
        'lastname' => true,
        'phone_number' => true,
        'address' => true,
        'company_id' => true,
        'notes' => true,
        'add_notes' => true,
        'internal_notes' => true,
        'comments' => true,
    ]; 

    
}
