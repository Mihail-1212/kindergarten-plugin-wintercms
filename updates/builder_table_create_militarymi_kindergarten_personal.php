<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateMilitarymiKindergartenPersonal extends Migration
{
    public function up()
    {
        Schema::create('militarymi_kindergarten_personal', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('surname');
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->string('contact_phone');
            $table->string('photo_path');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('militarymi_kindergarten_personal');
    }
}
