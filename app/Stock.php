<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use Softdeletes;

    protected $fillable = [
        'items_id',
        'qty_total'
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'items_id', 'id')->with('category');
    }
}
