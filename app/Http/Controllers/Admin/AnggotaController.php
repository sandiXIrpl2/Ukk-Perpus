<?php

namespace App\Http\Controllers\Admin;

use App\Models\Anggota;
use App\Models\JenisAnggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    // Menampilkan semua anggota
    public function index()
    {
        $anggotas = Anggota::all();
        return view('admin.anggota.index', compact('anggotas'))->with('header', 'Manajemen Anggota');
    }

    // Menampilkan form untuk membuat anggota baru
    public function create()
    {
        $jenisAnggotas = JenisAnggota::all();
        return view('admin.anggota.create', compact('jenisAnggotas'));
    }

    // Menyimpan anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_anggota' => 'required|unique:tbl_anggota|max:20',
            'nama_anggota' => 'required|max:100|unique:tbl_anggota',
            'tempat' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|max:45',
            'foto' => 'required|image|max:2048',
            'username' => 'required|unique:tbl_anggota|max:50',
            'password' => 'required|min:8|confirmed',
        ]);

        $foto = $request->file('foto')->store('public/foto_anggota');

        Anggota::create([
            'id_jenis_anggota' => $request->id_jenis_anggota,
            'kode_anggota' => $request->kode_anggota,
            'nama_anggota' => $request->nama_anggota,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'tgl_daftar' => $request->tgl_daftar,
            'masa_aktif' => $request->masa_aktif,
            'fa' => $request->fa,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit anggota
    public function edit($id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);
        $jenisAnggotas = JenisAnggota::all();
        return view('admin.anggota.edit', compact('anggota', 'jenisAnggotas'));
    }

    // Menyimpan perubahan anggota
    public function update(Request $request, $id_anggota)
    {
        $request->validate([
            'kode_anggota' => 'required|max:20',
            'nama_anggota' => 'required|max:100',
            'tempat' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|max:45',
            'foto' => 'nullable|image|max:2048',
            'username' => 'required|max:50',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $anggota = Anggota::findOrFail($id_anggota);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('public/foto_anggota');
        } else {
            $foto = $anggota->foto;
        }

        $anggota->update([
            'id_jenis_anggota' => $request->id_jenis_anggota,
            'kode_anggota' => $request->kode_anggota,
            'nama_anggota' => $request->nama_anggota,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'tgl_daftar' => $request->tgl_daftar,
            'masa_aktif' => $request->masa_aktif,
            'fa' => $request->fa,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $anggota->password,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function show($id_anggota)
    {
        $anggota = Anggota::with('jenisAnggota')->findOrFail($id_anggota);
        return view('admin.anggota.show', compact('anggota'));
    }

    // Menghapus anggota
    public function destroy($id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
