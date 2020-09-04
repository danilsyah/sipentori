<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $hidden = [];

    public function items(){
        return $this->hasMany(Item::class, 'categories_id', 'id');
    }
}
