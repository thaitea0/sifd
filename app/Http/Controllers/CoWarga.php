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

class CoWarga extends Controller
{
    public function home()
    {
        $idp = Session::get('idp');
        $irw = Session::get('rwid');
        $irt = Session::get('rtid');
	    $data = DB::SELECT("select*from pengguna");
        $dsn = DB::SELECT("select*from dusun where hapus = 0 group by NAMA_DSN");
        $rw = DB::SELECT("select*from rukun_warga");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RW_ID = '$irw' and a.RT_ID = '$irt' group by a.KAT_ID");
        $jber = DB::SELECT("select COUNT(*) as jum from berita where PENG_ID = '$idp' and HAPUS = 0");
            
        return view('/warga/home',['data'=>$data,'dsn'=>$dsn,'rw'=>$rw,'irw'=>$irw,'jber'=>$jber,'katb'=>$katb]);
    }

    public function updwar(Request $request,$id)
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
        $irt = Session::get('rtid');
        $ni = Session::get('idp');
        $idb = berita::getId();
        $katber = DB::SELECT("select*from kategori");
        $berita = DB::SELECT("select*from berita a, pengguna b, kategori c where a.PENG_ID = b.PENG_ID and a.KAT_ID = c.KAT_ID and a.PENG_ID = '$ni' and a.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RT_ID = '$irt' and a.RW_ID = '$irw' group by a.KAT_ID");
        return view('/warga/dt_berita',['data'=>$berita,'idb'=>$idb,'katber'=>$katber,'irw'=>$irw,'irt'=>$irt,'katb'=>$katb]);
    }

    public function addber(Request $request)
    {
        $idb = $request->idb;
        $pen = $request->pen;
        $rw = $request->rw;
        $rt = $request->rt;
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
        $data->RT_ID = $rt;
        $data->KAT_ID = $kat;
        $data->PENG_ID = $pen;
        $data->JUDUL = $jud;
        $data->ISI = $isi;
        $data->FOTO = $foto;
        $data->STATUS = 'Aktif';
        $data->save();

        return redirect('databerita')->with('addpeng','.');
    }

    public function updber(Request $request,$id)
    {
        $idb = $request->idb;
        $jud = $request->jud;
        $kat = $request->kat;
        $isi = $request->isi;
        $fo = $request->foto;

        if($request->file('foto')==null){

            $data = DB::table('berita')->where('BERITA_ID',$id)->update(['JUDUL'=>ucfirst($jud),'KAT_ID'=>$kat,'ISI'=>$isi]);

        }else{
            $gam = DB::SELECT("select*from berita where BERITA_ID = '$id'");
             foreach ($gam as $key) {
               if($key->FOTO == 'defaultberita.png'){

                }else{
                    $image_path = "assets/foto/$key->FOTO";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }

                $photo_path=$request->file('foto');
                $m_path=$photo_path->getClientOriginalName();
                $photo_path->move('assets/berita/',$m_path);

            $data = DB::table('berita')->where('BERITA_ID',$id)->update(['JUDUL'=>ucfirst($jud),'KAT_ID'=>$kat,'ISI'=>$isi,'FOTO'=>"$m_path"]);
        }
        
        return redirect('databerita')->with('updpeng','.');
    }

    public function delber($id)
    {
        DB::table('berita')->where('BERITA_ID',$id)->delete();

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

        return redirect('databerita')->with('delpeng','.');

    }

    public function berita($id)
    {
        $irw = Session::get('rwid');
        $irt = Session::get('rtid');
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RW_ID = '$irw' and a.RT_ID = '$irt' group by a.KAT_ID");

        $data = DB::SELECT("select*, LEFT(a.ISI,100) isi, a.FOTO as foto from berita a, kategori b, pengguna c where a.KAT_ID = b.KAT_ID and a.PENG_ID = c.PENG_ID and a.RW_ID = '$irw' and a.RT_ID = '$irt' and b.JENIS_KAT = '$id' and a.HAPUS = 0 order by a.BERITA_ID DESC");
            
        return view('/warga/berita',['data'=>$data,'irw'=>$irw,'katb'=>$katb]);
    }

    public function diskusi($id)
    {
        $irw = Session::get('rwid');
        $irt = Session::get('rtid');
        $idk = komen::getId();
        $data = DB::SELECT("select*from berita where BERITA_ID = '$id'");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID and a.RW_ID = '$irw' and a.RT_ID = '$irt' group by a.KAT_ID");
        $chat = DB::SELECT("select*from komen a, pengguna c where a.PENG_ID =  c.PENG_ID and a.BERITA_ID = '$id' order by a.TGL ASC");            
        return view('/warga/diskusi',['katb'=>$katb,'data'=>$data,'chat'=>$chat,'idk'=>$idk]);
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

}
