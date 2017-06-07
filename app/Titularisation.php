<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titularisation extends Model
{
    protected $table = 'Titularisation';
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
        'note', 'Date', 'id_ensg'
    ];
}
