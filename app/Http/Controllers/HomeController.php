<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Resep $resep)
    {
        $search = request()->pencarian;
        $side = $resep->where('body', '!=', null)->orderBy('updated_at', 'desc')->limit(4)->get();
        $videos = $resep->where('video', '!=', 'null')->orderBy('updated_at', 'desc')->limit(9);
        if($search != ''){
            $videos = $resep->where('nama', 'like', "%$search%");
        }
        return view('home', [
            'sides' => $side,
            'videos' => $videos->get(),
        ]);
    }
    public function pencarian(Request $request, Resep $resep)
    {
        $side = $resep->where('body', '!=', null)->orderBy('updated_at', 'desc')->limit(4)->get();

        // return $reseps;
        if ($request->video==1) {
            $reseps = $resep->where('video', '!=', 'null')->orderBy('updated_at', 'desc')->paginate(9)->withQueryString();
        }else{
            $reseps = $resep->where('nama', 'like', '%' . $request->pencarian . '%')->orderBy('updated_at', 'desc')->paginate(9)->withQueryString();
        }
        return view('pencarian', [
            'reseps' => $reseps,
            'sides' => $side,
            'cari' => $request->pencarian,
            'video' => $request->video,
        ]);
    }
    public function pencarian2(Request $request, Resep $resep, User $user)
    {
        if ($request->pencarian == '' || $request->pencarian == null) {
            $datas = $resep->get();
        } else {
            $datas = $resep->where('nama', 'like', '%' . $request->pencarian . '%')->orderBy('updated_at', 'desc')->get();
        }
        $response = [
            'datas' => $datas,
            'user' => $user->get(),
        ];
        return response()->json($response);
    }
    public function watch(Resep $resep, $id)
    {
        $side = $resep->where('body', '!=', null);
        $side = $side->where('id', '!=', $id)->orderBy('updated_at', 'desc')->limit(4)->get();

        $video = $resep->where('video', '!=', null);
        $video = $video->where('id', '!=', $id)->orderBy('updated_at', 'desc')->limit(5)->get();

        $resep = $resep->all();
        return view('video', [
            'resep' => $resep->find($id),
            'sides' => $side,
            'videos' => $video
        ]);
    }
    public function read(Resep $resep, $id)
    {
        $side = $resep->where('body', '!=', null);
        $side = $side->where('id', '!=', $id)->orderBy('updated_at', 'desc')->limit(4)->get();
        $resep = $resep->all();
        return view('resep', [
            'resep' => $resep->find($id),
            'sides' => $side,
        ]);
    }
}
