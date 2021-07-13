<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class rt extends Model
{
    protected $table = 'rukun_tetangga';
    protected $fillable = [
        'RW_ID', 'RW_ID','RT'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('rukun_tetangga')->orderBy('RT_ID','DESC')->take(1)->get();
    }
}
