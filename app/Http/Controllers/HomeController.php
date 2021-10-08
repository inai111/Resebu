<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Resep $resep){
        $side = $resep->where('body','!=',null)->orderBy('updated_at','desc')->limit(4)->get();
        return view('home',[
            'sides'=> $side,
            'videos'=>$resep->where('video','!=','null')->orderBy('updated_at','desc')->limit(9)->get(),
        ]);
    }
    public function pencarian(Request $request, Resep $resep){
        $side = $resep->where('body','!=',null)->orderBy('updated_at','desc')->limit(4)->get();
        $reseps = $resep->where('nama','like','%'.$request->pencarian.'%')->orderBy('updated_at','desc')->get();
        // return $reseps;
        if(!empty($request->video)){
            $reseps = $resep->where('video','!=','null')->orderBy('updated_at','desc')->get();
        }
        return view('pencarian',[
            'reseps'=>$reseps,
            'sides' => $side,
            'cari'=>$request->pencarian,
            'video'=>$request->video,
        ]);
    }
    public function watch(Resep $resep, $id){
        $side = $resep->where('body','!=',null);
        $side = $side->where('id','!=',$id)->orderBy('updated_at','desc')->limit(4)->get();
        
        $video = $resep->where('video','!=',null);
        $video = $video->where('id','!=',$id)->orderBy('updated_at','desc')->limit(5)->get();
        
        $resep = $resep->all();
        
        return view('video',[
            'resep' => $resep->find($id),
            'sides' => $side,
            'videos' => $video
        ]);
    }
    public function read(Resep $resep, $id){
        $side = $resep->where('body','!=',null);
        $side = $side->where('id','!=',$id)->orderBy('updated_at','desc')->limit(4)->get();
        $resep = $resep->all();
        return view('resep',[
            'resep'=>$resep->find($id),
            'sides' => $side,
        ]);
    }
}
