@extends('layouts.admin')

@section('header', 'Edit Format')

@section('content')
    <form action="{{ route('admin.format.update', $format->id_format) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="kode_format" class="block text-gray-700">Kode Format</label>
            <input type="text" id="kode_format" name="kode_format" value="{{ old('kode_format', $format->kode_format) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>
        
        <div class="mb-4">
            <label for="format" class="block text-gray-700">Format</label>
            <input type="text" id="format" name="format" value="{{ old('format', $format->format) }}" class="mt-1 block w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $format->keterangan) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui</button>
    </form>
@endsection
