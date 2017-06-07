<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrateur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('nom_fr');
            $table->string('adresse');
            $table->string('prenom_fr');
            $table->string('photo')->default('default.jpg');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('password');
            $table->enum('sexe', ['ذكر', 'أنثى']);
            $table->date('date_n');	
            $table->string('lieu_n');
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
        Schema::dropIfExists('administrateur');
    }
}
