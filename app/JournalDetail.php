<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JournalDetail extends Model
{
    use Softdeletes;

    protected $fillable = [
        'journals_id',
        'items_id',
        'serial_number',
        'qty',
        'note'
    ];

    public function journal(){
        return $this->belongsTo(Journal::class, 'journals_id', 'id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'items_id', 'id')->with('category');
	}

}
