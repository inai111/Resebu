<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function register(){
        return view('regist');
    }
    public function store(Request $request){
        $request->validate([
            'nama'=> 'required|min:3',
            'username'=> 'required|unique:users,username|min:3|alpha_dash',
            'email'=> 'required|email|unique:users,email',
            'nomor'=> 'required|numeric',
            'password'=> 'required|min:8'
        ]);
        // dd($request->input());
        $query = new User();
        // dd($request['nama']);
        $query->nama = $request['nama'] ;
        $query->username = $request['username'] ;
        $query->email = $request['email'] ;
        $query->nomer = $request['nomor'] ;
        $query->password = Hash::make($request['password']) ;
        if($query->save()){
            return redirect('login')->with('flash','Username telah Berhasil di Daftarkan');
        };
    }
    public function checking(Request $request){
        $data = $request->validate([
            'username'=> 'required|alpha_dash',
            'password'=> 'required',
        ]);
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('loginError','Login failed!');
    }

    public function logout(){
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');

    }
}
