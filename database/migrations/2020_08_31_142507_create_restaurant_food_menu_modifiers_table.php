<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFoodMenuModifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_food_menu_modifiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 10, 2);
            $table->text('description');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->string('user_id', 6);
            $table->enum('del_status', ['Live', 'Deleted'])->default('Live');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_restaurant_food_menu_modifiers');
    }
}
