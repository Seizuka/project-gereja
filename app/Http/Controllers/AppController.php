<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    //
    public function index(){
    	return view('admin.dashboard');
    }
}
