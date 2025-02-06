<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pustaka'])
            ->where('id_anggota', auth('anggota')->id())
            ->orderBy('tgl_kembali', 'asc')
            ->get();

        return view('pengembalian.index', compact('transaksis'));
    }

    public function return($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        // Verifikasi bahwa transaksi ini milik user yang login
        if ($transaksi->id_anggota != auth('anggota')->id()) {
            abort(403);
        }

        // Hitung denda jika terlambat
        $denda = 0;
        if (now() > $transaksi->tgl_kembali) {
            $daysLate = now()->diffInDays($transaksi->tgl_kembali);
            $denda = $daysLate * $transaksi->pustaka->denda_terlambat;
        }

        // Tambahan denda berdasarkan kondisi buku
        $kondisiBuku = request('kondisi_buku', 'Baik');
        $dendaKondisi = 0;
        
        switch ($kondisiBuku) {
            case 'Rusak Ringan':
                $dendaKondisi = 20000; // Denda untuk rusak ringan
                break;
            case 'Rusak Berat':
                $dendaKondisi = 50000; // Denda untuk rusak berat
                break;
            case 'Hilang':
                $dendaKondisi = 100000; // Denda untuk buku hilang
                break;
        }

        $totalDenda = $denda + $dendaKondisi;
        $keterangan = [];
        
        if ($denda > 0) {
            $keterangan[] = "Denda keterlambatan: Rp " . number_format($denda, 0, ',', '.');
        }
        if ($dendaKondisi > 0) {
            $keterangan[] = "Denda $kondisiBuku: Rp " . number_format($dendaKondisi, 0, ',', '.');
        }

        $transaksi->update([
            'tgl_pengembalian' => now(),
            'fp' => '1', // Status selesai
            'keterangan' => !empty($keterangan) ? implode(", ", $keterangan) : null,
            'kondisi_buku' => $kondisiBuku
        ]);

        // Update status buku
        $transaksi->pustaka->update([
            'fp' => '0', // Buku tersedia kembali
        ]);

        $message = 'Buku berhasil dikembalikan.';
        if ($totalDenda > 0) {
            $message .= " Total Denda: Rp " . number_format($totalDenda, 0, ',', '.');
        }

        return redirect()->route('pengembalian.index')
            ->with('success', $message);
    }

    public function create()
    {
        $transaksis = Transaksi::with(['pustaka'])
            ->where('id_anggota', auth('anggota')->id())
            ->where('fp', '0')
            ->orderBy('tgl_kembali', 'asc')
            ->get();

        return view('pengembalian.create', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|exists:tbl_transaksi,id_transaksi',
            'kondisi_buku' => 'required|in:Baik,Rusak Ringan,Rusak Berat,Hilang',
            'keterangan' => 'nullable|string|max:255'
        ]);

        $transaksi = Transaksi::findOrFail($request->id_transaksi);
        
        // Verifikasi bahwa transaksi ini milik user yang login
        if ($transaksi->id_anggota != auth('anggota')->id()) {
            abort(403);
        }

        // Hitung denda keterlambatan
        $denda = 0;
        if (now() > $transaksi->tgl_kembali) {
            $daysLate = now()->diffInDays($transaksi->tgl_kembali);
            $denda = $daysLate * $transaksi->pustaka->denda_terlambat;
        }

        // Hitung denda kondisi buku
        $dendaKondisi = 0;
        switch ($request->kondisi_buku) {
            case 'Rusak Ringan':
                $dendaKondisi = 20000;
                break;
            case 'Rusak Berat':
                $dendaKondisi = 50000;
                break;
            case 'Hilang':
                $dendaKondisi = 100000;
                break;
        }

        $totalDenda = $denda + $dendaKondisi;
        $keterangan = [];
        
        if ($denda > 0) {
            $keterangan[] = "Denda keterlambatan: Rp " . number_format($denda, 0, ',', '.');
        }
        if ($dendaKondisi > 0) {
            $keterangan[] = "Denda {$request->kondisi_buku}: Rp " . number_format($dendaKondisi, 0, ',', '.');
        }
        if ($request->keterangan) {
            $keterangan[] = $request->keterangan;
        }

        $transaksi->update([
            'tgl_pengembalian' => now(),
            'fp' => '1',
            'kondisi_buku' => $request->kondisi_buku,
            'keterangan' => !empty($keterangan) ? implode(", ", $keterangan) : null
        ]);

        // Update status buku
        $transaksi->pustaka->update([
            'fp' => '0'
        ]);

        $message = 'Buku berhasil dikembalikan.';
        if ($totalDenda > 0) {
            $message .= " Total Denda: Rp " . number_format($totalDenda, 0, ',', '.');
        }

        return redirect()->route('pengembalian.index')
            ->with('success', $message);
    }
} 