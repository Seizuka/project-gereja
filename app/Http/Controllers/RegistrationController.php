<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegistrationController extends Controller
{
	protected function validator($data)
    {
        return Validator::make($data, [
            'nik' => 'required', 'string', 'max:30',
            'nama' => 'required', 'string', 'max:255',
            'umur' => 'required', 'string', 'max:5',
            'gender' => 'required', 'string', 'max:20',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'barcode' => 'required', 'string', 'max:20',
        ]);
    }

    function store(Request $request)
    {
        $angka = range(0, 9);
        shuffle($angka);
        $ambilangka = array_rand($angka, 9);
        $angkastring = $ambilangka;                            

    	$validator = $this->validate($request, [
            'nik' => 'required', 'string', 'max:30',
            'nama' => 'required', 'string', 'max:255',
            'umur' => 'required', 'string', 'max:5',
            'gender' => 'required', 'string', 'max:20',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
    
        ]);


    	if($validator){
    		$count = User::count();
        	if($count <= 20){ 
            	$data = User::create([
                	'nik' => $request->nik,
                	'nama' => $request->nama,
                	'umur' => $request->umur,
                	'gender' => $request->gender,
                	'email' => $request->email,
                	'password' => Hash::make($request->password),
                	'barcode' => implode("", $angkastring)
            	]);

            if ($data) {
                return redirect('/')->with([
                    'success' => 'Data berhasil di simpan'
                ]);
            }else{
                return redirect('/')->with([
                    'warning' => 'Terjadi kesalahan'
                ]);
            }
            }else {
                return redirect('/')->with([
                    'warning' => 'Data sudah penuh !'
                ]);
            }
    	}
    }
}
