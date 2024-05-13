<?php namespace Banas\LakeManagement\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateLakeMeteringsTable Migration
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
        Schema::create('banas_lakemanagement_lake_meterings', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lake_id');
            $table->float('temperature');
            $table->timestamp('measured_at');
            $table->text('description');
            $table->foreign('lake_id')->references('id')->on('banas_lakemanagement_lakes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('banas_lakemanagement_lake_meterings');
    }
};
