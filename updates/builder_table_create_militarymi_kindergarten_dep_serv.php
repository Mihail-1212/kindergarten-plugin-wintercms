<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateMilitarymiKindergartenDepServ extends Migration
{
    public function up()
    {
        Schema::create('militarymi_kindergarten_dep_serv', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('serv_id');
            $table->integer('dep_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->primary(['serv_id','dep_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('militarymi_kindergarten_dep_serv');
    }
}
