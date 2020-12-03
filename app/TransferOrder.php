<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

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

		public static function getId(){
			return $getId = DB::table('transfer_orders')->orderBy('id','DESC')->take(1)->get();
		}
}
