@extends('layouts.user')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Riwayat Peminjaman</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Buku</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Pinjam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Kembali</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td class="px-6 py-4">{{ $transaksi->id_transaksi }}</td>
                        <td class="px-6 py-4">{{ $transaksi->pustaka->judul_pustaka }}</td>
                        <td class="px-6 py-4">{{ $transaksi->tgl_pinjam }}</td>
                        <td class="px-6 py-4">{{ $transaksi->tgl_kembali }}</td>
                        <td class="px-6 py-4">
                            @if($transaksi->fp == '0')
                                <span class="text-yellow-500">Dipinjam</span>
                            @else
                                <span class="text-green-500">Selesai</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($transaksi->fp == '0')
                                <form action="{{ route('peminjaman.return', $transaksi->id_transaksi) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-blue-500 hover:text-blue-700">Kembalikan Buku</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 