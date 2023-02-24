<?php

namespace App\Http\Controllers;

use App\Models\Expo;

class LandingController extends Controller
{
    public function index()
    {
        $expo = Expo::latest()->first();

        if ($expo) {
            return redirect()->route('expo', [
                'expo' => $expo
            ]);
        }
        
        return view('landing');
    }
}
