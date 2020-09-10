<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'items_id',
        'image'
    ];

    protected $hidden = [

    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'items_id', 'id');
    }
}
