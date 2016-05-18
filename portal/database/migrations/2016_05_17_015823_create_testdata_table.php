<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testdata', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('name');
                        $table->integer('mobile');
                        $table->string('address');
                        $table->string('introduction');
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
        Schema::drop('testdata');
    }
}
