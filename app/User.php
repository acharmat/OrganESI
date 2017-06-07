<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'enseignant';
    public $timestamps = false;


/*
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'sec_s', 'nom', 'prenom', 'nom_fr', 'prenom_fr', 'photo', 'email', 'adresse', 'telephone', 'password', 'sexe', 'date_n', 'lieu_n', 'situation_f', 'nbr_enf', 'date_r', 'statu', 'date_s'   ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
