<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateMilitarymiKindergartenDepartamentPhoto extends Migration
{
    public function up()
    {
        Schema::table('militarymi_kindergarten_departament_photo', function($table)
        {
            $table->integer('departament_id');
        });
    }
    
    public function down()
    {
        Schema::table('militarymi_kindergarten_departament_photo', function($table)
        {
            $table->dropColumn('departament_id');
        });
    }
}
