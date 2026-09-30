<?php

namespace App\Http\Controllers;

use App\Utilidad\BodyMuscles;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    ///
    public function index()
    {
        $body = new BodyMuscles(['Pecho', 'Espalda']);

        return view('test', [
            'front' => $body->front(),
            'back' => $body->back(),
        ]);
    }
}
