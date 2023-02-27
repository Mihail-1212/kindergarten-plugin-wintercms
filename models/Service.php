<?php namespace Militarymi\Kindergarten\Models;

use Model;

/**
 * Model
 */
class Service extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'militarymi_kindergarten_service';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
      'service_photos' => \Militarymi\Kindergarten\Models\ServicePhoto::class
    ];

    public $belongsToMany = [
      'departaments' => [
          \Militarymi\Kindergarten\Models\Departament::class,
          'table'    => 'militarymi_kindergarten_dep_serv',
          'key'      => 'serv_id',
          'otherKey' => 'dep_id'
      ],
      'personal' => [
          \Militarymi\Kindergarten\Models\Personal::class,
          'table'    => 'militarymi_kindergarten_pers_serv',
          'key'      => 'serv_id',
          'otherKey' => 'pers_id'
      ],
    ];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public function getMainPhoto() {
      $photo = $this->service_photos->where('is_main', 1)->first();

      return $photo;
    }

    public function getGalleryPhotos() {
      $photos = $this->service_photos->where('is_main', 0);

      return $photos;
    }
}
