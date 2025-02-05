<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pustaka;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    public function create($id_pustaka)
    {
        $pustaka = Pustaka::findOrFail($id_pustaka);
        
        // Cek apakah buku tersedia (fp = 0)
        if ($pustaka->fp != '0') {
            return redirect()->back()->with('error', 'Maaf, buku ini sedang tidak tersedia.');
        }

        return view('peminjaman.create', compact('pustaka'));
    }

    public function store(Request $request, $id_pustaka)
    {
        $pustaka = Pustaka::findOrFail($id_pustaka);
        
        // Cek apakah buku tersedia
        if ($pustaka->fp != '0') {
            return redirect()->back()->with('error', 'Maaf, buku ini sedang tidak tersedia.');
        }

        // Generate ID transaksi
        $id_transaksi = 'TRX-' . Str::random(10);

        // Buat transaksi baru
        $transaksi = Transaksi::create([
            'id_transaksi' => $id_transaksi,
            'id_pustaka' => $pustaka->id_pustaka,
            'id_anggota' => auth()->guard('anggota')->id(),
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7), // Durasi peminjaman 7 hari
            'fp' => '0', // Status peminjaman (0 = dipinjam)
            'keterangan' => 'Pengajuan peminjaman buku',
        ]);

        // Update status buku menjadi dipinjam
        $pustaka->update(['fp' => '1']);

        // Redirect ke halaman riwayat peminjaman
        return redirect()->route('peminjaman.index')
            ->with('success', 'Pengajuan peminjaman berhasil dibuat. Silahkan tunggu konfirmasi dari admin.');
    }

    public function show($id_transaksi)
    {
        $transaksi = Transaksi::with(['pustaka', 'anggota'])->findOrFail($id_transaksi);
        return view('peminjaman.show', compact('transaksi'));
    }

    public function index()
    {
        $transaksis = Transaksi::with(['pustaka', 'anggota'])
            ->where('id_anggota', auth()->guard('anggota')->id())
            ->orderBy('tgl_pinjam', 'desc')
            ->get();
            
        return view('peminjaman.index', compact('transaksis'));
    }

    public function returnBook($id)
    {
        $transaksi = Transaksi::where('id_transaksi', $id)
            ->where('id_anggota', auth()->guard('anggota')->id())
            ->firstOrFail();
        
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

        return redirect()->route('peminjaman.index')
            ->with('success', 'Buku berhasil dikembalikan.' . ($denda > 0 ? " Denda: Rp " . number_format($denda, 0, ',', '.') : ''));
    }
} 