<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class warga extends Model
{
    protected $table = 'warga';
    protected $fillable = [
        'NIK','PENG_ID','NAMA_WG','GENDER','ALAMAT','AGAMA','NO_TELP'
    ];

    public $timestamps = false;
    
}
