<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coli extends Model
{
    protected $table = 'colis';
    
    public $timestamps = true;
    protected $fillable = [
        'numero','ofId'
    ];

    protected $dates = ['deleted_at'];
}
