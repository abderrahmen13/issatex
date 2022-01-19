<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QteParTaille extends Model
{
    protected $table = 'qte_par_tailles';
    
    public $timestamps = true;
    protected $fillable = [
        'qte','ofId','tailleId'
    ];

    protected $dates = ['deleted_at'];
}
