<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEchelon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echelon', function (Blueprint $table) {
            $table->increments('id');
            $table->Date('Date');
            $table->enum('note',['قسم فرعي 01','قسم فرعي 02','قسم فرعي 03','قسم فرعي 04','قسم فرعي 05','قسم فرعي 06','قسم فرعي 07','قسم فرعي 08','قسم فرعي 09','قسم فرعي 10','قسم فرعي 11','قسم فرعي 12']);
            $table->integer('id_ensg')->unsigned();
            $table->foreign('id_ensg')
                ->references('id')->on('enseignant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echelon');
    }
}
