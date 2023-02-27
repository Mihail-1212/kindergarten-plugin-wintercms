<?php namespace Militarymi\Kindergarten\Models;

use Model;

/**
 * Model
 */
class Personal extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'militarymi_kindergarten_personal';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public $belongsTo = [
      'job_position' => \Militarymi\Kindergarten\Models\PersonalJobPosition::class,
      'departament' => \Militarymi\Kindergarten\Models\Departament::class,
    ];

    public $belongsToMany = [
      'services' => [
          \Militarymi\Kindergarten\Models\Service::class,
          'table'    => 'militarymi_kindergarten_pers_serv',
          'key'      => 'pers_id',
          'otherKey' => 'serv_id',
      ],
    ];

    public static function getManagement() {
      $personal = Personal::all();

      $personal = $personal->where('is_management', 1);

      return $personal;
    }

    public function getFullName() {
      // Мокрушина Марина Геннадьевна
      $surname = $this->surname;
      $name = $this->name;
      $secondName = $this->second_name;
      $fullName = "{$surname} {$name} {$secondName}";
      return $fullName;
    }

    public function getShortName() {
      // Мокрушина М.Г.

      return $this->getFullName();
    }
}
