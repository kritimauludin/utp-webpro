<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //function for index
    public function index(){
        $allData = Umkm::all();
        return view('landing.v-landing', [
            'umkms' => $allData
        ]);
    }

}
