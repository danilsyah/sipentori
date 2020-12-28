<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Item;

class OrderDetail extends Model
{
    use Softdeletes;

    protected $fillable = [
        'orders_id',
        'items_id',
        'serial_number',
        'qty',
        'condition',
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'items_id', 'id')->with('category');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'orders_id', 'id')->with('location');
    }
}