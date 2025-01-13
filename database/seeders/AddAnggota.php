<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddAnggota extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan jenis anggota baru
        DB::table('tbl_jenis_anggota')->insert([
            ['kode_jenis_anggota' => 'ADM', 'jenis_anggota' => 'Admin', 'max_pinjam' => '10', 'keterangan' => 'Admin Perpustakaan'],
            ['kode_jenis_anggota' => 'SIS', 'jenis_anggota' => 'Siswa', 'max_pinjam' => '5', 'keterangan' => 'Anggota Siswa'],
        ]);

        // Menambahkan anggota dengan id_jenis_anggota Admin
        $adminId = DB::table('tbl_jenis_anggota')->where('kode_jenis_anggota', 'ADM')->value('id_jenis_anggota');
        
        DB::table('tbl_anggota')->insert([
            'id_jenis_anggota' => $adminId,
            'kode_anggota' => 'ADM001',
            'nama_anggota' => 'Admin Perpustakaan',
            'tempat' => 'Surabaya',
            'tgl_lahir' => '1990-01-01',
            'alamat' => 'Jl. Perpustakaan No. 1',
            'no_telp' => '081234567890',
            'email' => 'admin@gmail.com',
            'tgl_daftar' => now(),
            'masa_aktif' => now()->addYear(),
            'fa' => 'Y',
            'keterangan' => 'Admin Sistem',
            'foto' => '', // Tambahkan foto jika ada
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
