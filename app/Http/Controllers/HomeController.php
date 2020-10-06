<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Jadwal;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function sisa()
    {
        $sisakuota = DB::table('jadwal_ibadah')->where('id', '=', 1)->get();
        $sisa = $sisakuota;

        $sisakuota2 = DB::table('jadwal_ibadah')->where('id', '=', 2)->get();
        $sisa2 = $sisakuota2;

        return view('home', ['sisa' => $sisa, 'sisa2' => $sisa2]);
    }

    /*protected function validator($data)
    {
        return Validator::make($data, [
            'id' => 'required', 'string', 'max:10',
            'jadwal' => 'required', 'string', 'max:255',
            'mulai' => 'required', 'string', 'max:255',
            'selesai' => 'required', 'string', 'max:255',
            'kuota' => 'required', 'string', 'max:11', 
        ]);
    }



   /* public function register(Request $request)
    {
        DB::insert('insert into jadwal_ibadah ( id, jadwal, mulai, selesai, kuota) values ( ?, jadwal, mulai, selesai, kuota)', [

            $request->input('id'),
            $request->input('jadwal'),
            $request->input('mulai'),
            $request->input('selesai'),
            $request->input('kuota')
        ]);

    } */

    function pagi(Request $request){

        $id = $request->id_user;
        $jadwal_ibadah = Jadwal::where('id', '=', 1)->get();
        //session_start();
        //$_SESSION['id_user_pagi']=$id;

        $count_user = '';


        foreach ($jadwal_ibadah as $key ) {
            $count_user = $key->id;
            $kuota = $key->kuota;
        }
        $cek = DB::table('ibadah')->where('id_user', $id)->first();
        if ($cek) {
            return redirect('/home')->with([
                'warning' => 'Maaf Anda Sudah Terdaftar'
            ]);
        }
        $cekkuota = DB::table('ibadah')->count();
        if ($cekkuota <= $kuota) {
            $data = DB::table('ibadah')->insert(['id_user' => $id, 'id_jadwal' => $count_user]);
            if ($data) {
                    $update = DB::table('jadwal_ibadah')->where('id', '=', 1)->update(['kuota' => $key->kuota-1]);
                    /*return redirect('/qrcode/')->with([
                        'success' => 'Data berhasil di simpan'
                    ]);*/
                    return redirect('/home')->with([
                        'success' => 'Data berhasil di simpan']);
                }   
            } else {
            return redirect('/home')->with([
                        'warning' => 'Kuota sudah penuh !'
                    ]);
        }

        // $users = $query->addSelect('kuota1')->first();

            //return redirect()->action('HomeController@daftar');
        }     

    function malam(Request $request){

        $id2 = $request->id_user;
        $jadwal_ibadah2 = Jadwal::where('id', '=', 2)->get();
        //$_SESSION['id_user_malam']=$id2;
        $count_user2 = '';


        foreach ($jadwal_ibadah2 as $key2 ) {
            $count_user2 = $key2->id;
            $kuota2 = $key2->kuota;
        }
        $cek2 = DB::table('ibadah')->where('id_user', $id2)->first();
        if ($cek2) {
            return redirect('/home')->with([
                'warning' => 'Maaf Anda Sudah Terdaftar'
            ]);
        }
        $cekkuota2 = DB::table('ibadah')->count();
        if ($cekkuota2 <= $kuota2) {
            $data2 = DB::table('ibadah')->insert(['id_user' => $id2, 'id_jadwal' => $count_user2]);
            if ($data2) {
                    $update2 = DB::table('jadwal_ibadah')->where('id', '=', 2)->update(['kuota' => $key2->kuota-1]);
                    return redirect('/home')->with([
                        'success' => 'Data berhasil di simpan']);
                }   
            } else {
            return redirect('/home')->with([
                        'warning' => 'Kuota sudah penuh !'
                    ]);
        }

        // $users = $query->addSelect('kuota1')->first();

            //return redirect()->action('HomeController@daftar');
        }   


   /* public function jadwal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = new strftime("%a %d %b %Y", strtotime(date('l, d F Y')));
        return view ($date->format('l, d F Y'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->nama;

        return view('home', compact('user'));
    }
    public function daftar()
    {
        return view('qrcode');
    }
}
