<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateMilitarymiKindergartenDepartment extends Migration
{
    public function up()
    {
        Schema::table('militarymi_kindergarten_department', function($table)
        {
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('corpus')->nullable();
            $table->string('postcode');
        });
    }
    
    public function down()
    {
        Schema::table('militarymi_kindergarten_department', function($table)
        {
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('house');
            $table->dropColumn('corpus');
            $table->dropColumn('postcode');
        });
    }
}
