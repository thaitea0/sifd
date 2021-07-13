<?php

namespace App\Http\Controllers;

use Session;
use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use Authenticate;
use DB;
use App\pengguna;
use App\dusun;
use App\rw;
use App\warga;
use App\kategori;
use App\berita;
use App\komen;

class CoKades extends Controller
{
    public function home()
    {
        $data = DB::SELECT("select*from pengguna where HAPUS = 0");
        $dsn = DB::SELECT("select*from dusun where HAPUS = 0 group by NAMA_DSN");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");
        $jdsn= DB::SELECT("SELECT COUNT(*) as dusun FROM dusun WHERE HAPUS = 0");
        $jarw= DB::SELECT("SELECT COUNT(*) as rw FROM rukun_warga a, pengguna b WHERE a.RW_ID = b.RW_ID AND b.LEVEL = 'Ketua RW' AND a.HAPUS = 0 AND b.HAPUS = 0");
        $jart = DB::SELECT("SELECT COUNT(*) as rt FROM rukun_tetangga b, pengguna c  WHERE  b.RT_ID = c.RT_ID AND c.LEVEL = 'Ketua RT' AND b.HAPUS = 0 and c.HAPUS = 0");
        $jwar = DB::SELECT("SELECT COUNT(*) as warga FROM  pengguna c WHERE  c.LEVEL = 'Warga' AND c.HAPUS = 0");
            
        return view('/kades/home',['data'=>$data,'dsn'=>$dsn,'katb'=>$katb,'jdsn'=>$jdsn,'jarw'=>$jarw,'jart'=>$jart,'jwar'=>$jwar]);
    }

    public function updkades(Request $request,$id)
    {
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $fo = $request->foto;

        $ge = $request->gender;
        $al = $request->alamat;
        $ag = $request->agama;
        $no = $request->no;


        if($request->file('foto')==null){

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa]);

            $data = DB::table('warga')->where('PENG_ID',$id)->update(['NAMA_WG'=>ucfirst($na),'GENDER'=>$ge,'ALAMAT'=>$al,'AGAMA'=>$ag,'NO_TELP'=>$no]);


        }else{
            $gam = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
            foreach ($gam as $key) {
                if($key->FOTO == 'defaultprofile.png'){

                }else{
                    $image_path = "assets/foto/$key->FOTO";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }

                $photo_path=$request->file('foto');
                $m_path=$photo_path->getClientOriginalName();
                $photo_path->move('assets/foto/',$m_path);

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'FOTO'=>"$m_path"]);

            $data = DB::table('warga')->where('PENG_ID',$id)->update(['NAMA_WG'=>ucfirst($na),'GENDER'=>$ge,'ALAMAT'=>$al,'AGAMA'=>$ag,'NO_TELP'=>$no]);

        }
        return redirect()->back()->with('addpeng','.');
    }

    public function dtakat()
    {   
        $katb = DB::SELECT("select*from berita a, kategori b  where a.KAT_ID = b.KAT_ID group by a.KAT_ID ");

        $data = DB::SELECT("select*from kategori where HAPUS = 0");
        return view('/kades/dt_katber',['data'=>$data,'katb'=>$katb]);
    }

    public function dtaber()
    {   
        $berita = DB::SELECT("select*from berita a, pengguna b, kategori c where a.PENG_ID = b.PENG_ID and a.KAT_ID = c.KAT_ID");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");
        return view('/kades/dt_berita',['data'=>$berita,'katb'=>$katb]);
    }

    public function berita($id)
    {
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        $data = DB::SELECT("select*, LEFT(a.ISI,100) isi, a.FOTO as foto from berita a, kategori b, pengguna c where a.KAT_ID = b.KAT_ID and a.PENG_ID = c.PENG_ID and b.JENIS_KAT = '$id' and a.HAPUS = 0 order by a.BERITA_ID DESC");
            
        return view('/kades/berita',['data'=>$data,'katb'=>$katb]);
    }

    public function diskusi($id)
    {
        $data = DB::SELECT("select*from berita where BERITA_ID = '$id'");
        $katb = DB::SELECT("select*from berita a, kategori b, rukun_warga c  where a.KAT_ID = b.KAT_ID and a.RW_ID = c.RW_ID group by a.KAT_ID");
        $chat = DB::SELECT("select*from komen a, pengguna c where a.PENG_ID = c.PENG_ID and a.BERITA_ID = '$id' order by a.TGL ASC");            
        return view('/kades/diskusi',['data'=>$data,'katb'=>$katb,'chat'=>$chat]);
    }


    public function statwar()
    {   
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");
        
        $data = DB::SELECT("SELECT NAMA_DSN, COUNT(b.PENG_ID) as jum FROM dusun a, pengguna b WHERE a.DUSUN_ID = b.DUSUN_ID AND b.LEVEL NOT LIKE 'Kepala Desa' AND b.LEVEL NOT LIKE 'Staf IT' AND a.HAPUS = 0 AND b.HAPUS = 0 GROUP BY a.DUSUN_ID");
        return view('/kades/st_warga',['data'=>$data,'katb'=>$katb]);
    }

    public function statkat()
    {   
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");
        
        $data = DB::SELECT("select b.JENIS_KAT, COUNT(b.JENIS_KAT) jum from berita a, kategori b, rukun_warga c  where a.KAT_ID = b.KAT_ID and a.RW_ID = c.RW_ID and a.HAPUS = 0 and b.HAPUS = 0 and c.HAPUS = 0 group by b.KAT_ID");
        return view('/kades/st_katber',['data'=>$data,'katb'=>$katb]);
    }
}
