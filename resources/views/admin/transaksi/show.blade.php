@extends('layouts.admin')

@section('header', 'Detail Transaksi')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-semibold mb-4">Informasi Transaksi</h3>
                <div class="mb-4">
                    <label class="block text-gray-600">ID Transaksi</label>
                    <p class="font-medium">{{ $transaksi->id_transaksi }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600">Status</label>
                    <p class="font-medium">
                        @if($transaksi->fp == '0')
                            <span class="text-yellow-500">Dipinjam</span>
                        @else
                            <span class="text-green-500">Selesai</span>
                        @endif
                    </p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600">Tanggal Pinjam</label>
                    <p class="font-medium">{{ $transaksi->tgl_pinjam }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600">Tanggal Kembali</label>
                    <p class="font-medium">{{ $transaksi->tgl_kembali }}</p>
                </div>

                @if($transaksi->tgl_pengembalian)
                    <div class="mb-4">
                        <label class="block text-gray-600">Tanggal Pengembalian Aktual</label>
                        <p class="font-medium">{{ $transaksi->tgl_pengembalian }}</p>
                    </div>
                @endif

                @if($transaksi->keterangan)
                    <div class="mb-4">
                        <label class="block text-gray-600">Keterangan</label>
                        <p class="font-medium">{{ $transaksi->keterangan }}</p>
                    </div>
                @endif
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Informasi Peminjam</h3>
                <div class="mb-4">
                    <label class="block text-gray-600">Nama Anggota</label>
                    <p class="font-medium">{{ $transaksi->anggota->nama_anggota }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600">Jenis Anggota</label>
                    <p class="font-medium">{{ $transaksi->anggota->jenisAnggota->nama_jenis }}</p>
                </div>

                <h3 class="text-lg font-semibold mb-4 mt-6">Informasi Buku</h3>
                <div class="mb-4">
                    <label class="block text-gray-600">Judul Buku</label>
                    <p class="font-medium">{{ $transaksi->pustaka->judul_pustaka }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600">Kode Pustaka</label>
                    <p class="font-medium">{{ $transaksi->pustaka->kode_pustaka }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('admin.transaksi.edit', $transaksi->id_transaksi) }}" 
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Edit Transaksi
            </a>

            @if($transaksi->fp == '0')
                <form action="{{ route('admin.transaksi.return', $transaksi->id_transaksi) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Kembalikan Buku
                    </button>
                </form>
            @endif

            <a href="{{ route('admin.transaksi.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
        </div>
    </div>
@endsection 