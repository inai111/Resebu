<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\Komunitas;
use App\Models\Resep;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Resep $resep,Komunitas $komunitas)
    {
        $myKomunitas = $komunitas->where('user_id', '=', $request->user()->id)->get();
        if ($request->user()->level == 1) {
            $reseps = $resep->get();
            return view('user.resep', [
                'reseps' => $reseps->all(),
                'komunitas'=>$myKomunitas->first()
            ]);
        } else {
            $reseps = $resep->where('id_user', $request->user()->id)->get();
            return view('user.resep', [
                'reseps' => $reseps->all(),
                'komunitas'=>$myKomunitas->first()
            ]);
        };
        // return $user->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Komunitas $komunitas, Request $request)
    {
        //
        $myKomunitas = $komunitas->where('user_id', '=', $request->user()->id)->get();
        return view('user.addResep', [
            'kategoris' => KategoriModel::get(),
            'komunitas'=>$myKomunitas->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $komunitas = new Komunitas();
        $myKomunitas = $komunitas->where('user_id', '=', $request->user()->id)->get();
        $rule = [
            'nama' => 'required',
            'kategori' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg|mimetypes:image/jpg,image/png,image/jpeg',
            'video' => 'file|max:40000|mimes:mp4|mimetypes:video/mpeg,video/avi,video/mp4',
            'body' => 'required'
        ];
        $request->validate($rule);
        if ($request->gambar->store('public/images')) {
            $validated = [
                'id_user' => $request->user()->id,
                'id_kategori' => $request->kategori,
                'nama' => $request->nama,
                'body' => $request->body,
                'gambar' => $request->file('gambar')->hashName(),
            ];
            if ($request->hasFile('video')) {
                $request->video->store('public/videos');
                $validated['video'] = $request->file('video')->hashName();
            };
            Resep::create($validated);
            return redirect()->route('resep.index')->with('flash', 'Data telah berhasil di Tambahkan');
        };
        return redirect()->route('resep.index')->with('errorForm', 'Data telah gagal di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResepModel  $resepModel
     * @return \Illuminate\Http\Response
     */
    public function show(Resep $resep)
    {
        // return $resep;
        $komunitas = new Komunitas();
        $myKomunitas = $komunitas->where('user_id', '=', $resep->user->id)->get();
        return view('user.showResep', [
            'resep' => $resep,
            'komunitas'=>$myKomunitas->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResepModel  $resepModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        $komunitas = new Komunitas();
        $myKomunitas = $komunitas->where('user_id', '=', $resep->user->id)->get();
        // return $resep->id_kategori;
        $kategoris = new KategoriModel;
        return view('user.editResep', [
            'resep' => $resep,
            'komunitas'=>$myKomunitas->first(),
            'kategoris' => $kategoris->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResepModel  $resepModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        $rule = [
            'nama' => 'required',
            'kategori' => 'required',
            'body' => 'required',
            'video' => 'file|max:4000|mimes:mp4|mimetypes:video/mpeg,video/avi,video/mp4',
            'gambar' => 'mimes:jpg,png,jpeg|mimetypes:image/jpg,image/png,image/jpeg',
        ];
        if ($request->validate($rule)) {
            $validated = [
                'nama' => $request->nama,
                'id_kategori' => $request->kategori,
                'body' => $request->body,
            ];
            if ($request->hasFile('video')) {
                $request->video->store('public/videos');
                if ($resep->video != 'default.mp4')
                    Storage::disk('public')->delete('videos/' . $resep->video);
                $validated['video'] = $request->file('video')->hashName();
            };
            if ($request->hasFile('gambar')) {
                $request->gambar->store('public/images');
                if ($resep->gambar != 'default.png')
                    Storage::disk('public')->delete('images/' . $resep->gambar);
                $validated['gambar'] = $request->file('gambar')->hashName();
            };
            Resep::where('id', $resep->id)->update($validated);
        }
        return redirect()->route('resep.index')->with('flash', 'Data telah berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResepModel  $resepModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resep $resep)
    {
        //
        if ($resep->video != 'default.mp4')
            Storage::disk('public')->delete('videos/' . $resep->video);
        if ($resep->gambar != 'default.png')
            Storage::disk('public')->delete('images/' . $resep->gambar);
        $resep->delete();
        return back()->with('flash', 'Data telah berhasil di Hapus!');
    }
}
