<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplome', function (Blueprint $table) {
			            $table->increments('id_Dip');
						$table->string('nom_Dip');
                        $table->Date('Date_Dip');
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
