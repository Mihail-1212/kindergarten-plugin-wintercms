<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateMilitarymiKindergartenDepartment2 extends Migration
{
    public function up()
    {
        Schema::table('militarymi_kindergarten_department', function($table)
        {
            $table->string('email');
        });
    }
    
    public function down()
    {
        Schema::table('militarymi_kindergarten_department', function($table)
        {
            $table->dropColumn('email');
        });
    }
}
