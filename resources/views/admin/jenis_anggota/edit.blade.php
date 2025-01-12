@extends('layouts.admin')

@section('header', 'Edit Jenis Anggota')

@section('content')
    <form action="{{ route('jenis_anggota.update', $jenisAnggota->id_jenis_anggota) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="kode_jenis_anggota" class="block text-gray-700">Kode Jenis Anggota</label>
            <input type="text" id="kode_jenis_anggota" name="kode_jenis_anggota" value="{{ old('kode_jenis_anggota', $jenisAnggota->kode_jenis_anggota) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="jenis_anggota" class="block text-gray-700">Jenis Anggota</label>
            <input type="text" id="jenis_anggota" name="jenis_anggota" value="{{ old('jenis_anggota', $jenisAnggota->jenis_anggota) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="max_pinjam" class="block text-gray-700">Max Pinjam</label>
            <input type="text" id="max_pinjam" name="max_pinjam" value="{{ old('max_pinjam', $jenisAnggota->max_pinjam) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $jenisAnggota->keterangan) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
@endsection
