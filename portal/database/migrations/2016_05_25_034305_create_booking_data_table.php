<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_data',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('customer_id');
            $table->integer('room_id');
            $table->integer('start_date');
            $table->integer('start_time');
            $table->integer('end_date');
            $table->integer('end_time');
            $table->string('purpose');
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
        Schema::drop('booking_data');
    }
}
