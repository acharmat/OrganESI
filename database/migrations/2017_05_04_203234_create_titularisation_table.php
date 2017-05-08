<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitularisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Titularisation', function (Blueprint $table) {
            $table->increments('id_Tito');
            $table->Date('Date');
            $table->float('note');
		    $table->foreign('id_ensg')->unsigned();
			$table->foreign('id_ens')
                  ->references('id_ens')->on('enseignant');
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
        //
    }
}
