<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Jadwal;

class QrcodeController extends Controller
{
	//
    /*public function index()
    {
        return redirect()->route('qrcode');
    }*/

    protected function scan($id)
    {
    	$users = DB::table('users')->where('id', $id)->get();
        
        return view('qrcode', ['users' => $users]);

    }

    protected function cek(Request $request)
    {
        $id = $request->id_user;
        $data = DB::table('ibadah')->where('id_user', $id)->first();
        if ($data) {
            return redirect()->route('qrcode', [$id]); 
        }
        //$cek = DB::table('ibadah')->where('id_user', $id)->get();
        //if ($cek >= $data) {
        return redirect('/home')->with([
                    'warning' => 'Anda Belum Mendaftar !'
                ]);
    }
    /*function destroy($id)
    {
    	$id = $request->id_user;
        $jadwal_ibadah = Jadwal::where('id', '=', 1)->get();

        $count_user = '';


        foreach ($jadwal_ibadah as $key ) {
            $count_user = $key->id;
            $kuota = $key->kuota;
        } 
    	$cekkuota = DB::table('ibadah')->count();
        $data = DB::table('ibadah')->where('id_user',$id)->delete();
        $update = DB::table('jadwal_ibadah')->where('id', '=', 1)->update(['kuota' => $key->kuota+1]);
                return redirect('/qrcode')->with([
                        'success' => 'Data berhasil dihapus'
                ]);   
            
    }*/
}
