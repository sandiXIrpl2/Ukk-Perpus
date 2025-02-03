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
        // Check and insert jenis anggota if they don't exist
        $jenisAnggota = [
            ['kode_jenis_anggota' => 'ADM', 'jenis_anggota' => 'Admin', 'max_pinjam' => '10', 'keterangan' => 'Admin Perpustakaan'],
            ['kode_jenis_anggota' => 'SIS', 'jenis_anggota' => 'Siswa', 'max_pinjam' => '5', 'keterangan' => 'Anggota Siswa'],
        ];

        foreach ($jenisAnggota as $jenis) {
            DB::table('tbl_jenis_anggota')
                ->updateOrInsert(
                    ['kode_jenis_anggota' => $jenis['kode_jenis_anggota']],
                    $jenis
                );
        }

        // Get admin id and insert admin user if doesn't exist
        $adminId = DB::table('tbl_jenis_anggota')
            ->where('kode_jenis_anggota', 'ADM')
            ->value('id_jenis_anggota');
        
        DB::table('tbl_anggota')->updateOrInsert(
            ['kode_anggota' => 'ADM001'],
            [
                'id_jenis_anggota' => $adminId,
                'kode_anggota' => 'ADM001',
                'nama_anggota' => 'Admin Perpustakaan',
                'tempat' => 'Surabaya',
                'tgl_lahir' => '1990-01-01',
                'alamat' => 'Jl. Perpustakaan No. 1',
                'no_telp' => '081234567890',
                'email' => 'admin1@gmail.com',
                'tgl_daftar' => now(),
                'masa_aktif' => now()->addYear(),
                'fa' => 'Y',
                'keterangan' => 'Admin Sistem',
                'foto' => '',
                'username' => 'admin',
                'password' => bcrypt('12345678'),
            ]
        );
    }
}
