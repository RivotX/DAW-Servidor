<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalesController extends Controller
{

    public function getAnimales()
    {

        $animales = ["cebra", "leon", "puma", "antoñito"];

        return response()-> json(['mensaje'=>'estos son los animales ', 'datos' => $animales]);
    }
}
