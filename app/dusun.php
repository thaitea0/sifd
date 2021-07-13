<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class dusun extends Model
{
    protected $table = 'dusun';
    protected $fillable = [
        'DUSUN_ID', 'NAMA_DSN'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('dusun')->orderBy('DUSUN_ID','DESC')->take(1)->get();
    }
}
