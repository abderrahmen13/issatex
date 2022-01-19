<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $table = 'factures';
    
    public $timestamps = true;
    protected $fillable = [
        'numero','totalAmount','date'
    ];

    protected $dates = ['deleted_at'];
}
