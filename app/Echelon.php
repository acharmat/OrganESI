<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Echelon extends Model
{
    protected $table = 'echelon';
    public $timestamps = false;


     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'note', 'Date', 'id_ensg'
    ];
}
