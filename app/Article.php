<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    
    public $timestamps = true;
    protected $fillable = [
        'ref','designation','composition','available'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the OrderFabrications for this Article.
     */
    public function orderFabrications()
    {
        return $this->hasMany(OrderFabrication::class, 'articleId');
    }
}
