<?php namespace Militarymi\Kindergarten\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableDeleteMilitarymiKindergartenAddress extends Migration
{
    public function up()
    {
        Schema::dropIfExists('militarymi_kindergarten_address');
    }
    
    public function down()
    {
        Schema::create('militarymi_kindergarten_address', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('city', 191);
            $table->string('street', 191);
            $table->string('house', 191);
            $table->string('corpus', 191)->nullable();
            $table->string('postcode', 191);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
