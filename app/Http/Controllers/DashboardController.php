<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(User $user, Request $request, Komunitas $komunitas){
        $user = collect($user->get());
        $user = $user->where('username','!=',$request->user()->username);
        $user = $user->where('username','!=','admin');
        if(request()->user()->level==1){
            $myKomunitas = $komunitas->where('user_id', '=', request()->user()->id)->get();
            return view('user.dashboard',['users'=>$user->all(), 'komunitas' => $myKomunitas->first()]);
        }
        return redirect()->route('resep.index');
    }
    public function dataResep(Komunitas $komunitas){
        $myKomunitas = $komunitas->where('user_id', '=', request()->user()->id)->get();
        return view('admin/resep',['komunitas' => $myKomunitas->first()]);
    }
    public function profil(Komunitas $komunitas){
        $user = request()->user();
        $myKomunitas = $komunitas->where('user_id', '=', request()->user()->id)->get();
            return view('user/profil',[
                'user'=>$user, 
                'komunitas' => $myKomunitas->first()
            ]);
    }
    public function lihatProfil(User $user,$id){
        $user = $user->all();
        return view('admin.profil',[
            'user'=>$user->find($id)
        ]);
    }
    public function updateProfil(Request $request){
        $request->validate([
            'nama'=> 'required|min:3',
            'password1'=> 'min:8|nullable',
            'tempat'=> 'required',
            'tanggal'=> 'required',
            'alamat'=> 'required',
            'password2'=> 'required'
        ]);
        $pass = $request->user()->password;
        if(Hash::check($request->password2, $pass)){
            $user = new User();
            if(!empty($request->password1)){
                if(Hash::check($request->password1, $pass)){
                    return back()->withErrors(['password1'=>'Password can not be the same with pervious password']);
                }
                $user->where('username',$request->username)
                ->update([
                    'nama' => $request->nama,
                    'password' => Hash::make($request->password1),
                    't_lahir' => $request->tempat,
                    'tgl_lahir' => $request->tanggal,
                    'alamat' => $request->alamat,
                ]);
            }else{
                $user->where('username',$request->username)
                ->update([
                    'nama' => $request->nama,
                    't_lahir' => $request->tempat,
                    'tgl_lahir' => $request->tanggal,
                    'alamat' => $request->alamat,
                ]);
            }
            return redirect('/profil')->with('flash','Successfully to update!');
        }
        return back()->withErrors(['password2'=> 'Password incorect!']);
    }
    public function delete(User $user){
        $nama = $user->nama; 
        $user->delete();
        return back()->with('flash','Data milik '.$nama.' telah berhasil dihapus');
    }
}
