@extends('layouts.admin')

@section('header', 'Manajemen Jenis Anggota')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.jenis_anggota.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Jenis Anggota Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode Jenis Anggota</th>
                <th class="border p-2">Jenis Anggota</th>
                <th class="border p-2">Max Pinjam</th>
                <th class="border p-2">Keterangan</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisAnggotas as $jenisAnggota)
                <tr>
                    <td class="border p-2">{{ $jenisAnggota->kode_jenis_anggota }}</td>
                    <td class="border p-2">{{ $jenisAnggota->jenis_anggota }}</td>
                    <td class="border p-2">{{ $jenisAnggota->max_pinjam }}</td>
                    <td class="border p-2">{{ $jenisAnggota->keterangan }}</td>
                    <td class="border p-2">
                        <a href="{{ route('jenis_anggota.edit', $jenisAnggota->id_jenis_anggota) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <form action="{{ route('jenis_anggota.destroy', $jenisAnggota->id_jenis_anggota) }}" method="POST" style="display:inline;">
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
