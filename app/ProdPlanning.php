<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdPlanning extends Model
{
    protected $table = 'prod_plannings';
    
    public $timestamps = true;
    protected $fillable = [
        'ref','qtePlanned','qteFabricated1','qteFabricated2','observation','date','status','ofId','ilotId','userId'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the orderFabrication owns the prodPlanning.
     */
    public function orderFabrication()
    {
        return $this->belongsTo(OrderFabrication::class, 'ofId');
    }

    /**
     * Get the ilot that owns the OrderFabrication.
     */
    public function ilot()
    {
        return $this->belongsTo(Ilot::class, 'ilotId');
    }
}
