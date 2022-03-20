<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\Resep;
use App\Models\User;
use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Komunitas $komunitas)
    {
        //
        $user = request()->user();
        $myKomunitas = $komunitas->where('user_id', '=', $user['id'])->get();
        if (count($myKomunitas) == 0) {
            return view('komunitas', ['user' => $user]);
        } else {
            return view('myKomunitas', ['user' => $user, 'komunitas' => $myKomunitas[0]]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('c_kom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rule = [
            'nama' => 'required',
        ];
        $request->validate($rule);
        $peserta = $request->peserta;
        $peserta = json_encode(array_merge([request()->user()->nama],array_map('ltrim', explode(',', $peserta))));
        $color = array_rand(['primary', 'secondary', 'info', 'danger', 'warning', 'dark']);
        $validated = [
            'user_id' => $request->user()->id,
            'nama_komunitas' => $request->nama,
            'peserta' => $peserta?:"Pembuat belum mengisi",
            'alamat' => $request->alamat?:"Pembuat belum mengisi",
            'bio' => $request->informasi?:"Pembuat belum mengisi",
            'logo' => $color,
        ];
        Komunitas::create($validated);
        return redirect('komunitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Komunitas $komunitas)
    {
        //
        $myKomunitas = $komunitas->where('id', '=', $id)->get();
        if (count($myKomunitas) == 0) {
            return redirect('/');
        } else {
            $resep = new Resep();
            $side = $resep->where('body', '!=', null)->orderBy('updated_at', 'desc')->limit(4)->get();
            
            return view('otherKomunitas', ['sides' => $side, 'komunitas' => $myKomunitas->first()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //
        $data = [
            'alamat'=>$request->alamat,
            'bio'=>$request->bio,
        ];
        Komunitas::where('id', $request->id_komunitas)->update($data);
        return redirect('komunitas'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
