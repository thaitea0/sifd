<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\pengguna;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login()
    {   
        $idp = pengguna::getId();
        $sql = DB::SELECT("select*from pengguna where LEVEL = 'Staf IT'");
        return view('/login',['idp'=>$idp,'sql'=>$sql]);
    }

    public function regis(Request $request)
    {
        $id = $request->idp;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;
        $fo = $request->foto;

        if($fo == null){
            $foto = 'defaultprofile.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/foto/", $foto);
        }

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
            $data->LEVEL = 'Staf IT';
            $data->FOTO = $foto;
            $data->save();

        return redirect()->back()->with('error','.');
    }

	public function actlog(Request $request){
        $username = $request->user;
        $password = $request->pass;
        
        Session::flush();
        $data = DB::table('pengguna')->where([['USERNAME',$username],['PASSWORD',$password]])->get();
        foreach ($data as $key) {
            $nama = $key->USERNAME;
            $level = $key->LEVEL;
        };

        if (count($data) == 0){
            return redirect('/')->with('gagal','.');
        }
        if($level == 'Staf IT') {
        	$na = DB::SELECT("SELECT a.PENG_ID,LEFT(a.NAMA,20) as nama,a.FOTO FROM pengguna a WHERE a.USERNAME like '$username'");
        	foreach ($na as $nam) {
        		Session::put('username',$username);
        		Session::put('nama',$nam->nama);
        		Session::put('fp',$nam->FOTO);
                Session::put('idp',$nam->PENG_ID);
        	}

            return redirect('/staf');
        }
        else if($level == 'Kepala Desa') {

            $na = DB::SELECT("SELECT a.PENG_ID,LEFT(a.NAMA,20) as nama,a.FOTO FROM pengguna a WHERE a.USERNAME like '$username'");
        	foreach ($na as $nam) {
        		Session::put('username',$username);
        		Session::put('nama',$nam->nama);
        		Session::put('fp',$nam->FOTO);
                Session::put('idp',$nam->PENG_ID);
        	}

            return redirect('/kades');
        }
        else if($level == 'Ketua RW') {

            $na = DB::SELECT("SELECT *, LEFT(a.NAMA,20) as nama FROM pengguna a, dusun b, rukun_warga c WHERE a.DUSUN_ID = b.DUSUN_ID and a.RW_ID  = c.RW_ID and a.USERNAME like '$username'");
        	foreach ($na as $nam) {
        		Session::put('username',$username);
        		Session::put('nama',$nam->nama);
        		Session::put('fp',$nam->FOTO);
                Session::put('idp',$nam->PENG_ID);
                Session::put('idd',$nam->DUSUN_ID);
                Session::put('dusun',$nam->NAMA_DSN);
                Session::put('rwid',$nam->RW_ID);
                Session::put('rw',$nam->RW);
        	}

            return redirect('/ketuarw');
        }
        else if($level == 'Ketua RT') {

            $na = DB::SELECT("SELECT *, LEFT(a.NAMA,20) as nama FROM pengguna a, dusun b, rukun_warga c, rukun_tetangga d WHERE a.DUSUN_ID = b.DUSUN_ID and a.RW_ID  = c.RW_ID and a.RT_ID = d.RT_ID and a.USERNAME like '$username'");
        	foreach ($na as $nam) {
        		Session::put('username',$username);
        		Session::put('nama',$nam->nama);
        		Session::put('fp',$nam->FOTO);
                Session::put('idp',$nam->PENG_ID);
                Session::put('idd',$nam->DUSUN_ID);
                Session::put('dusun',$nam->NAMA_DSN);
                Session::put('rwid',$nam->RW_ID);
                Session::put('rtid',$nam->RT_ID);
                Session::put('rw',$nam->RW);
                Session::put('rt',$nam->RT);
        	}

            return redirect('/ketuart');
        }
        else if($level == 'Warga') {

            $na = DB::SELECT("SELECT *, LEFT(a.NAMA,20) as nama FROM pengguna a, dusun b, rukun_warga c, warga d , rukun_tetangga e WHERE a.DUSUN_ID = b.DUSUN_ID and a.RW_ID  = c.RW_ID and a.PENG_ID = d.PENG_ID and a.RT_ID = e.RT_ID and c.RW_ID = e.RW_ID and  a.USERNAME like '$username'");
        	foreach ($na as $nam) {
        		Session::put('username',$username);
                Session::put('nama',$nam->nama);
                Session::put('idp',$nam->PENG_ID);
                Session::put('idd',$nam->DUSUN_ID);
                Session::put('dusun',$nam->NAMA_DSN);
                Session::put('rwid',$nam->RW_ID);
                Session::put('rtid',$nam->RT_ID);
                Session::put('rw',$nam->RW);
                Session::put('rt',$nam->RT);
                Session::put('nik',$nam->NIK);
        	}

            return redirect('/warga');
        }
        else if($level == 4) {

            return redirect('/')->with('error','.');
        }

    }

    public function logout(){

        Session::flush();
        return redirect('/');
    }    
}
