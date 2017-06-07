<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{

    protected $table = 'decision';
    public $timestamps = false;



     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'numero', 'sujet','contenu','id_admin'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
