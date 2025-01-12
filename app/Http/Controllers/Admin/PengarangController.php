<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengarangController extends Controller
{
    // Menampilkan semua pengarang
    public function index()
    {
        $pengarangs = Pengarang::all();
        return view('admin.pengarang.index', compact('pengarangs'), ['header' => 'Manajemen Pengarang']);
    }

    // Menampilkan form untuk membuat pengarang baru
    public function create()
    {
        return view('admin.pengarang.create');
    }

    // Menyimpan pengarang baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_pengarang' => 'required|unique:tbl_pengarang|max:10',
            'nama_pengarang' => 'required|unique:tbl_pengarang|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'website' => 'nullable|max:50',
            'biografi' => 'nullable',
            'keterangan' => 'nullable|max:50',
        ]);

        Pengarang::create($request->all());

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pengarang
    public function edit($id_pengarang)
    {
        $pengarang = Pengarang::findOrFail($id_pengarang);
        return view('admin.pengarang.edit', compact('pengarang'));
    }

    // Menyimpan perubahan pengarang
    public function update(Request $request, $id_pengarang)
    {
        $request->validate([
            'kode_pengarang' => 'required|max:10',
            'nama_pengarang' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'website' => 'nullable|max:50',
            'biografi' => 'nullable',
            'keterangan' => 'nullable|max:50',
        ]);

        $pengarang = Pengarang::findOrFail($id_pengarang);
        $pengarang->update($request->all());

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil diperbarui.');
    }

    // Menghapus pengarang
    public function destroy($id_pengarang)
    {
        $pengarang = Pengarang::findOrFail($id_pengarang);
        $pengarang->delete();

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil dihapus.');
    }
}

