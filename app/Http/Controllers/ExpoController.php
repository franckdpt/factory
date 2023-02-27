<?php

namespace App\Http\Controllers;

use App\Models\Expo;

class ExpoController extends Controller
{
    public function index(Expo $expo)
    {
        setlocale(LC_TIME, "fr_FR");
        
        return view('expo', [
            'expo' => $expo
        ]);
    }
}
