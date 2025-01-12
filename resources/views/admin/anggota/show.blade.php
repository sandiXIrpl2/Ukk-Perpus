@extends('layouts.admin')

@section('header', 'Detail Anggota')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Detail Anggota</h2>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="kode_anggota" class="block text-gray-700 font-medium mb-2">Kode Anggota</label>
                <input 
                    type="text" 
                    id="kode_anggota" 
                    value="{{ $anggota->kode_anggota }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="nama_anggota" class="block text-gray-700 font-medium mb-2">Nama Anggota</label>
                <input 
                    type="text" 
                    id="nama_anggota" 
                    value="{{ $anggota->nama_anggota }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="jenis_anggota" class="block text-gray-700 font-medium mb-2">Jenis Anggota</label>
                <input 
                    type="text" 
                    id="jenis_anggota" 
                    value="{{ $anggota->jenisAnggota->jenis_anggota }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="tempat" class="block text-gray-700 font-medium mb-2">Tempat Lahir</label>
                <input 
                    type="text" 
                    id="tempat" 
                    value="{{ $anggota->tempat }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="tgl_lahir" class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input 
                    type="text" 
                    id="tgl_lahir" 
                    value="{{ \Carbon\Carbon::parse($anggota->tgl_lahir)->format('d-m-Y') }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                <input 
                    type="text" 
                    id="alamat" 
                    value="{{ $anggota->alamat }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="no_telp" class="block text-gray-700 font-medium mb-2">No Telepon</label>
                <input 
                    type="text" 
                    id="no_telp" 
                    value="{{ $anggota->no_telp }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input 
                    type="text" 
                    id="email" 
                    value="{{ $anggota->email }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="tgl_daftar" class="block text-gray-700 font-medium mb-2">Tanggal Daftar</label>
                <input 
                    type="text" 
                    id="tgl_daftar" 
                    value="{{ \Carbon\Carbon::parse($anggota->tgl_daftar)->format('d-m-Y') }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="masa_aktif" class="block text-gray-700 font-medium mb-2">Masa Aktif</label>
                <input 
                    type="text" 
                    id="masa_aktif" 
                    value="{{ \Carbon\Carbon::parse($anggota->masa_aktif)->format('d-m-Y') }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="status_fa" class="block text-gray-700 font-medium mb-2">Status FA</label>
                <input 
                    type="text" 
                    id="status_fa" 
                    value="{{ $anggota->fa == 'Y' ? 'Ya' : 'Tidak' }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>

            <div>
                <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan</label>
                <input 
                    type="text" 
                    id="keterangan" 
                    value="{{ $anggota->keterangan ?? 'Tidak ada keterangan' }}" 
                    class="w-full p-2 border rounded bg-gray-100 text-gray-500" 
                    disabled
                >
            </div>
        </div>

        <div class="my-6">
            <label for="foto" class="block text-gray-700 font-medium mb-2">Foto</label>
            @if($anggota->foto)
                <img src="{{ Storage::url($anggota->foto) }}" alt="Foto Anggota" class="mt-2 w-32 h-32 object-cover rounded-full">
            @else
                <p>Tidak ada foto</p>
            @endif
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('anggota.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            <a href="{{ route('anggota.edit', $anggota->id_anggota) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
        </div>
    </div>
@endsection
