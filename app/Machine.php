<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machines';
    
    public $timestamps = true;
    protected $fillable = [
        'ref','type','marque','ilotId'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the ilot that owns the machine.
     */
    public function ilot()
    {
        return $this->belongsTo(Ilot::class, 'ilotId');
    }
}
