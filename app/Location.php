<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use Softdeletes;

    protected $fillable = [
        'kode',
        'description',
        'pic'
    ];

    protected $hidden = [];
}
