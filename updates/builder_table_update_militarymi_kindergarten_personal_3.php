<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateMilitarymiKindergartenPersonal3 extends Migration
{
    public function up()
    {
        Schema::table('militarymi_kindergarten_personal', function($table)
        {
            $table->boolean('is_management');
        });
    }
    
    public function down()
    {
        Schema::table('militarymi_kindergarten_personal', function($table)
        {
            $table->dropColumn('is_management');
        });
    }
}
