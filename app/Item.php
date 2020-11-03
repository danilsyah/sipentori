<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use Softdeletes;

    protected $fillable = [
        'categories_id',
        'item_no',
        'description',
        'stok_min',
        'unit',
        'price'
    ];

    protected $hidden = [];

    // relasi  one-to-one ke model category
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id','id');
    }

    // relasi one-to-many ke model gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'items_id', 'id');
		}
}
