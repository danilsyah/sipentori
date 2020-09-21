<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use Softdeletes;

    protected $fillable = [
        'locations_id',
        'code',
        'note',
        'attachment',
        'status'
    ];

    // relasi one-to-one ke tabel locations
    public function location()
    {
        return $this->belongsTo(Location::class, 'locations_id', 'id');
    }
}
