@extends('layouts.admin')

@section('header', 'Edit Penerbit')

@section('content')
    <form action="{{ route('admin.penerbit.update', $penerbit->id_penerbit) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="kode_penerbit" class="block text-gray-700">Kode Penerbit</label>
            <input type="text" id="kode_penerbit" name="kode_penerbit" value="{{ old('kode_penerbit', $penerbit->kode_penerbit) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>
        
        <div class="mb-4">
            <label for="nama_penerbit" class="block text-gray-700">Nama Penerbit</label>
            <input type="text" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="alamat_penerbit" class="block text-gray-700">Alamat</label>
            <input type="text" id="alamat_penerbit" name="alamat_penerbit" value="{{ old('alamat_penerbit', $penerbit->alamat_penerbit) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700">No. Telp</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $penerbit->no_telp) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $penerbit->email) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="fax" class="block text-gray-700">Fax</label>
            <input type="text" id="fax" name="fax" value="{{ old('fax', $penerbit->fax) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="website" class="block text-gray-700">Website</label>
            <input type="text" id="website" name="website" value="{{ old('website', $penerbit->website) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="kontak" class="block text-gray-700">Kontak</label>
            <input type="text" id="kontak" name="kontak" value="{{ old('kontak', $penerbit->kontak) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui</button>
    </form>
@endsection
