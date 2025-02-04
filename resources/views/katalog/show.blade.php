@extends('layouts.user')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('katalog') }}" class="text-blue-500 hover:text-blue-600">
            ← Kembali ke Katalog
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            <!-- Book Image -->
            <div class="md:col-span-1">
                @if($pustaka->gambar)
                    <img src="{{ asset('storage/' . $pustaka->gambar) }}" 
                        alt="{{ $pustaka->judul_pustaka }}" 
                        class="w-full rounded-lg object-cover">
                @else
                    <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
            </div>

            <!-- Book Details -->
            <div class="md:col-span-2">
                <h1 class="text-3xl font-bold mb-4">{{ $pustaka->judul_pustaka }}</h1>
                
                <div class="space-y-3">
                    <div>
                        <span class="font-semibold">Pengarang:</span>
                        <span>{{ $pustaka->pengarang->nama_pengarang }}</span>
                    </div>
                    
                    <div>
                        <span class="font-semibold">Penerbit:</span>
                        <span>{{ $pustaka->penerbit->nama_penerbit }}</span>
                    </div>

                    <div>
                        <span class="font-semibold">Tahun Terbit:</span>
                        <span>{{ $pustaka->tahun_terbit }}</span>
                    </div>

                    <div>
                        <span class="font-semibold">ISBN:</span>
                        <span>{{ $pustaka->isbn }}</span>
                    </div>

                    <div>
                        <span class="font-semibold">Kategori:</span>
                        <span>{{ $pustaka->ddc->ddc }}</span>
                    </div>

                    <div>
                        <span class="font-semibold">Status:</span>
                        <span class="text-green-500">{{ $pustaka->status ?? 'Tersedia' }}</span>
                    </div>

                    @if($pustaka->deskripsi)
                        <div class="mt-6">
                            <h2 class="text-xl font-semibold mb-2">Deskripsi</h2>
                            <p class="text-gray-700">{{ $pustaka->deskripsi }}</p>
                        </div>
                    @endif
                </div>

                @if($pustaka->status === 'Tersedia')
                    <div class="mt-6">
                        <a href="{{ route('peminjaman.create', $pustaka->id_pustaka) }}" 
                            class="inline-block bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 transition duration-300">
                            Pinjam Buku
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 