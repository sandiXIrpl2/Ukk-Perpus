<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Pustaka;
use App\Models\Rak;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahAnggota = Anggota::count();
        $jumlahTransaksi = Transaksi::count();
        $jumlahPustaka = Pustaka::count();
        $jumlahRak = Rak::count();

        return view('admin.adminHome', compact(
            'jumlahAnggota',
            'jumlahTransaksi',
            'jumlahPustaka',
            'jumlahRak'
        ));
    }
} 