<?php namespace Banas\LakeManagement\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateLakesTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('banas_lakemanagement_lakes', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); 
            $table->text('description');
            $table->string('depth');
            $table->string('area');
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('banas_lakemanagement_lakes');
    }
};
