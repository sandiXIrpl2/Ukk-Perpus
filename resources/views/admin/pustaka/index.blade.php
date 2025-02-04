@extends('layouts.admin')

@section('header', 'Manajemen Pustaka')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.pustaka.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pustaka Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode Pustaka</th>
                <th class="border p-2">Judul</th>
                <th class="border p-2">ISBN</th>
                <th class="border p-2">Tahun Terbit</th>
                <th class="border p-2">Kondisi</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pustakas as $pustaka)
                <tr>
                    <td class="border p-2">{{ $pustaka->kode_pustaka }}</td>
                    <td class="border p-2">{{ $pustaka->judul_pustaka }}</td>
                    <td class="border p-2">{{ $pustaka->isbn }}</td>
                    <td class="border p-2">{{ $pustaka->tahun_terbit }}</td>
                    <td class="border p-2">{{ $pustaka->kondisi_buku }}</td>
                    <td class="border p-2">{{ number_format($pustaka->harga_buku, 0, ',', '.') }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.pustaka.edit', $pustaka->id_pustaka) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <a href="{{ route('admin.pustaka.show', $pustaka->id_pustaka) }}" class="text-blue-500 hover:text-blue-700">Lihat</a>
                        |
                        <form action="{{ route('admin.pustaka.destroy', $pustaka->id_pustaka) }}" method="POST" style="display:inline;">
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
