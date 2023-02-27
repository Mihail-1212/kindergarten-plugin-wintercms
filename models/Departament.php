<?php namespace Militarymi\Kindergarten\Models;

use Model;

/**
 * Model
 */
class Departament extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'militarymi_kindergarten_department';

    /**
     * @var array Validation rules
     */
    public $rules = [
      'email' => 'email',
    ];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public $hasMany = [
      'departament_photos' => \Militarymi\Kindergarten\Models\DepartamentPhoto::class,
      'personal' => \Militarymi\Kindergarten\Models\Personal::class,
    ];

    public $belongsToMany = [
      'services' => [
          \Militarymi\Kindergarten\Models\Service::class,
          'table'    => 'militarymi_kindergarten_dep_serv',
          'key'      => 'dep_id',
          'otherKey' => 'serv_id'
      ]
    ];

    public function getShortAddress() {
      // г. Пермь, ул. Закамская, д. 15
      $city = $this->city;
      $street = $this->street;
      $houseNumber = $this->house;
      $corpus = $this->corpus;

      $address = "г. {$city}, ул. {$street}, д. {$houseNumber}";
      $address = $address . ( !empty($corpus) ? ", корпус {$corpus}" : '' );

      return "$address";
    }

    public function getFullAddress() {
      // г. Пермь, ул. Автозаводская, д. 47, Почтовый индекс 614101

      $city = $this->city;
      $street = $this->street;
      $houseNumber = $this->house;
      $corpus = $this->corpus;
      $postcode = $this->postcode;

      $address = "г. {$city}, ул. {$street}, д. {$houseNumber}, ";
      $address = $address . ( !empty($corpus) ? "корпус {$corpus}, " : '' );
      $address = $address . "Почтовый индекс {$postcode}";

      return $address;
    }
}
