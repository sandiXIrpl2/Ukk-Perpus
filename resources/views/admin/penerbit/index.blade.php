@extends('layouts.admin')

@section('header', 'Manajemen Penerbit')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.penerbit.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Penerbit Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode Penerbit</th>
                <th class="border p-2">Nama Penerbit</th>
                <th class="border p-2">Alamat</th>
                <th class="border p-2">Telepon</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerbits as $penerbit)
                <tr>
                    <td class="border p-2">{{ $penerbit->kode_penerbit }}</td>
                    <td class="border p-2">{{ $penerbit->nama_penerbit }}</td>
                    <td class="border p-2">{{ $penerbit->alamat_penerbit }}</td>
                    <td class="border p-2">{{ $penerbit->no_telp }}</td>
                    <td class="border p-2">{{ $penerbit->email }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.penerbit.edit', $penerbit->id_penerbit) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <form action="{{ route('admin.penerbit.destroy', $penerbit->id_penerbit) }}" method="POST" style="display:inline;">
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
