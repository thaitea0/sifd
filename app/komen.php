<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class komen extends Model
{
    protected $table = 'komen';
    protected $fillable = [
        'KOMEN_ID', 'BERITA_ID', 'NIK','KOMEN','STATUS','TGL'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('komen')->orderBy('KOMEN_ID','DESC')->take(1)->get();
    }
}
