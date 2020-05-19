<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_management', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('cars_id')->unsigned();
            $table->integer('segments_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('cars_id')->references('id')->on('cars');
            $table->foreign('segments_id')->references('id')->on('segments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_management');
        $table->dropForeign('car_management_cars_id_foreign');
        $table->dropForeign('car_management_segments_id_foreign');
        $table->dropForeign('car_management_user_id_foreign');
    }
}
