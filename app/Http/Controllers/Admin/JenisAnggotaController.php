<?php

namespace App\Http\Controllers\Admin;

use App\Models\JenisAnggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisAnggotaController extends Controller
{
    // Menampilkan semua jenis anggota
    public function index()
    {
        $jenisAnggotas = JenisAnggota::all();
        return view('admin.jenis_anggota.index', compact('jenisAnggotas'))->with('header', 'Manajemen Jenis Anggota');
    }

    // Menampilkan form untuk membuat jenis anggota baru
    public function create()
    {
        return view('admin.jenis_anggota.create');
    }

    // Menyimpan jenis anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_jenis_anggota' => 'required|unique:tbl_jenis_anggota|max:20',
            'jenis_anggota' => 'required|max:15',
            'max_pinjam' => 'required|max:5',
            'keterangan' => 'nullable|max:50',
        ]);

        JenisAnggota::create($request->all());

        return redirect()->route('jenis_anggota.index')->with('success', 'Jenis Anggota berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit jenis anggota
    public function edit($id_jenis_anggota)
    {
        $jenisAnggota = JenisAnggota::findOrFail($id_jenis_anggota);
        return view('admin.jenis_anggota.edit', compact('jenisAnggota'));
    }

    // Menyimpan perubahan jenis anggota
    public function update(Request $request, $id_jenis_anggota)
    {
        $request->validate([
            'kode_jenis_anggota' => 'required|max:20',
            'jenis_anggota' => 'required|max:15',
            'max_pinjam' => 'required|max:5',
            'keterangan' => 'nullable|max:50',
        ]);

        $jenisAnggota = JenisAnggota::findOrFail($id_jenis_anggota);
        $jenisAnggota->update($request->all());

        return redirect()->route('jenis_anggota.index')->with('success', 'Jenis Anggota berhasil diperbarui.');
    }

    // Menghapus jenis anggota
    public function destroy($id_jenis_anggota)
    {
        $jenisAnggota = JenisAnggota::findOrFail($id_jenis_anggota);
        $jenisAnggota->delete();

        return redirect()->route('jenis_anggota.index')->with('success', 'Jenis Anggota berhasil dihapus.');
    }
}

