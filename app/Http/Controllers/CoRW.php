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

class CoRW extends Controller
{
    public function home()
    {
        $idd = Session::get('idd');
        $irw = Session::get('rwid');
        $data = DB::SELECT("select*from pengguna");
        $dsn = DB::SELECT("select*from dusun group by NAMA_DSN");
        $rt = DB::SELECT("select COUNT(*) as jum from pengguna a, rukun_warga b where a.RW_ID = b.RW_ID AND a.DUSUN_ID = '$idd' and a.LEVEL = 'Ketua RT' and a.HAPUS = 0 and b.HAPUS = 0 ");
        $jwar = DB::SELECT("select COUNT(*) as jum from pengguna a, rukun_warga b where a.RW_ID = b.RW_ID AND a.DUSUN_ID = '$idd' and a.LEVEL = 'Warga'and a.HAPUS = 0 and b.HAPUS = 0  ");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RW_ID = '$irw' and b.HAPUS = 0 group by a.KAT_ID");
            
        return view('/karw/home',['data'=>$data,'dsn'=>$dsn,'jrt'=>$rt,'jwar'=>$jwar,'irw'=>$irw,'katb'=>$katb]);
    }

    public function updkarw(Request $request,$id)
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


    public function dtaber()
    {   
        $irw = Session::get('rwid');
        $ni = Session::get('nik');
        $idb = berita::getId();
        $katber = DB::SELECT("select*from kategori");
        $berita = DB::SELECT("select*from berita a, pengguna b, kategori c where a.PENG_ID = b.PENG_ID and a.KAT_ID = c.KAT_ID and a.HAPUS = 0 and a.RW_ID = '$irw' order by a.BERITA_ID ");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RW_ID = '$irw' group by a.KAT_ID");
        return view('/karw/dt_berita',['data'=>$berita,'idb'=>$idb,'katber'=>$katber,'irw'=>$irw,'katb'=>$katb]);
    }

    public function addber(Request $request)
    {
        $idb = $request->idb;
        $pen = $request->pen;
        $rw = $request->rw;
        $jud = $request->jud;
        $kat = $request->kat;
        $isi = $request->isi;
        $fo = $request->foto;

        if($fo == null){
            $foto = 'defaultberita.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/berita/", $foto);
        }

       $data = new berita();
        if($idb == null){
            $data->BERITA_ID = 1;
        }else{
            $data->BERITA_ID = $idb;
        }
        $data->RW_ID = $rw;
        $data->KAT_ID = $kat;
        $data->PENG_ID = $pen;
        $data->JUDUL = $jud;
        $data->ISI = $isi;
        $data->FOTO = $foto;
        $data->STATUS = 'Aktif';
        $data->save();

        return redirect('databeritarw')->with('addpeng','.');
    }

    public function updber(Request $request,$id)
    {
        $idb = $request->idb;
        $jud = $request->jud;
        $kat = $request->kat;
        $isi = $request->isi;
        $sta = $request->sta;
        $fo = $request->foto;

        if($request->file('foto')==null){

            $data = DB::table('berita')->where('BERITA_ID',$id)->update(['JUDUL'=>ucfirst($jud),'KAT_ID'=>$kat,'ISI'=>$isi,'STATUS'=>$sta]);

        }else{
            $gam = DB::SELECT("select*from berita where BERITA_ID = '$id'");
             foreach ($gam as $key) {
               if($key->FOTO == 'defaultberita.png'){

                }else{
                    $image_path = "assets/berita/$key->FOTO";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }

                $photo_path=$request->file('foto');
                $m_path=$photo_path->getClientOriginalName();
                $photo_path->move('assets/berita/',$m_path);

            $data = DB::table('berita')->where('BERITA_ID',$id)->update(['JUDUL'=>ucfirst($jud),'KAT_ID'=>$kat,'ISI'=>$isi,'STATUS'=>$sta,'FOTO'=>"$m_path"]);
        }
        
        return redirect('databeritarw')->with('updpeng','.');
    }

    public function delber($id)
    {

        $gam = DB::SELECT("select*from berita where BERITA_ID = '$id'");
         foreach ($gam as $key) {
           if($key->FOTO == 'defaultprofile.png'){

            }else{
                $image_path = "assets/foto/$key->foto";
                if(File::exists($image_path)) {
                File::delete($image_path);
                }
            }
        }

        $data = DB::table('berita')->where('BERITA_ID',$id)->update(['HAPUS'=>'1']);

        return redirect('databeritart')->with('delpeng','.');
    }

    public function berita($id)
    {
        $irw = Session::get('rwid');
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RW_ID = '$irw' group by a.KAT_ID");

        $data = DB::SELECT("select*, LEFT(a.ISI,100) isi, a.FOTO as foto from berita a, kategori b, pengguna c, rukun_tetangga d  where a.KAT_ID = b.KAT_ID and a.PENG_ID = c.PENG_ID and a.RW_ID = '$irw' and b.JENIS_KAT = '$id' and a.RT_ID = d.RT_ID and a.HAPUS = 0 order by a.BERITA_ID DESC");
            
        return view('/karw/berita',['data'=>$data,'irw'=>$irw,'katb'=>$katb]);
    }

    public function diskusi($id)
    {
        $irw = Session::get('rwid');
        $idk = komen::getId();
        $data = DB::SELECT("select*from berita where BERITA_ID = '$id'");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RW_ID = '$irw' group by a.KAT_ID");
        $chat = DB::SELECT("select*from komen a, pengguna c where a.PENG_ID = c.PENG_ID and a.BERITA_ID = '$id' order by a.TGL ASC");            
        return view('/karw/diskusi',['katb'=>$katb,'data'=>$data,'chat'=>$chat,'idk'=>$idk]);
    }

    public function komen(Request $request)
    {
        $idk = $request->idk;
        $idb = $request->idb;
        $pen = $request->pen;
        $kmn = $request->komen;
        $tgl = date('Y-m-d H:i:s');


       $data = new komen();
        if($idk == null){
            $data->KOMEN_ID = 1;
        }else{
            $data->KOMEN_ID = $idk;
        }
        $data->BERITA_ID = $idb;
        $data->PENG_ID = $pen;
        $data->KOMEN = $kmn;
        $data->STATUS = 'Aktif';
        $data->TGL = $tgl;
        $data->save();

        return redirect()->back()->with('komen','.');

    }


    public function delkomen($id)
    {
        DB::table('komen')->where('KOMEN_ID',$id)->delete();

        return redirect()->back()->with('komen','.');
    }

    public function aktkomen(Request $request,$id)
    {
        
        $data = DB::table('komen')->where('KOMEN_ID',$id)->update(['STATUS'=>'Aktif']);

        return redirect()->back()->with('addpeng','.');
    }

    public function nonkomen(Request $request,$id)
    {
        
        $data = DB::table('komen')->where('KOMEN_ID',$id)->update(['STATUS'=>'Nonaktif']);

        return redirect()->back()->with('addpeng','.');
    }
}