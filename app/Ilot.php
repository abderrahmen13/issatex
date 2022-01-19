<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ilot extends Model
{
    protected $table = 'ilots';
    
    public $timestamps = true;
    protected $fillable = [
        'name','timePresence','available'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the machines for this Ilot.
     */
    public function machines()
    {
        return $this->hasMany(Machine::class, 'ilotId');
    }
}
