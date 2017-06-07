<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conge', function (Blueprint $table) {
            $table->increments('id');
            $table->Date('Date_debut');
            $table->Date('Date_fin');
            $table->enum('Type',['مدة طويلة','مرضية','أمومة','علمية']);
            $table->enum('decision',['مقبول','مرفوض','مراجعة']);
            $table->integer('id_ensg')->unsigned();
            $table->foreign('id_ensg')
                ->references('id')->on('enseignant') ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conge');
    }
}
