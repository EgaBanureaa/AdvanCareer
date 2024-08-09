<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $lokers = Loker::all();

        return view('landing', compact('lokers'));
    }
}
