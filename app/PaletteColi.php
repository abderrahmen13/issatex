<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaletteColi extends Model
{
    protected $table = 'palette_colis';
    
    public $timestamps = true;
    protected $fillable = [
        'numArticle','quality1','quality2','coliId','paletteId'
    ];

    protected $dates = ['deleted_at'];
}
