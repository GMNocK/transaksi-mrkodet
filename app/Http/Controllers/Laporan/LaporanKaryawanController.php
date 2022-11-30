<?php

namespace App\Http\Controllers\Laporan;

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
        return view('myDashboard.pages.Admin.laporanKaryawan',[
            'laporankaryawans' => laporanKaryawan::paginate(12)
        ]);
    }

    
    public function create()
    { 
        $ls =  Karyawan::where('user_id', auth()->user()->id)->get();
        
        foreach ($ls as $l) {
            $idK = $l->id;
        }

        return view('dashboard.karyawan.laporankaryawan.create', [
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

        $validateData['excerpt'] = Str::limit($validateData['body'], 50, '...');

        $validateData['send_at'] = date('Y-m-d H-i-s');

        laporanKaryawan::create($validateData);

        return redirect(route('laporankaryawans.index'));
    }

    
    public function show(laporanKaryawan $laporankaryawan)
    {
        // return $laporankaryawan;
        return view('dashboard.karyawan.laporankaryawan.show', [
            'laporankaryawans' => $laporankaryawan,
        ]);
    }

    
    public function edit(laporanKaryawan $laporankaryawan)
    {
        return view('dashboard.karyawan.laporankaryawan.edit', [
            'laporankaryawan' => $laporankaryawan,
        ]);
    }

    
    public function update(Request $request, laporanKaryawan $laporankaryawan)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);
        $validateData['excerpt'] = Str::limit($validateData['body'], 50, '...');

        $laporankaryawan->update($validateData);

        return redirect(route('laporankaryawans.index'));
    }

    
    public function destroy(laporanKaryawan $laporankaryawan)
    {
        laporanKaryawan::destroy($laporankaryawan->id);

        return redirect('/laporankaryawans');
    }
}
