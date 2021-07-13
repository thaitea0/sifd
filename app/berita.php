<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class berita extends Model
{
    protected $table = 'berita';
    protected $fillable = [
        'BERITA_ID','RW_ID','KAT_ID', 'NIK','JUDUL','ISI','STATUS'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('berita')->orderBy('BERITA_ID','DESC')->take(1)->get();
    }
}
