<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Slide;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $lokers = Loker::where('status', true)->get();
        $slides = Slide::all();

        return view('landing', compact('lokers', 'slides'));
    }
}
