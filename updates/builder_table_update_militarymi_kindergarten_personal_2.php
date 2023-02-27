<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateMilitarymiKindergartenPersonal2 extends Migration
{
    public function up()
    {
        Schema::table('militarymi_kindergarten_personal', function($table)
        {
            $table->integer('departament_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('militarymi_kindergarten_personal', function($table)
        {
            $table->dropColumn('departament_id');
        });
    }
}
