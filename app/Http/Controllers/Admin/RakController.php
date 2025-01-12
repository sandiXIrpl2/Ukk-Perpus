<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RakController extends Controller
{
    // Menampilkan semua rak
    public function index()
    {
        $raks = Rak::all();
        return view('admin.rak.index', compact('raks'), ['header' => 'Managemen Rak']);
    }

    // Menampilkan form untuk membuat rak baru
    public function create()
    {
        return view('admin.rak.create');
    }

    // Menyimpan rak baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_rak' => 'required|unique:tbl_rak|max:10',
            'rak' => 'required|unique:tbl_rak|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        Rak::create($request->all());

        return redirect()->route('admin.rak.index')->with('success', 'Rak berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit rak
    public function edit($id_rak)
    {
        $rak = Rak::findOrFail($id_rak);
        return view('admin.rak.edit', compact('rak'));
    }

    public function update(Request $request, $id_rak)
    {
        $request->validate([
            'kode_rak' => 'required|max:10|unique:tbl_rak,kode_rak,' . $id_rak . ',id_rak',
            'rak' => 'required|max:25|unique:tbl_rak,rak,' . $id_rak . ',id_rak',
            'keterangan' => 'nullable|max:50',
        ]);
        $rak = Rak::findOrFail($id_rak);
        $rak->update($request->all());

        return redirect()->route('admin.rak.index')->with('success', 'Rak berhasil diperbarui.');
    }



    // Menghapus rak
    public function destroy($id_rak)
    {
        $rak = Rak::findOrFail($id_rak);
        $rak->delete();

        return redirect()->route('admin.rak.index')->with('success', 'Rak berhasil dihapus.');
    }
}
