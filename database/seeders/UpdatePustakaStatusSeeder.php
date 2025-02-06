<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pustaka;
use Illuminate\Support\Facades\DB;

class UpdatePustakaStatusSeeder extends Seeder
{
    public function run()
    {
        // Update semua buku yang belum pernah dipinjam menjadi status tersedia
        DB::table('tbl_pustaka')
            ->whereNull('fp')
            ->orWhere('fp', '')
            ->update(['fp' => '0']);

        // Update status buku berdasarkan transaksi aktif
        $pustakasDipinjam = DB::table('tbl_transaksi')
            ->where('fp', '0') // transaksi aktif
            ->pluck('id_pustaka');

        DB::table('tbl_pustaka')
            ->whereIn('id_pustaka', $pustakasDipinjam)
            ->update(['fp' => '1']);
    }
}