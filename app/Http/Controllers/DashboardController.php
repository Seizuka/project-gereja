<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Kuota;
use App\Jadwal;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	return view('admin.dashboard');
    }

    public function jadwal()
    {
    	$jadwal_ibadah = Jadwal::where('id', '=', 1)->get();
    	$data = $jadwal_ibadah;

    	$jadwal_ibadah = Jadwal::where('id', '=', 2)->get();
    	$data2 = $jadwal_ibadah;

    	return view('admin.dashboard', ['data' => $data, 'data2' => $data2]);
    }
}
