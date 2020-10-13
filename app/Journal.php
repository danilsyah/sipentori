<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Journal extends Model
{
    use Softdeletes;

    protected $fillable = [
        'code',
        'request_name',
        'issue_name'
    ];

    public static function getId(){
        return $getId = DB::table('journals')->orderBy('id','DESC')->take(1)->get();
    }
}
