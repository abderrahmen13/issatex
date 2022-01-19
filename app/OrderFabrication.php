<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFabrication extends Model
{
    protected $table = 'order_fabrications';
    
    public $timestamps = true;
    protected $fillable = [
        'ref','type','description','articleId','userId','ilotId',
        'date','estimatedTime','unitPrice','additionalCost','qualite','status'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the article that owns the OrderFabrication.
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'articleId');
    }

    /**
     * Get the user that owns the OrderFabrication.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Get the ilot that owns the OrderFabrication.
     */
    public function ilot()
    {
        return $this->belongsTo(Ilot::class, 'ilotId');
    }

    /**
     * The tailles that belong to the user.
     */
    public function tailles()
    {
        return $this->belongsToMany(Taille::class, 'qte_par_tailles', 'ofId', 'tailleId');
    }
}
