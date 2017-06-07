<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('designation', ['أستاذ مساعد قسم ب','أستاذ مساعد قسم أ','أستاذ محاضر قسم ب', 'أستاذ محاضر قسم أ','بروفيسور']);
            $table->Date('Date_grad');
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
        Schema::dropIfExists('grade');
    }
}
