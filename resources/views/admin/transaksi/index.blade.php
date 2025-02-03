@extends('layouts.admin')

@section('header', 'Manajemen Transaksi')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Transaksi</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Buku</th>
                <th class="border p-2">Anggota</th>
                <th class="border p-2">Tanggal Pinjam</th>
                <th class="border p-2">Tanggal Kembali</th>
                <th class="border p-2">Tanggal Pengembalian</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td class="border p-2">{{ $transaksi->id_transaksi }}</td>
                    <td class="border p-2">{{ $transaksi->pustaka->judul_pustaka }}</td>
                    <td class="border p-2">{{ $transaksi->anggota->nama_anggota }}</td>
                    <td class="border p-2">{{ $transaksi->tgl_pinjam }}</td>
                    <td class="border p-2">{{ $transaksi->tgl_kembali }}</td>
                    <td class="border p-2">{{ $transaksi->tgl_pengembalian }}</td>
                    <td class="border p-2">{{ $transaksi->fp == '0' ? 'Dipinjam' : 'Selesai' }}</td>
                    <td class="border p-2">
                        <a href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
