@extends('layouts.admin')

@section('header', 'Manajemen Anggota')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.anggota.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Anggota Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode Anggota</th>
                <th class="border p-2">Nama Anggota</th>
                <th class="border p-2">Jenis Anggota</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $anggota)
                <tr>
                    <td class="border p-2">{{ $anggota->kode_anggota }}</td>
                    <td class="border p-2">{{ $anggota->nama_anggota }}</td>
                    <td class="border p-2">{{ $anggota->jenisAnggota->jenis_anggota }}</td>
                    <td class="border p-2">
                        <a href="{{ route('anggota.edit', $anggota->id_anggota) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <a href="{{ route('anggota.show', $anggota->id_anggota) }}" class="text-blue-500 hover:text-blue-700">Detail</a>
                        |
                        <form action="{{ route('anggota.destroy', $anggota->id_anggota) }}" method="POST" style="display:inline;">
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
