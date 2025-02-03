@extends('layouts.user')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Katalog Pustaka</h1>

    <!-- Search Form -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <form action="{{ route('katalog') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Kata Kunci</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                    placeholder="Judul, pengarang, atau ISBN">
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="category" id="category" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                    <option value="">Semua Kategori</option>
                    @foreach($ddcs as $ddc)
                        <option value="{{ $ddc->id_ddc }}" {{ request('category') == $ddc->id_ddc ? 'selected' : '' }}>
                            {{ $ddc->ddc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                    Cari Buku
                </button>
            </div>
        </form>
    </div>

    <!-- Books Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($pustakas as $pustaka)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($pustaka->gambar)
                <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="{{ $pustaka->judul_pustaka }}" 
                    class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
            @endif
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2">{{ $pustaka->judul_pustaka }}</h3>
                <p class="text-sm text-gray-600 mb-2">Pengarang: {{ $pustaka->pengarang->nama_pengarang }}</p>
                <p class="text-sm text-gray-600 mb-2">Tahun: {{ $pustaka->tahun_terbit }}</p>
                <p class="text-sm text-gray-600">Status: 
                    <span class="text-green-500">{{ $pustaka->status ?? 'Tersedia' }}</span>
                </p>
                <a href="{{ route('katalog.show', $pustaka->id_pustaka) }}" 
                    class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                    Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $pustakas->links() }}
    </div>
</div>
@endsection 