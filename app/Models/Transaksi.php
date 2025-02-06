<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id_pustaka',
        'id_anggota',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_pengembalian',
        'fp',
        'keterangan',
    ];

    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class, 'id_pustaka');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }

    public function dendas()
    {
        return $this->hasMany(Denda::class, 'id_transaksi', 'id_transaksi');
    }

    public function totalDenda()
    {
        return $this->dendas->sum('jumlah_denda');
    }

    // Fungsi untuk menghitung denda
    public function hitungDenda()
    {
        // Jika sudah dikembalikan, hitung berdasarkan tanggal pengembalian aktual
        $tanggalAkhir = $this->tgl_pengembalian ? Carbon::parse($this->tgl_pengembalian) : Carbon::now();
        $batasWaktu = Carbon::parse($this->tgl_kembali);
        
        // Hitung selisih hari (bulatkan ke atas)
        $selisihHari = max(0, ceil($batasWaktu->floatDiffInDays($tanggalAkhir, false)));
        
        // Hitung denda (denda per hari * selisih hari)
        if ($tanggalAkhir > $batasWaktu) {
            $dendaPerHari = $this->pustaka->denda_terlambat ?? 1000; // default 1000 jika tidak diset
            $totalDenda = $selisihHari * $dendaPerHari;
            return $totalDenda;
        }
        
        return 0;
    }

    // Fungsi untuk mendapatkan status keterlambatan
    public function getStatusKeterlambatan()
    {
        if ($this->fp == '1') {
            // Jika sudah dikembalikan
            $tanggalKembali = Carbon::parse($this->tgl_pengembalian);
            $batasWaktu = Carbon::parse($this->tgl_kembali);
            
            if ($tanggalKembali > $batasWaktu) {
                $selisihHari = ceil($batasWaktu->floatDiffInDays($tanggalKembali, false));
                return "Terlambat {$selisihHari} hari";
            }
            return "Tepat Waktu";
        } else {
            // Jika belum dikembalikan
            $sekarang = Carbon::now();
            $batasWaktu = Carbon::parse($this->tgl_kembali);
            
            if ($sekarang > $batasWaktu) {
                $selisihHari = ceil($batasWaktu->floatDiffInDays($sekarang, false));
                return "Terlambat {$selisihHari} hari";
            }
            return "Masih Dalam Masa Peminjaman";
        }
    }
}
