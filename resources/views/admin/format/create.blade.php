@extends('layouts.admin')

@section('header', 'Tambah Format Baru')

@section('content')
    <form action="{{ route('admin.format.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="kode_format" class="block text-gray-700">Kode Format</label>
            <input type="text" id="kode_format" name="kode_format" class="mt-1 block w-full border p-2 rounded" required>
        </div>
        
        <div class="mb-4">
            <label for="format" class="block text-gray-700">Format</label>
            <input type="text" id="format" name="format" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" class="mt-1 block w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
