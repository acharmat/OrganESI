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
            $table->enum('sexe', ['رجل', 'امرأة']);
            $table->date('date_n');	
            $table->string('lieu_n');
            $table->enum('spec', ['اعلام الي', 'رياضيات', 'لغات', 'أخرى']);            
            $table->enum('situation_f', ['أعزب', 'متزوج', 'مطلق', 'أرمل']);
            $table->integer('nbr_enf');
            $table->date('date_r');	         
            $table->rememberToken();
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
       Schema::dropIfExists('enseignant');
    }
}
