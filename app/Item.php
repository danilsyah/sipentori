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
        'unit',
        'price'
    ];

    protected $hidden = [];

    // relasi ke model category
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id','id');
    }

    // relasi ke model gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'items_id', 'id');
    }
}
