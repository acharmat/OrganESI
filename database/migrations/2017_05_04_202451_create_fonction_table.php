<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFonctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fonction', function (Blueprint $table) {
            $table->increments('id_fonct');
			$table->string('Intitule_fonct');
			$table->foreign('id_ensg')->unsigned();
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
        //
    }
}
