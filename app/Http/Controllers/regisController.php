<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class regisController extends Controller
{
    public function index(){
        return view('registrasi');
    }

    public function registered(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'username' => 'required|unique:users|min:5|max:20',
            'phone' => 'required|min:10|max:13',
            'address' => 'required|min:5'
        ]);

        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'member'
        ]);
        return redirect('/login');
    }
}
