<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiningAreaRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up(): void
    {
        Schema::create('dining_area_restaurant', function (Blueprint $table) {
            $table->id();
            $table->index('restaurant_id');
            $table->integer('restaurant_id');
            $table->integer('dining_area_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('dining_area_id')->references('id')->on('dining_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('dining_area_restaurant', function(Blueprint $table) {
            $table->dropForeign('restaurant_id');
            $table->dropIndex('restaurant_id');
            $table->dropColumn('restaurant_id');
        });
        Schema::dropIfExists('dining_area_restaurant');
    }
}
