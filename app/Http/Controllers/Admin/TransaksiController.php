<?php

namespace App\Http\Controllers\Admin;

use App\Models\Anggota;
use App\Models\Pustaka;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksis = Transaksi::with('pustaka', 'anggota')->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    // Menampilkan form untuk menambah transaksi baru
    public function create()
    {
        $pustakas = Pustaka::all();
        $anggotas = Anggota::all();
        return view('admin.transaksi.create', compact('pustakas', 'anggotas'));
    }

    // Menyimpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pustaka' => 'required|exists:tbl_pustaka,id_pustaka',
            'id_anggota' => 'required|exists:tbl_anggota,id_anggota',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'keterangan' => 'required|string|max:50',
        ]);

        Transaksi::create([
            'id_pustaka' => $request->id_pustaka,
            'id_anggota' => $request->id_anggota,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'fp' => '0', // Status pinjam
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pustakas = Pustaka::all();
        $anggotas = Anggota::all();
        return view('admin.transaksi.edit', compact('transaksi', 'pustakas', 'anggotas'));
    }

    // Memperbarui transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pustaka' => 'required|exists:tbl_pustaka,id_pustaka',
            'id_anggota' => 'required|exists:tbl_anggota,id_anggota',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'tgl_pengembalian' => 'required|date',
            'fp' => 'required|in:0,1',
            'keterangan' => 'required|string|max:50',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'id_pustaka' => $request->id_pustaka,
            'id_anggota' => $request->id_anggota,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'fp' => $request->fp,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    // Fungsi untuk mengembalikan buku (update tgl_pengembalian dan status)
    public function returnBook($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'tgl_pengembalian' => now(),
            'fp' => '1', // Status selesai
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Buku berhasil dikembalikan.');
    }
}