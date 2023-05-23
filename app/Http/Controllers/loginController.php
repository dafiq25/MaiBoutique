<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            'email'=> 'required|email:dns',
            'password'=> 'required|min:5|max:20'
        ]);
        // dd('berhasil');

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            if(Auth::user()->role == 'member'){
                return redirect()->intended('/home');
            }else{
                return redirect()->intended('/home');
            }
        }
        
        return back()->with('loginError', 'Login gagal, silahkan masukkan email dan password dengan benar');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
