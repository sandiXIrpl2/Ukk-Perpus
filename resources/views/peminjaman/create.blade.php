@extends('layouts.user')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-6">
        <a href="{{ route('katalog.show', $pustaka->id_pustaka) }}" class="text-blue-500 hover:text-blue-600">
            ← Kembali ke Detail Buku
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Konfirmasi Peminjaman Buku</h2>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-6">
            <h3 class="font-semibold mb-2">Detail Buku:</h3>
            <p><span class="text-gray-600">Judul:</span> {{ $pustaka->judul_pustaka }}</p>
            <p><span class="text-gray-600">Pengarang:</span> {{ $pustaka->pengarang->nama_pengarang }}</p>
            <p><span class="text-gray-600">Penerbit:</span> {{ $pustaka->penerbit->nama_penerbit }}</p>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold mb-2">Ketentuan Peminjaman:</h3>
            <ul class="list-disc list-inside text-gray-600">
                <li>Durasi peminjaman: 7 hari</li>
                <li>Denda keterlambatan: Rp {{ number_format($pustaka->denda_terlambat, 0, ',', '.') }}/hari</li>
                <li>Denda buku hilang: Rp {{ number_format($pustaka->denda_hilang, 0, ',', '.') }}</li>
            </ul>
        </div>

        <form action="{{ route('peminjaman.store', $pustaka->id_pustaka) }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                Ajukan Peminjaman
            </button>
        </form>
    </div>
</div>
@endsection 