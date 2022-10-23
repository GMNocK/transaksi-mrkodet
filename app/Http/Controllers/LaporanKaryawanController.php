<?php

namespace App\Http\Controllers;

use App\Models\laporanKaryawan;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class LaporanKaryawanController extends Controller
{
    
    public function index()
    {
        // $today = date('Y-m-d'); 
        // $Day = Str::afterLast($today, '-');
        // $tomorrow = $Day + 1;
        // $Bday = Str::beforeLast($today, '-');

        // $date = "$Bday-$tomorrow";

        // $ini = now()->toArray();

        // return $date;   
        // $itu = "$date 00-00-00";       

        // return $ini->where('send_at', '<', $tomorrow)->get();

        // return laporanKaryawan::orderBy('send_at')->whereYear('send_at', '2022')->get();

        return view('dashboard.laporankaryawan.index',[            
            // 'laporankaryawans' => laporanKaryawan::orderBy('send_at', 'desc')->whereDate('send_at', Date('Y-m-d'))->get(), 
            'laporankaryawans' => laporanKaryawan::all()
        ]);
    }

    
    public function create()
    { 
        $ls =  Karyawan::where('user_id', auth()->user()->id)->get();
        
        foreach ($ls as $l) {
            $idK = $l->id;
        }

        return view('dashboard.laporankaryawan.create', [
            'ik' => $idK,
        ]);
    }

    
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required|min:1',
            'body' => 'required|min:10',
            'karyawan_id' => 'required'
        ]);

        $validateData['excerpt'] = Str::limit($validateData['body'], 30, '...');

        $validateData['send_at'] = date('Y-m-d H-i-s');

        // laporanKaryawan::create($validateData);

        return redirect(route('/laporankaryawans'));
    }

    
    public function show(laporanKaryawan $laporankaryawan)
    {
        //
    }

    
    public function edit(laporanKaryawan $laporankaryawan)
    {
        //
    }

    
    public function update(Request $request, laporanKaryawan $laporankaryawan)
    {
        //
    }

    
    public function destroy(laporanKaryawan $laporankaryawan)
    {
        laporanKaryawan::destroy($laporankaryawan->id);

        return redirect('/laporankaryawans');
    }
}
