<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_anggota';
    protected $primaryKey = 'id_anggota';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id_jenis_anggota',
        'kode_anggota',
        'nama_anggota',
        'tempat',
        'tgl_lahir',
        'alamat',
        'no_telp',
        'email',
        'tgl_daftar',
        'masa_aktif',
        'fa',
        'keterangan',
        'foto',
        'username',
        'password',
    ];

    public function jenisAnggota()
    {
        return $this->belongsTo(JenisAnggota::class, 'id_jenis_anggota');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_anggota');
    }
}
