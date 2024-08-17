<?php

namespace App\Http\Controllers;

use App\Utilidad\BodyMuscles;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    ///
    public function index(){
        $bodymuscles=new BodyMuscles();
        $bodymuscles->hombros=false;
        $bodymuscles->espalda=true;
        $bodymuscles->triceps=false;
        $bodymuscles->espalda_baja=true;
        $bodymuscles->espalda_alta=true;
        $bodymuscles->piernas=false;
        $bodymuscles->gluteos=false;


        $svg=$bodymuscles->fullBody();
        return view('/test',compact('svg')) ;
    }
}
