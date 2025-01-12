<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    // Menampilkan daftar rak
    public function index()
    {
        $raks = TblRak::all();
        return view('admin.rak.index', compact('raks'));
    }

    // Menampilkan form untuk menambah rak baru
    public function create()
    {
        return view('admin.rak.create');
    }

    // Menyimpan rak baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_rak' => 'required|unique:tbl_rak,kode_rak|max:10',
            'rak' => 'required|unique:tbl_rak,rak|max:25',
            'keterangan' => 'required|max:50',
        ]);

        TblRak::create([
            'kode_rak' => $request->kode_rak,
            'rak' => $request->rak,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.rak.index')->with('success', 'Rak berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit rak
    public function edit($id)
    {
        $rak = TblRak::findOrFail($id);
        return view('admin.rak.edit', compact('rak'));
    }

    // Mengupdate rak
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_rak' => 'required|max:10|unique:tbl_rak,kode_rak,' . $id,
            'rak' => 'required|max:25|unique:tbl_rak,rak,' . $id,
            'keterangan' => 'required|max:50',
        ]);

        $rak = TblRak::findOrFail($id);
        $rak->update([
            'kode_rak' => $request->kode_rak,
            'rak' => $request->rak,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.rak.index')->with('success', 'Rak berhasil diperbarui.');
    }

    // Menghapus rak
    public function destroy($id)
    {
        $rak = TblRak::findOrFail($id);
        $rak->delete();

        return redirect()->route('admin.rak.index')->with('success', 'Rak berhasil dihapus.');
    }
}
