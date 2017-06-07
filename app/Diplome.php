<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    protected $table = 'diplome';
    public $timestamps = false;

    /* public function conges(){

         return $this->hasMany('App\Conge');
     }

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'nom_Dip', 'Date_Dip', 'spec', 'id_ensg','division'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}
