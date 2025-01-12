<?php

namespace App\Http\Controllers\Admin;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenerbitController extends Controller
{
    // Menampilkan semua penerbit
    public function index()
    {
        $penerbits = Penerbit::all();
        return view('admin.penerbit.index', compact('penerbits'), ['header' => 'Manajemen Penerbit']);
    }

    // Menampilkan form untuk membuat penerbit baru
    public function create()
    {
        return view('admin.penerbit.create');
    }

    // Menyimpan penerbit baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_penerbit' => 'required|unique:tbl_penerbit|max:10',
            'nama_penerbit' => 'required|unique:tbl_penerbit|max:50',
            'alamat_penerbit' => 'required|max:150',
            'no_telp' => 'required|max:15',
            'email' => 'required|max:30',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|max:50',
            'kontak' => 'nullable|max:50',
        ]);

        Penerbit::create($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit penerbit
    public function edit($id_penerbit)
    {
        $penerbit = Penerbit::findOrFail($id_penerbit);
        return view('admin.penerbit.edit', compact('penerbit'));
    }

    // Menyimpan perubahan penerbit
    public function update(Request $request, $id_penerbit)
    {
        $request->validate([
            'kode_penerbit' => 'required|max:10',
            'nama_penerbit' => 'required|max:50',
            'alamat_penerbit' => 'required|max:150',
            'no_telp' => 'required|max:15',
            'email' => 'required|max:30',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|max:50',
            'kontak' => 'nullable|max:50',
        ]);

        $penerbit = Penerbit::findOrFail($id_penerbit);
        $penerbit->update($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui.');
    }

    // Menghapus penerbit
    public function destroy($id_penerbit)
    {
        $penerbit = Penerbit::findOrFail($id_penerbit);
        $penerbit->delete();

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus.');
    }
}
