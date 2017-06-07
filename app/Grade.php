<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{ protected $table = 'grade';
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
        'designation', 'Date_grad', 'id_ensg'
    ];
}
