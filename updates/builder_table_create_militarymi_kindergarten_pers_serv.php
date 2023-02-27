<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateMilitarymiKindergartenPersServ extends Migration
{
    public function up()
    {
        Schema::create('militarymi_kindergarten_pers_serv', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('serv_id');
            $table->integer('pers_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->primary(['serv_id','pers_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('militarymi_kindergarten_pers_serv');
    }
}
