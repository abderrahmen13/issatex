<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    protected $table = 'tailles';
    
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The OrderFabrications that belong to the taille.
     */
    public function OrderFabrications()
    {
        return $this->belongsToMany(OrderFabrication::class, 'qte_par_tailles', 'tailleId', 'ofId');
    }
}
