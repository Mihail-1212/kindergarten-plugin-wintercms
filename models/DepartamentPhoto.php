<?php namespace Militarymi\Kindergarten\Models;

use Model;

/**
 * Model
 */
class DepartamentPhoto extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'militarymi_kindergarten_departament_photo';

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
      'departament' => \Militarymi\Kindergarten\Models\Departament::class
    ];
}
