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
            $table->integer('car_id')->unsigned();
            $table->integer('segment_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('segment_id')->references('id')->on('segments');
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
        $table->dropForeign('car_management_car_id_foreign');
        $table->dropForeign('car_management_segment_id_foreign');
        $table->dropForeign('car_management_user_id_foreign');
    }
}
