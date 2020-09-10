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

    // relasi table category
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id','id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'item_id', 'id');
    }
}
