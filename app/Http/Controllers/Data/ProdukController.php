<?php

namespace App\Http\Controllers\Data;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    
    public function index()
    {
        return view('myDashboard.pages.karyawan.DataBarang.barang', [
            'barang' => Barang::all(),
        ]);
    }

    
    public function create()
    {
        return view('myDashboard.pages.karyawan.DataBarang.Bcreate');
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namBar' => 'required',
            'harBar' => 'required|min:4',
            'keterangan' => 'required',
            'foto' => 'required|min:4',
        ]);
        $barang = new Barang([
            'nama_barang' => $validateData['namBar'],
            'harga' => $validateData['harBar'],
            'keterangan' => $validateData['keterangan'],
            'foto' => $validateData['foto'],
        ]);

        $barang->save();

        return redirect('/produk')->with('added', 'Data Berhasil Di Tambahkan');
    }

    
    public function show(Barang $produk)
    {
        return view('myDashboard.pages.karyawan.DataBarang.Bar_detail', [
            'barang' => $produk,
        ]);
    }

    
    public function edit(Barang $produk)
    {
        return view('myDashboard.pages.karyawan.DataBarang.bar_edit', [
            'barang' => $produk,
        ]);
    }

    
    public function update(Request $request, Barang $produk)
    {
        $validateData = $request->validate([
            'namBar' => 'required',
            'harBar' => 'required|min:4',
            'keterangan' => 'required',
            'foto' => 'required|min:4',
        ]);

        $produk->update($validateData);

        return redirect('/produk')->with('edited', 'Data Berhasil Di edit');
    }

    
    public function destroy(Barang $produk)
    {
        $produk->destroy($produk->id);

        return redirect('/produk')->with('Deleted', 'Data Berhasil dihapus');
    }
}
