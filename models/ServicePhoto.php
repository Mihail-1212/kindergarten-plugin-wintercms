<?php namespace Militarymi\Kindergarten\Models;

use Model;

/**
 * Model
 */
class ServicePhoto extends Model
{
    use \Winter\Storm\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'militarymi_kindergarten_service_photo';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
      'service' => \Militarymi\Kindergarten\Models\Service::class
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];
}
