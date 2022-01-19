<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactureOF extends Model
{
    protected $table = 'facture_o_f_s';
    
    public $timestamps = true;
    protected $fillable = [
        'qte1choice','qte2choice','amount','ofId','factureId'
    ];

    protected $dates = ['deleted_at'];
}
