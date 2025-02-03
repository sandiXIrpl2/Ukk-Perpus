@extends('layouts.admin')

@section('header', 'Manajemen Rak')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.raks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Rak Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode Rak</th>
                <th class="border p-2">Nama Rak</th>
                <th class="border p-2">Keterangan</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($raks as $rak)
                <tr>
                    <td class="border p-2">{{ $rak->kode_rak }}</td>
                    <td class="border p-2">{{ $rak->rak }}</td>
                    <td class="border p-2">{{ $rak->keterangan }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.raks.edit', $rak->id_rak) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <form action="{{ route('admin.raks.destroy', $rak->id_rak) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus rak ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
