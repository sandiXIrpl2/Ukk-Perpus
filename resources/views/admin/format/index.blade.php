@extends('layouts.admin')

@section('header', 'Manajemen Format')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.format.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Format Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode Format</th>
                <th class="border p-2">Format</th>
                <th class="border p-2">Keterangan</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formats as $format)
                <tr>
                    <td class="border p-2">{{ $format->kode_format }}</td>
                    <td class="border p-2">{{ $format->format }}</td>
                    <td class="border p-2">{{ $format->keterangan }}</td>
                    <td class="border p-2">
                        <a href="{{ route('format.edit', $format->id_format) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <form action="{{ route('format.destroy', $format->id_format) }}" method="POST" style="display:inline;">
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
