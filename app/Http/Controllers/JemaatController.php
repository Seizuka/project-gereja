<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class JemaatController extends Controller
{
    public function index()
    {
    	return view('admin.jemaat');
    }

    public function jemaat(Request $request)
    {
    	if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.jemaat');
    }
}
