@extends('layouts.admin')

@section('header', 'Edit Rak')

@section('content')
    <form action="{{ route('admin.raks.update', $rak->id_rak) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="kode_rak" class="block text-gray-700">Kode Rak</label>
            <input type="text" name="kode_rak" id="kode_rak" class="w-full p-2 border rounded" value="{{ old('kode_rak', $rak->kode_rak) }}" required>
        </div>
        <div class="mb-4">
            <label for="rak" class="block text-gray-700">Nama Rak</label>
            <input type="text" name="rak" id="rak" class="w-full p-2 border rounded" value="{{ old('rak', $rak->rak) }}" required>
        </div>
        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="w-full p-2 border rounded">{{ old('keterangan', $rak->keterangan) }}</textarea>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
@endsection
