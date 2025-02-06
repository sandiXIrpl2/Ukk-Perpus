@extends('layouts.user')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Form Pengembalian Buku</h2>
        <a href="{{ route('pengembalian.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('pengembalian.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="id_transaksi" class="block text-gray-700 font-medium mb-2">Pilih Transaksi</label>
                <select name="id_transaksi" id="id_transaksi" required 
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Pilih Transaksi Peminjaman</option>
                    @foreach($transaksis as $transaksi)
                        @if($transaksi->fp == '0')
                            <option value="{{ $transaksi->id_transaksi }}">
                                {{ $transaksi->id_transaksi }} - 
                                {{ $transaksi->pustaka->judul_pustaka }} 
                                (Dipinjam: {{ $transaksi->tgl_pinjam }})
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="kondisi_buku" class="block text-gray-700 font-medium mb-2">Kondisi Buku</label>
                <select name="kondisi_buku" id="kondisi_buku" required 
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                    <option value="Hilang">Hilang</option>
                </select>
                <p class="text-sm text-gray-500 mt-1">
                    Denda kerusakan: Rusak Ringan (Rp 20.000), Rusak Berat (Rp 50.000), Hilang (Rp 100.000)
                </p>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan Tambahan</label>
                <textarea name="keterangan" id="keterangan" rows="3" 
                          class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                          placeholder="Tambahkan keterangan jika diperlukan"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600"
                        onclick="return confirm('Apakah Anda yakin ingin mengembalikan buku ini?')">
                    Kembalikan Buku
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 