<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->unsignedInteger('id_cd');
            $table->tinyInteger('days');
            $table->tinyInteger('many_cds');
            $table->enum('status_rent', ['Unreturned', 'returned']);
            $table->integer('total_price')->nullable();
            $table->foreign('id_cd')->references('id')->on('collection')->onDelete('cascade');
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
        Schema::dropIfExists('visitor');
    }
}
