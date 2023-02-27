<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateMilitarymiKindergartenServicePhoto extends Migration
{
    public function up()
    {
        Schema::create('militarymi_kindergarten_service_photo', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('photo_path');
            $table->string('caption');
            $table->boolean('is_main');
            $table->integer('service_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('militarymi_kindergarten_service_photo');
    }
}
