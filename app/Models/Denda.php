<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'tbl_denda';
    protected $primaryKey = 'id_denda';
    
    protected $fillable = [
        'id_transaksi',
        'jumlah_denda',
        'jenis_denda',
        'keterangan'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
} 