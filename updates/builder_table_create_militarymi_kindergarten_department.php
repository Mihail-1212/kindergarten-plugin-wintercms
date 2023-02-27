<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateMilitarymiKindergartenDepartment extends Migration
{
    public function up()
    {
        Schema::create('militarymi_kindergarten_department', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('contact_phone');
            $table->boolean('is_main');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('militarymi_kindergarten_department');
    }
}
