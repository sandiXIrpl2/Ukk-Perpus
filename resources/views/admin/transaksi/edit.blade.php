@extends('layouts.admin')

@section('header', 'Edit Transaksi')

@section('content')
    <form action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="id_pustaka" class="block text-gray-700">Buku</label>
            <select name="id_pustaka" id="id_pustaka" required class="w-full p-2 border rounded">
                @foreach ($pustakas as $pustaka)
                    <option value="{{ $pustaka->id_pustaka }}" {{ $transaksi->id_pustaka == $pustaka->id_pustaka ? 'selected' : '' }}>
                        {{ $pustaka->judul_pustaka }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_anggota" class="block text-gray-700">Anggota</label>
            <select name="id_anggota" id="id_anggota" required class="w-full p-2 border rounded">
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->id_anggota }}" {{ $transaksi->id_anggota == $anggota->id_anggota ? 'selected' : '' }}>
                        {{ $anggota->nama_anggota }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tgl_pinjam" class="block text-gray-700">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="{{ $transaksi->tgl_pinjam }}" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="tgl_kembali" class="block text-gray-700">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" value="{{ $transaksi->tgl_kembali }}" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="tgl_pengembalian" class="block text-gray-700">Tanggal Pengembalian</label>
            <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" value="{{ $transaksi->tgl_pengembalian }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="fp" class="block text-gray-700">Status Transaksi</label>
            <select name="fp" id="fp" required class="w-full p-2 border rounded">
                <option value="0" {{ $transaksi->fp == '0' ? 'selected' : '' }}>Dipinjam</option>
                <option value="1" {{ $transaksi->fp == '1' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="w-full p-2 border rounded" value="{{ old('keterangan', $transaksi->keterangan) }}">
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Transaksi</button>
        </div>
    </form>
@endsection
