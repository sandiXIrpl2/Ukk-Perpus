@extends('layouts.admin')

@section('header', 'Tambah Penerbit Baru')

@section('content')
    <form action="{{ route('admin.penerbit.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="kode_penerbit" class="block text-gray-700">Kode Penerbit</label>
            <input type="text" id="kode_penerbit" name="kode_penerbit" value="{{ old('kode_penerbit') }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('kode_penerbit')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="nama_penerbit" class="block text-gray-700">Nama Penerbit</label>
            <input type="text" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit') }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('nama_penerbit')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="alamat_penerbit" class="block text-gray-700">Alamat</label>
            <input type="text" id="alamat_penerbit" name="alamat_penerbit" value="{{ old('alamat_penerbit') }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('alamat_penerbit')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700">No. Telp</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('no_telp')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="fax" class="block text-gray-700">Fax</label>
            <input type="text" id="fax" name="fax" value="{{ old('fax') }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="website" class="block text-gray-700">Website</label>
            <input type="text" id="website" name="website" value="{{ old('website') }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="kontak" class="block text-gray-700">Kontak</label>
            <input type="text" id="kontak" name="kontak" value="{{ old('kontak') }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
