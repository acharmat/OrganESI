<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conge', function (Blueprint $table) {
            $table->increments('id_conge');
            $table->Date('Date_debut');
            $table->Date('Date_fin');
            $table->enum('Type',['Long_durée','Maladie','Matérnité','Scientifique']);
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
        Schema::table('conge', function (Blueprint $table) {
            //
        });
    }
}
