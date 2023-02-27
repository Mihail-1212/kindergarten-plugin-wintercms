<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateMilitarymiKindergartenPersonal extends Migration
{
    public function up()
    {
        Schema::table('militarymi_kindergarten_personal', function($table)
        {
            $table->integer('job_position_id');
        });
    }
    
    public function down()
    {
        Schema::table('militarymi_kindergarten_personal', function($table)
        {
            $table->dropColumn('job_position_id');
        });
    }
}
