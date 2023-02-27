<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateMilitarymiKindergartenService extends Migration
{
    public function up()
    {
        Schema::table('militarymi_kindergarten_service', function($table)
        {
            $table->text('description');
            $table->string('duration');
            $table->string('link');
        });
    }
    
    public function down()
    {
        Schema::table('militarymi_kindergarten_service', function($table)
        {
            $table->dropColumn('description');
            $table->dropColumn('duration');
            $table->dropColumn('link');
        });
    }
}
