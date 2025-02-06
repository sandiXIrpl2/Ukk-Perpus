@extends('layouts.admin')

@section('header', 'Manajemen Transaksi')

@section('content')
<div class="mb-4">
        <a href="{{ route('admin.transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Transaksi Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">ID Transaksi</th>
                <th class="border p-2">Anggota</th>
                <th class="border p-2">Buku</th>
                <th class="border p-2">Tgl Pinjam</th>
                <th class="border p-2">Tgl Kembali</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td class="border p-2">{{ $transaksi->id_transaksi }}</td>
                    <td class="border p-2">{{ $transaksi->anggota->nama_anggota }}</td>
                    <td class="border p-2">{{ $transaksi->pustaka->judul_pustaka }}</td>
                    <td class="border p-2">{{ $transaksi->tgl_pinjam }}</td>
                    <td class="border p-2">{{ $transaksi->tgl_kembali }}</td>
                    <td class="border p-2">
                        @if($transaksi->fp == '0')
                            <span class="text-yellow-500">Dipinjam</span>
                        @else
                            <span class="text-green-500">Selesai</span>
                        @endif
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('admin.transaksi.show', $transaksi->id_transaksi) }}" 
                           class="text-indigo-500 hover:text-indigo-700 mr-2">Detail</a>

                        @if($transaksi->fp == '0')
                            <form action="{{ route('admin.transaksi.return', $transaksi->id_transaksi) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-green-500 hover:text-green-700 mr-2">Kembalikan</button>
                            </form>
                        @endif
                        
                        <a href="{{ route('admin.transaksi.edit', $transaksi->id_transaksi) }}" 
                           class="text-blue-500 hover:text-blue-700">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
