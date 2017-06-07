<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignant', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sec_s')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nom_fr');
            $table->string('prenom_fr');
            $table->string('photo')->default('default.jpg');
            $table->string('email')->unique();
            $table->text('adresse');
            $table->string('telephone');
            $table->string('password');
            $table->enum('sexe', ['ذكر', 'أنثى']);
            $table->date('date_n');	
            $table->string('lieu_n');
            $table->enum('situation_f', ['أعزب', 'متزوج', 'مطلق', 'أرمل']);
            $table->integer('nbr_enf')->default('0')->nullable();
            $table->date('date_r');
            $table->enum('statu', ['مرسم', 'متربص']);
            $table->date('date_s');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('enseignant');
    }
}
