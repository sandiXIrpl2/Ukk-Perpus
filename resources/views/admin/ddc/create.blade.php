@extends('layouts.admin')

@section('content')
    <h3 class="font-semibold text-lg text-gray-800 mb-4">Tambah DDC</h3>

    <form action="{{ route('ddc.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="kode_ddc" class="block text-gray-700">Kode DDC</label>
            <input type="text" id="kode_ddc" name="kode_ddc" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="ddc" class="block text-gray-700">DDC</label>
            <input type="text" id="ddc" name="ddc" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="id_rak" class="block text-gray-700">Rak</label>
            <select id="id_rak" name="id_rak" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @foreach($raks as $rak)
                    <option value="{{ $rak->id_rak }}">{{ $rak->rak }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
    </form>
@endsection
