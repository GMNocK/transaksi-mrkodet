<?php

namespace App\Http\Controllers;

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
            'Fk' => 'required|min:10',
        ]);

        $kar = Karyawan::where('user_id', auth()->user()->id)->get();
        foreach ($kar as $i) {
            $idk = $i->id;
        }

        return 'kuliah';
        
        FeedbackKaryawan::create($validateData);
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
        //
    }
}
