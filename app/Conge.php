<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $table = 'conge';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Date_debut', 'Date_fin','Type','decision','avis','id_ensg'
    ];

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
**/
}
