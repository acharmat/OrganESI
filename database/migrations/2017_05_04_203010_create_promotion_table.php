<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Promotion', function (Blueprint $table) {
			            $table->increments('Id_Pro');
                        $table->Date('Date_prom');
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
