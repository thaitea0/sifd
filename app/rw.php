<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class rw extends Model
{
    protected $table = 'rukun_warga';
    protected $fillable = [
        'RW_ID', 'DUSUN_ID','RW'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('rukun_warga')->orderBy('RW_ID','DESC')->take(1)->get();
    }
}
