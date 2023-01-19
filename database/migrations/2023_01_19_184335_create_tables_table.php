<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->integer('minimum_capacity');
            $table->integer('maximum_capacity');
            $table->boolean('active');
            $table->integer('restaurant_id');
            $table->integer('dining_area_id');
            $table->index('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->index('dining_area_id');
            $table->foreign('dining_area_id')->references('id')->on('dining_areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('tables', function(Blueprint $table) {
            $table->dropForeign('restaurant_id');
            $table->dropForeign('dining_area_id');
            $table->dropIndex('restaurant_id');
            $table->dropIndex('dining_area_id');
            $table->dropColumn('restaurant_id');
            $table->dropColumn('dining_area_id');
        });
        Schema::dropIfExists('tables');
    }
}
