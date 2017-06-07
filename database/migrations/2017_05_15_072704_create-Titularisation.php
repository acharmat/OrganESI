<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitularisation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Titularisation', function (Blueprint $table) {
            $table->increments('id');
            $table->Date('Date');
            $table->float('note');
            $table->integer('id_ensg')->unsigned();
            $table->foreign('id_ensg')
                ->references('id')->on('enseignant');
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
        Schema::dropIfExists('Titularisation');
    }
}
