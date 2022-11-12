<?php

namespace App\Http\Controllers\Laporan;

use App\Models\FeedbackKaryawan;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class FeedbackKaryawanController extends Controller
{
     function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'body' => 'required|min:10',
        ]);
        $kar = Karyawan::where('user_id', auth()->user()->id)->get();
        foreach ($kar as $i) {
            $idk = $i->id;
        }
        $validateData['karyawan_id'] = $idk;
        $validateData['laporan_pelanggan_id'] = $request->hidden;

        FeedbackKaryawan::create($validateData);

        return redirect('/karyawan/laporanuser');
    }

    
    public function show(FeedbackKaryawan $feedbackKaryawan)
    {
        //
    }

    
    public function edit(FeedbackKaryawan $feedbackKaryawan)
    {
        //
    }

   
    public function update(Request $request, FeedbackKaryawan $feedbackKaryawan)
    {
        //
    }

    
    public function destroy(FeedbackKaryawan $feedbackKaryawan)
    {
        FeedbackKaryawan::destroy($feedbackKaryawan);

        return redirect('/dashboard');
    }
}
