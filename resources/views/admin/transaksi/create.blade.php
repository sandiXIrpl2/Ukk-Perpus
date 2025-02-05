@extends('layouts.admin')

@section('header', 'Tambah Transaksi')

@section('content')
    <form action="{{ route('admin.transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="id_pustaka" class="block text-gray-700">Buku</label>
            <select name="id_pustaka" id="id_pustaka" required class="w-full p-2 border rounded">
                @foreach ($pustakas as $pustaka)
                    @if($pustaka->fp == '0')
                        <option value="{{ $pustaka->id_pustaka }}">
                            {{ $pustaka->judul_pustaka }} ({{ $pustaka->kode_pustaka }})
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_anggota" class="block text-gray-700">Anggota</label>
            <select name="id_anggota" id="id_anggota" required class="w-full p-2 border rounded">
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tgl_pinjam" class="block text-gray-700">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="tgl_kembali" class="block text-gray-700">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="w-full p-2 border rounded" value="{{ old('keterangan') }}">
        </div>

        @if(session('error'))
            <div class="mb-4 text-red-500">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
@endsection