@extends('layouts.admin')

@section('header', 'Detail Pustaka')

@section('content')
    <div class="mb-4">
        <a href="{{ route('pustaka.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali ke Daftar Pustaka</a>
    </div>

    <div class="mb-4">
        <strong>Kode Pustaka:</strong> {{ $pustaka->kode_pustaka }}
    </div>
    <div class="mb-4">
        <strong>Judul Pustaka:</strong> {{ $pustaka->judul_pustaka }}
    </div>
    <div class="mb-4">
        <strong>Tahun Terbit:</strong> {{ $pustaka->tahun_terbit }}
    </div>
    <div class="mb-4">
        <strong>Pengarang:</strong> {{ $pustaka->pengarang->nama_pengarang }}
    </div>
    <div class="mb-4">
        <strong>Format:</strong> {{ $pustaka->format->nama_format }}
    </div>
    <div class="mb-4">
        <strong>Harga Buku:</strong> {{ $pustaka->harga_buku }}
    </div>
    <div class="mb-4">
        <strong>Kondisi Buku:</strong> {{ $pustaka->kondisi_buku }}
    </div>
    <div class="mb-4">
        <strong>Abstraksi:</strong> {{ $pustaka->abstraksi }}
    </div>
    <div class="mb-4">
        <strong>Keyword:</strong> {{ $pustaka->keyword }}
    </div>
    <div class="mb-4">
        <strong>Gambar:</strong>
        @if($pustaka->gambar)
            <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar Pustaka" class="mt-2 w-32 h-32">
        @endif
    </div>
@endsection
