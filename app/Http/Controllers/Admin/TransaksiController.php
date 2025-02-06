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
        // dd($transaksis);
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
            'tgl_kembali' => 'required|date|after:tgl_pinjam',
            'keterangan' => 'nullable|string|max:50',
        ]);

        // Generate ID Transaksi (format: TRX-YYYYMMDD-XXX)
        $today = now()->format('Ymd');
        $lastTransaction = Transaksi::where('id_transaksi', 'like', "TRX-{$today}%")
            ->orderBy('id_transaksi', 'desc')
            ->first();
        
        if ($lastTransaction) {
            $lastNumber = intval(substr($lastTransaction->id_transaksi, -3));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }
        
        $id_transaksi = "TRX-{$today}-{$newNumber}";

        // Cek ketersediaan buku
        $pustaka = Pustaka::findOrFail($request->id_pustaka);
        if ($pustaka->fp == '1') {
            return redirect()->back()->with('error', 'Buku sedang tidak tersedia untuk dipinjam.');
        }

        // Buat transaksi baru
        Transaksi::create([
            'id_transaksi' => $id_transaksi,
            'id_pustaka' => $request->id_pustaka,
            'id_anggota' => $request->id_anggota,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'fp' => '0', // Status peminjaman aktif
            'keterangan' => $request->keterangan,
        ]);

        // Update status buku
        $pustaka->update([
            'fp' => '1', // Buku sedang dipinjam
            'jml_pinjam' => $pustaka->jml_pinjam + 1,
        ]);

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Transaksi peminjaman berhasil dibuat.');
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

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    // Fungsi untuk mengembalikan buku (update tgl_pengembalian dan status)
    public function returnBook($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        // Hitung denda jika terlambat
        $denda = 0;
        if (now() > $transaksi->tgl_kembali) {
            $daysLate = now()->diffInDays($transaksi->tgl_kembali);
            $denda = $daysLate * $transaksi->pustaka->denda_terlambat;
        }

        $transaksi->update([
            'tgl_pengembalian' => now(),
            'fp' => '1', // Status selesai
            'keterangan' => $denda > 0 ? "Denda keterlambatan: Rp " . number_format($denda, 0, ',', '.') : null,
        ]);

        // Update status buku
        $transaksi->pustaka->update([
            'fp' => '0', // Buku tersedia kembali
        ]);

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Buku berhasil dikembalikan.' . ($denda > 0 ? " Denda: Rp " . number_format($denda, 0, ',', '.') : ''));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['anggota.jenisAnggota', 'pustaka'])
            ->findOrFail($id);
        
        return view('admin.transaksi.show', compact('transaksi'));
    }
}