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
use App\rt;
use App\warga;
use App\kategori;

class CoStaf extends Controller
{
    public function home()
    {
        $jdsn= DB::SELECT("SELECT COUNT(*) as dusun FROM dusun WHERE HAPUS = 0");
        $jarw= DB::SELECT("SELECT COUNT(*) as rw FROM rukun_warga a, pengguna b WHERE a.RW_ID = b.RW_ID AND b.LEVEL = 'Ketua RW' AND a.HAPUS = 0 and b.HAPUS = 0");
        $jart = DB::SELECT("SELECT COUNT(*) as rt FROM rukun_tetangga b, pengguna c  WHERE  b.RT_ID = c.RT_ID AND c.LEVEL = 'Ketua RT' AND b.HAPUS = 0 and c.HAPUS = 0");
        $jwar = DB::SELECT("SELECT COUNT(*) as warga FROM  pengguna c WHERE  c.LEVEL = 'Warga' AND c.HAPUS = 0 ");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");


        return view('/staf/home',['jdsn'=>$jdsn,'jart'=>$jart,'jarw'=>$jarw,'jwar'=>$jwar,'katb'=>$katb]);
    }

    public function updstaf(Request $request,$id)
    {
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $fo = $request->foto;


        if($request->file('foto')==null){

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa]);


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

        }
        return redirect()->back()->with('addpeng','.');
    }

    

    public function dtadsn()
    {   
        $idd = dusun::getId();
        $dadsn = DB::SELECT("select*from dusun where HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_dusun',['dadsn'=>$dadsn,'idd'=>$idd,'katb'=>$katb]);
    }

    public function adddusun(Request $request)
    {
        $id = $request->idd;
        $ds = $request->nama;

       $data = new dusun();
        if($id == null){
            $data->DUSUN_ID = 1;
        }else{
            $data->DUSUN_ID = $id;
        }
        $data->NAMA_DSN = ucfirst($ds);
        $data->save();

        return redirect('datadusun')->with('addpeng','.');

    }

    public function upddusun(Request $request,$id)
    {
        $ds = $request->nama;

            $data = DB::table('dusun')->where('DUSUN_ID',$id)->update(['NAMA_DSN'=>ucfirst($ds)]);
        
        return redirect('datadusun')->with('updpeng','.');
    }

    public function deldusun($id)
    {

        $data = DB::table('dusun')->where('DUSUN_ID',$id)->update(['HAPUS'=>'1']);

        return redirect('datadusun')->with('delpeng','.');

    }

    public function dtarw($id)
    {   
        $idr = rw::getId();
        $dsn = DB::SELECT("select*from dusun where DUSUN_ID = '$id'");
        $data = DB::SELECT("select*from rukun_warga a, dusun b where a.DUSUN_ID = b.DUSUN_ID and a.DUSUN_ID = '$id' and a.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_rw',['data'=>$data,'idr'=>$idr,'dsn'=>$dsn,'katb'=>$katb]);
    }

    public function addrw(Request $request)
    {
        $id = $request->idr;
        $ds = $request->idd;
        $rw = $request->rw;

       $data = new rw();
        if($id == null){
            $data->RW_ID = 1;
        }else{
            $data->RW_ID = $id;
        }
        $data->DUSUN_ID = $ds;
        $data->RW = $rw;

        $data->save();

        return redirect()->back()->with('addpeng','.');

    }

    public function updrw(Request $request,$id)
    {
        $rw = $request->rw;

        $data = DB::table('rukun_warga')->where('RW_ID',$id)->update(['RW'=>$rw]);
        
        return redirect()->back()->with('updpeng','.');
    }

    public function delrw($id)
    {
        // DB::table('rukun_warga')->where('RW_ID',$id)->delete();
        $data = DB::table('rukun_warga')->where('RW_ID',$id)->update(['HAPUS'=>'1']);

        return redirect()->back()->with('delpeng','.');
    }

    public function dtart($id)
    {   
        $idr = rt::getId();
        $dsn = DB::SELECT("select*from rukun_warga where RW_ID = '$id'");
        $dsnn = DB::SELECT("select*from dusun a, rukun_warga b where a.DUSUN_ID = b.DUSUN_ID AND b.RW_ID = '$id'");
        $data = DB::SELECT("select*from rukun_tetangga a, rukun_warga b where a.RW_ID = b.RW_ID and a.RW_ID = '$id' and a.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_rt',['data'=>$data,'idr'=>$idr,'dsn'=>$dsn,'dsnn'=>$dsnn,'katb'=>$katb]);
    }

    public function addrt(Request $request)
    {
        $id = $request->idr;
        $rw = $request->idd;
        $rt = $request->rt;

       $data = new rt();
        if($id == null){
            $data->RT_ID = 1;
        }else{
            $data->RT_ID = $id;
        }
        $data->RW_ID = $rw;
        $data->RT = $rt;

        $data->save();

        return redirect()->back()->with('addpeng','.');
    }

    public function updrt(Request $request,$id)
    {
        $rt = $request->rt;

        $data = DB::table('rukun_tetangga')->where('RT_ID',$id)->update(['RT'=>$rt]);
        
        return redirect()->back()->with('updpeng','.');
    }

    public function delrt($id)
    {
        $data = DB::table('rukun_tetangga')->where('RT_ID',$id)->update(['HAPUS'=>'1']);
        // DB::table('rukun_tetangga')->where('RT_ID',$id)->delete();

        return redirect()->back()->with('delpeng','.');
    }

    public function dtastaf()
    {   
        $idp = pengguna::getId();
        $data = DB::SELECT("select*from pengguna where LEVEL = 'Staf IT' and HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID and a.HAPUS = 0");

        return view('/staf/dt_pstaf',['data'=>$data,'idp'=>$idp,'katb'=>$katb]);
    }

    public function dtakades()
    {   
        $idp = pengguna::getId();
        $dusun = DB::SELECT("select*from dusun");
        $data = DB::SELECT("select*from pengguna b where b.LEVEL = 'Kepala Desa' and b.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_pkades',['idp'=>$idp,'data'=>$data,'dusun'=>$dusun,'katb'=>$katb]);
    }

    public function dtaketrw()
    {   
        $idp = pengguna::getId();
        $dusun = DB::SELECT("select*from dusun where HAPUS = 0");
        $rukwa = DB::SELECT("select*from rukun_warga where HAPUS = 0");
        $data = DB::SELECT("select*from pengguna a, dusun b, rukun_warga c where a.DUSUN_ID = b.DUSUN_ID and b.DUSUN_ID = c.DUSUN_ID and a.RW_ID = c.RW_ID and a.LEVEL = 'Ketua RW' and a.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_pketuarw',['idp'=>$idp,'data'=>$data,'dusun'=>$dusun,'rukwa'=>$rukwa,'katb'=>$katb]);
    }

    public function dtaketrt()
    {   
        $idp = pengguna::getId();
        $dusun = DB::SELECT("select*from dusun where HAPUS = 0");
        $rukwa = DB::SELECT("select*from rukun_warga where HAPUS = 0");
        $rukte = DB::SELECT("select*from rukun_tetangga where HAPUS = 0");
        $data = DB::SELECT("select*from pengguna a, dusun b, rukun_warga c, rukun_tetangga d where a.DUSUN_ID = b.DUSUN_ID and b.DUSUN_ID = c.DUSUN_ID and a.RW_ID = c.RW_ID and c.RW_ID = d.RW_ID and a.RT_ID = d.RT_ID and a.LEVEL = 'Ketua RT' and a.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_pketuart',['idp'=>$idp,'data'=>$data,'dusun'=>$dusun,'rukwa'=>$rukwa,'rukte'=>$rukte,'katb'=>$katb]);
    }

    public function dtawarga()
    {   
        $idp = pengguna::getId();
        $dusun = DB::SELECT("select*from dusun where HAPUS = 0");
        $rukwa = DB::SELECT("select*from rukun_warga where HAPUS = 0");
        $rukte = DB::SELECT("select*from rukun_tetangga where HAPUS = 0");
        $data = DB::SELECT("select*from pengguna a, dusun b, rukun_warga c, rukun_tetangga d, warga e where a.DUSUN_ID = b.DUSUN_ID and b.DUSUN_ID = c.DUSUN_ID and a.RW_ID = c.RW_ID and c.RW_ID = d.RW_ID and a.RT_ID = d.RT_ID and a.PENG_ID = e.PENG_ID and a.LEVEL = 'Warga' and a.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_pwarga',['idp'=>$idp,'data'=>$data,'dusun'=>$dusun,'rukwa'=>$rukwa,'rukte'=>$rukte,'katb'=>$katb]);
    }

    public function edwarga($id)
    {   
        $dusun = DB::SELECT("select*from dusun where HAPUS = 0");
        $rukwa = DB::SELECT("select*from rukun_warga where HAPUS = 0");
        $rukte = DB::SELECT("select*from rukun_tetangga where HAPUS = 0");
        $data = DB::SELECT("select*from pengguna a, dusun b, rukun_warga c, rukun_tetangga d, warga e where a.PENG_ID = '$id' and a.DUSUN_ID = b.DUSUN_ID and b.DUSUN_ID = c.DUSUN_ID and a.RW_ID = c.RW_ID and c.RW_ID = d.RW_ID and a.RT_ID = d.RT_ID and a.PENG_ID = e.PENG_ID and a.LEVEL = 'Warga' and a.HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/ed_pwarga',['data'=>$data,'dusun'=>$dusun,'rukwa'=>$rukwa,'rukte'=>$rukte,'katb'=>$katb]);
    }

    public function merkAjax($id){
        if($id==0){
            $rw = rw::all();
        }else{  
            $rw = rw::where('DUSUN_ID','=',$id)->where('HAPUS', '=', 0)->get();
        }
        return $rw;
    }

    public function rtAjax($id){
        if($id==0){
            $rt = rt::all();
        }else{  
            $rt = rt::where('RW_ID','=',$id)->where('HAPUS', '=', 0)->get();
        }
        return $rt;
    }

    public function addpeng(Request $request)
    {
        $id = $request->idp;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;
        $fo = $request->foto;

        $ds = $request->dusun;
        $rw = $request->rw;
        $rt = $request->rt;

        $ni = $request->idnik;
        $ge = $request->gender;
        $al = $request->alamat;
        $ag = $request->agama;
        $no = $request->no;

        if($fo == null){
            $foto = 'defaultprofile.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/foto/", $foto);
        }


            if($le == 'Staf IT'){
                $data = new pengguna();
                    if($id == null){
                        $data->PENG_ID = 1;
                    }else{
                        $data->PENG_ID = $id;
                    }

                $data->NAMA = ucfirst($na);
                $data->EMAIL = $em;
                $data->USERNAME = $us;
                $data->PASSWORD = $pa;
                $data->LEVEL = $le;
                $data->FOTO = $foto;
                $data->save();

                return redirect('datastaf')->with('addpeng','.');
            
            }else if($le == 'Kepala Desa'){

                $data = new pengguna();
                    if($id == null){
                        $data->PENG_ID = 1;
                    }else{
                        $data->PENG_ID = $id;
                    }

                $data->NAMA = ucfirst($na);
                $data->EMAIL = $em;
                $data->USERNAME = $us;
                $data->PASSWORD = $pa;
                $data->LEVEL = $le;
                $data->FOTO = $foto;
                $data->save();
            
                return redirect('datakades')->with('addpeng','.');

            }else if($le == 'Ketua RW'){

                // $cek = DB::table('pengguna')->where([['DUSUN_ID',$ds],['RW_ID',$rw],['RT_ID',null]])->get();
                $cek = DB::SELECT("SELECT*FROM pengguna WHERE DUSUN_ID = '$ds' AND RW_ID = '$rw' AND RT_ID is null");

                if ($cek == null){

                    $data = new pengguna();
                        if($id == null){
                            $data->PENG_ID = 1;
                        }else{
                            $data->PENG_ID = $id;
                        }

                    $data->DUSUN_ID = $ds;
                    $data->RW_ID = $rw;
                    $data->NAMA = ucfirst($na);
                    $data->EMAIL = $em;
                    $data->USERNAME = $us;
                    $data->PASSWORD = $pa;
                    $data->LEVEL = $le;
                    $data->FOTO = $foto;
                    $data->save();
                   
                    return redirect('dataketrw')->with('addpeng','.');

                }else{

                    return redirect('dataketrw')->with('gagal','.');

                }

            }else if($le == 'Ketua RT'){

                // $cek = DB::table('pengguna')->where([['DUSUN_ID',$ds],['RW_ID',$rw],['RT_ID',$rt]])->get();

                $cek = DB::SELECT("select*from pengguna where DUSUN_ID = '$ds' and RW_ID = '$rw' and RW_ID = '$rt'");


                if ($cek == null){

                        $data = new pengguna();
                            if($id == null){
                                $data->PENG_ID = 1;
                            }else{
                                $data->PENG_ID = $id;
                            }

                        $data->DUSUN_ID = $ds;
                        $data->RW_ID = $rw;
                        $data->RT_ID = $rt;
                        $data->NAMA = ucfirst($na);
                        $data->EMAIL = $em;
                        $data->USERNAME = $us;
                        $data->PASSWORD = $pa;
                        $data->LEVEL = $le;
                        $data->FOTO = $foto;
                        $data->save();
                       
                        return redirect('dataketrt')->with('addpeng','.');

                }else{

                        return redirect('dataketrt')->with('gagal','.');

                }

            }else if($le == 'Warga'){

                $data = new pengguna();
                    if($id == null){
                        $data->PENG_ID = 1;
                    }else{
                        $data->PENG_ID = $id;
                    }

                $data->DUSUN_ID = $ds;
                $data->RW_ID = $rw;
                $data->RT_ID = $rt;
                $data->NAMA = ucfirst($na);
                $data->EMAIL = $em;
                $data->USERNAME = $us;
                $data->PASSWORD = $pa;
                $data->LEVEL = $le;
                $data->FOTO = $foto;
                $data->save();
                
                $data = new warga();
                if($id == null){
                    $data->PENG_ID = 1;
                }else{
                    $data->PENG_ID = $id;
                }

                if($id == null){
                    $data->NIK = 1;
                }else{
                    $data->NIK = $ni;
                }
                $data->NAMA_WG = ucfirst($na);
                $data->GENDER = $ge;
                $data->ALAMAT = $al;
                $data->AGAMA = $ag;
                $data->NO_TELP = $no;
                $data->save();

            return redirect('datawarga')->with('addpeng','.');
            }else{

            return redirect()->back()->with('error','.');
            }


    }

    // public function edpeng($id)
    // {
        
    //     $data = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
    //     $war = DB::SELECT("select*from warga where PENG_ID = '$id'");
    //     $dsn = DB::SELECT("select*from dusun group by NAMA_DSN");
    //     $rw = DB::SELECT("select*from rukun_warga");
    //     return view('/staf/edit_pengguna',['data'=>$data,'dsn'=>$dsn,'rw'=>$rw,'war'=>$war]);

    //     return redirect('datapengguna')->with('delpeng','.');

    // }

    public function updpeng(Request $request,$id)
    {
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;
        $fo = $request->foto;

        $ds = $request->dusun;
        $rw = $request->rw;
        $rt = $request->rt;

        $ni = $request->idnik;
        $ge = $request->gender;
        $al = $request->alamat;
        $ag = $request->agama;
        $no = $request->no;


        if($request->file('foto')==null){

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le]);

            if($le == 'Staf IT'){

                return redirect('datastaf')->with('updpeng','.');

            }else if($le == 'Kepala Desa'){

                $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>$ds,'RW_ID'=>null,'RT_ID'=>null]);

                return redirect('datakades')->with('updpeng','.');

            }else if($le == 'Ketua RW'){

                $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>$ds,'RW_ID'=>$rw,'RT_ID'=>null]);

                return redirect('dataketrw')->with('updpeng','.');

            }else if($le == 'Ketua RT'){

                $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>$ds,'RW_ID'=>$rw,'RT_ID'=>$rt]);

                return redirect('dataketrt')->with('updpeng','.');

            }else if($le == 'Warga'){

                $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>$ds,'RW_ID'=>$rw,'RT_ID'=>$rt]);
                $data = DB::table('warga')->where('PENG_ID',$id)->update(['NAMA_WG'=>ucfirst($na),'GENDER'=>$ge,'ALAMAT'=>$al,'AGAMA'=>$ag,'NO_TELP'=>$no]);

                return redirect('datawarga')->with('updpeng','.');
            }else{

                return redirect()->back()->with('error','.');

            }

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

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'FOTO'=>"$m_path"]);

                if($le == 'Staf IT'){

                    return redirect('datastaf')->with('updpeng','.');

                }else if($le == 'Kepala Desa'){

                    $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>null,'RW_ID'=>null,'RT_ID'=>null]);

                    return redirect('datakades')->with('updpeng','.');

                }else if($le == 'Ketua RW'){

                    $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>$ds,'RW_ID'=>$rw,'RT_ID'=>null]);

                    return redirect('dataketrw')->with('updpeng','.');

                }else if($le == 'Ketua RT'){

                    $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>$ds,'RW_ID'=>$rw,'RT_ID'=>$rt]);

                    return redirect('dataketrt')->with('updpeng','.');

                }else if($le == 'Warga'){
                    
                    $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['DUSUN_ID'=>$ds,'RW_ID'=>$rw,'RT_ID'=>$rt]);
                    $data = DB::table('warga')->where('PENG_ID',$id)->update(['GENDER'=>$ge,'ALAMAT'=>$al,'AGAMA'=>$ag,'NO_TELP'=>$no]);

                    return redirect('datawarga')->with('updpeng','.');
                }else{

                    return redirect()->back()->with('error','.');

                }
        }

    }

    public function delpeng($id)
    {
        $gam = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
            foreach ($gam as $key) {
                $lev = $key->LEVEL;
                if($key->FOTO == 'defaultprofile.png'){

                }else{
                    $image_path = "assets/foto/$key->FOTO";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }

        if($lev == 'Staf IT'){

            // DB::table('pengguna')->where('PENG_ID',$id)->delete();
            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['HAPUS'=>'1']);

            return redirect('datastaf')->with('delpeng','.');

        }else if($lev == 'Kepala Desa'){

            // DB::table('pengguna')->where('PENG_ID',$id)->delete();
            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['HAPUS'=>'1']);

            return redirect('datakades')->with('delpeng','.');

        }else if($lev == 'Ketua RW'){

            // DB::table('pengguna')->where('PENG_ID',$id)->delete();
            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['HAPUS'=>'1']);

            return redirect('dataketrw')->with('delpeng','.');
        }else if($lev == 'Ketua RT'){

            // DB::table('pengguna')->where('PENG_ID',$id)->delete();
            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['HAPUS'=>'1']);

            return redirect('dataketrt')->with('delpeng','.');

        }else if($lev == 'Warga'){

            DB::table('warga')->where('PENG_ID',$id)->delete();
            // DB::table('pengguna')->where('PENG_ID',$id)->delete();
            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['HAPUS'=>'1']);

            return redirect('datawarga')->with('delpeng','.');

        }


    }

    public function dtakat()
    {   
        $idk = kategori::getId();
        $data = DB::SELECT("select*from kategori where HAPUS = 0");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        return view('/staf/dt_katber',['data'=>$data,'idk'=>$idk,'katb'=>$katb]);
    }

    public function dtaber()
    {   
        $berita = DB::SELECT("select*from berita a, pengguna b, kategori c where a.PENG_ID = b.PENG_ID and a.KAT_ID = c.KAT_ID");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");
        return view('/staf/dt_berita',['data'=>$berita,'katb'=>$katb]);
    }

    public function addkat(Request $request)
    {
        $id = $request->idk;
        $ka = $request->kat;
        
        $data = new kategori();
            if($id == null){
                $data->KAT_ID = 1;
            }else{
                $data->KAT_ID = $id;
            }

            $data->JENIS_KAT = ucfirst($ka);
            $data->save();


        return redirect('datakatberita')->with('addpeng','.');
    }

    public function updkat(Request $request,$id)
    {
        $kat = $request->kat;

        $data = DB::table('kategori')->where('KAT_ID',$id)->update(['JENIS_KAT'=>$kat]);
        
        return redirect('datakatberita')->with('addpeng','.');
    }

    public function delkat($id)
    {
        // DB::table('kategori')->where('KAT_ID',$id)->delete();
        $data = DB::table('kategori')->where('KAT_ID',$id)->update(['HAPUS'=>'1']);

        return redirect('datakatberita')->with('delpeng','.');

    }

    public function berita($id)
    {
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");

        $data = DB::SELECT("select*, LEFT(a.ISI,100) isi, a.FOTO as foto from berita a, kategori b, pengguna c where a.KAT_ID = b.KAT_ID and a.PENG_ID = c.PENG_ID and b.JENIS_KAT = '$id' order by a.BERITA_ID DESC");
            
        return view('/staf/berita',['data'=>$data,'katb'=>$katb]);
    }

    public function diskusi($id)
    {
        $data = DB::SELECT("select*from berita where BERITA_ID = '$id'");
        $katb = DB::SELECT("select*from berita a, kategori b where a.KAT_ID = b.KAT_ID group by a.KAT_ID");
        $chat = DB::SELECT("select*from komen a, pengguna c where a.PENG_ID = c.PENG_ID and a.BERITA_ID = '$id' order by a.TGL ASC");            
        return view('/staf/diskusi',['data'=>$data,'katb'=>$katb,'chat'=>$chat]);
    }
}