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
        $bodymuscles->espalda=false;
        $bodymuscles->triceps=true;
        $bodymuscles->espalda_baja=false;
        $bodymuscles->espalda_alta=true;
        $bodymuscles->piernas=true;
        $bodymuscles->gluteos=true;


        $svg=$bodymuscles->fullBody();
        return view('/test',compact('svg')) ;
    }
}
