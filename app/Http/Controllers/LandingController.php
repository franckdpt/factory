<?php

namespace App\Http\Controllers;

use App\Models\SmartContract;

class LandingController extends Controller
{
    public function index()
    {
        $smart_contracts = SmartContract::whereDeployed(true)->get();
        
        return view('landing', [
            'smart_contracts' => $smart_contracts
        ]);
    }
}
