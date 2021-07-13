<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'KAT_ID', 'JENIS_KAT'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('kategori')->orderBy('KAT_ID','DESC')->take(1)->get();
    }
}
