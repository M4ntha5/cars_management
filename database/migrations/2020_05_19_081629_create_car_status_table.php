<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cars_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->date('date_from');
            $table->date('date_to');
            $table->timestamps();

            $table->foreign('cars_id')->references('id')->on('cars');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_status');
        $table->dropForeign('car_status_cars_id_foreign');
        $table->dropForeign('car_status_status_id_foreign');
    }
}
