<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palette extends Model
{
    protected $table = 'palettes';
    
    public $timestamps = true;
    protected $fillable = [
        'ref','numberColis','totalNumberArticles','shippingDate','ofId'
    ];

    protected $dates = ['deleted_at'];
}
