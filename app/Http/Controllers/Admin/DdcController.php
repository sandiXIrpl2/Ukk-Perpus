<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ddc;
use App\Models\Rak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DdcController extends Controller
{
    // Menampilkan semua DDC
    public function index()
    {
        $ddcs = Ddc::all();
        return view('admin.ddc.index', compact('ddcs'), ['header' => 'Manajemen DDC']);
    }

    // Menampilkan form untuk membuat DDC baru
    public function create()
    {
        $raks = Rak::all(); // Ambil semua rak
        return view('admin.ddc.create', compact('raks'));
    }

    // Menyimpan DDC baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_ddc' => 'required|unique:tbl_ddc|max:10',
            'ddc' => 'required|max:100',
            'keterangan' => 'nullable|max:100',
            'id_rak' => 'required|exists:tbl_rak,id_rak', // Validasi id_rak yang terhubung
        ]);

        Ddc::create($request->all());

        return redirect()->route('ddc.index')->with('success', 'DDC berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit DDC
    public function edit($id_ddc)
    {
        $ddc = Ddc::findOrFail($id_ddc);
        $raks = Rak::all(); // Ambil semua rak
        return view('admin.ddc.edit', compact('ddc', 'raks'));
    }

    // Menyimpan perubahan DDC
    public function update(Request $request, $id_ddc)
    {
        $request->validate([
            'kode_ddc' => 'required|max:10|unique:tbl_ddc,kode_ddc,' . $id_ddc . ',id_ddc',
            'ddc' => 'required|max:100',
            'keterangan' => 'nullable|max:100',
            'id_rak' => 'required|exists:tbl_rak,id_rak', // Validasi id_rak yang terhubung
        ]);

        $ddc = Ddc::findOrFail($id_ddc);
        $ddc->update($request->all());

        return redirect()->route('ddc.index')->with('success', 'DDC berhasil diperbarui.');
    }

    // Menghapus DDC
    public function destroy($id_ddc)
    {
        $ddc = Ddc::findOrFail($id_ddc);
        $ddc->delete();

        return redirect()->route('ddc.index')->with('success', 'DDC berhasil dihapus.');
    }
}

