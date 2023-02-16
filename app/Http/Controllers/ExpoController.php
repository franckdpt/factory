<?php

namespace App\Http\Controllers;

use App\Models\Expo;

class ExpoController extends Controller
{
    public function index(Expo $expo)
    {
        return view('expo', [
            'expo' => $expo
        ]);
    }
}
