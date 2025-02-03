@extends('layouts.admin')

@section('header', 'Manajemen Pengarang')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.pengarang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pengarang Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode Pengarang</th>
                <th class="border p-2">Nama Pengarang</th>
                <th class="border p-2">No Telp</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengarangs as $pengarang)
                <tr>
                    <td class="border p-2">{{ $pengarang->kode_pengarang }}</td>
                    <td class="border p-2">{{ $pengarang->nama_pengarang }}</td>
                    <td class="border p-2">{{ $pengarang->no_telp }}</td>
                    <td class="border p-2">{{ $pengarang->email }}</td>
                    <td class="border p-2">
                        <a href="{{ route('pengarang.edit', $pengarang->id_pengarang) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <form action="{{ route('pengarang.destroy', $pengarang->id_pengarang) }}" method="POST" style="display:inline;">
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
