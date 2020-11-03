<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransferOrder extends Model
{
		use Softdeletes;
		
		protected $fillable = [
			'code',
			'locations_id',
			'note',
			'status'
		];

		public function location(){
			return $this->belongsTo(Location::class, 'locations_id', 'id');
		}
}
