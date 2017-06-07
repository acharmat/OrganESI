<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->string('sujet');
            $table->text('contenu');
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin')
                ->references('id')->on('administrateur')
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
        Schema::dropIfExists('decision');
    }
}
