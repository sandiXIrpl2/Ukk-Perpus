<?php

namespace App\Http\Controllers\Admin;

use App\Models\Format;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormatController extends Controller
{
    // Menampilkan semua format
    public function index()
    {
        $formats = Format::all();
        return view('admin.format.index', compact('formats'), ['header' => 'Manajemen Format']);
    }

    // Menampilkan form untuk membuat format baru
    public function create()
    {
        return view('admin.format.create');
    }

    // Menyimpan format baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_format' => 'required|unique:tbl_format|max:10',
            'format' => 'required|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        Format::create($request->all());

        return redirect()->route('format.index')->with('success', 'Format berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit format
    public function edit($id_format)
    {
        $format = Format::findOrFail($id_format);
        return view('admin.format.edit', compact('format'));
    }

    // Menyimpan perubahan format
    public function update(Request $request, $id_format)
    {
        $request->validate([
            'kode_format' => 'required|max:10',
            'format' => 'required|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        $format = Format::findOrFail($id_format);
        $format->update($request->all());

        return redirect()->route('format.index')->with('success', 'Format berhasil diperbarui.');
    }

    // Menghapus format
    public function destroy($id_format)
    {
        $format = Format::findOrFail($id_format);
        $format->delete();

        return redirect()->route('format.index')->with('success', 'Format berhasil dihapus.');
    }
}
