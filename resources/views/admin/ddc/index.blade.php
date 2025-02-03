@extends('layouts.admin')

@section('header', 'Manajemen DDC')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.ddc.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah DDC Baru</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border p-2">Kode DDC</th>
                <th class="border p-2">DDC</th>
                <th class="border p-2">Rak</th>
                <th class="border p-2">Keterangan</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ddcs as $ddc)
                <tr>
                    <td class="border p-2">{{ $ddc->kode_ddc }}</td>
                    <td class="border p-2">{{ $ddc->ddc }}</td>
                    <td class="border p-2">{{ $ddc->rak->rak }}</td>
                    <td class="border p-2">{{ $ddc->keterangan }}</td>
                    <td class="border p-2">
                        <a href="{{ route('ddc.edit', $ddc->id_ddc) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        |
                        <form action="{{ route('ddc.destroy', $ddc->id_ddc) }}" method="POST" style="display:inline;">
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
