<?php

namespace App\Http\Controllers;

use App\Models\FormPendaftaran;
use App\Models\Loker;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function index() {
        $lokers = Loker::where('status', true)->get();
        $slides = Slide::all();

        return view('landing', compact('lokers', 'slides'));
    }

    public function job_detail($id){
        $loker = Loker::find($id);
        return view('job_detail', compact('loker'));
    }

    public function submit_form($id, Request $request){

        $request->validate([
            // name
            'fullname' => 'required',
            'call' => 'required',
            'email' => 'required',
            'file' => 'required|mimes:pdf|max:5000',
        ]);

        $path = $request->file('file')->store('public/cv');

        $loker = Loker::find($id);

        FormPendaftaran::create([
            "nama" => $request->fullname,
            "email" => $request->call,
            'no_telp' => $request->email,
            'loker_id' => $id,
            'cv' => $path,
        ]);

        Session::flash('success', 'Terimakasih, Data Anda Sudah Masuk');
        return view('job_detail', compact('loker'));
    }
}
