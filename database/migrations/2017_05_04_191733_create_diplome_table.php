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
			            $table->increments('id');
            $table->enum('nom_Dip', ['بكالوريا', 'ليسانس', 'ماستر', 'مهندس', 'ماجستر','دكتوراه']);
            $table->string('division');
            $table->Date('Date_Dip');
                         $table->string('spec');
                         $table->integer('id_ensg')->unsigned();
                        $table->foreign('id_ensg')
                        ->references('id')->on('enseignant')
                            ->onDelete('cascade');

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
