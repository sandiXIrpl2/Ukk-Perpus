@extends('layouts.admin')

@section('header', 'Tambah Pustaka Baru')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.pustaka.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali ke Daftar Pustaka</a>
    </div>

    <form action="{{ route('admin.pustaka.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="kode_pustaka" class="block">Kode Pustaka</label>
            <input type="number" name="kode_pustaka" id="kode_pustaka" class="w-full p-2 border rounded" required>
            @error('kode_pustaka')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="id_ddc" class="block">Dewey Decimal Classification (DDC)</label>
            <select name="id_ddc" id="id_ddc" class="w-full p-2 border rounded" required>
                <option value="">Pilih DDC</option>
                @foreach($ddcs as $ddc)
                    <option value="{{ $ddc->id_ddc }}">{{ $ddc->kode_ddc }} - {{ $ddc->ddc }}</option>
                @endforeach
            </select>
            @error('id_ddc')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="id_format" class="block">Format Pustaka</label>
            <select name="id_format" id="id_format" class="w-full p-2 border rounded" required>
                <option value="">Pilih Format</option>
                @foreach($formats as $format)
                    <option value="{{ $format->id_format }}">{{ $format->format }}</option>
                @endforeach
            </select>
            @error('id_format')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="id_penerbit" class="block">Penerbit</label>
            <select name="id_penerbit" id="id_penerbit" class="w-full p-2 border rounded" required>
                <option value="">Pilih Penerbit</option>
                @foreach($penerbits as $penerbit)
                    <option value="{{ $penerbit->id_penerbit }}">{{ $penerbit->nama_penerbit }}</option>
                @endforeach
            </select>
            @error('id_penerbit')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="id_pengarang" class="block">Pengarang</label>
            <select name="id_pengarang" id="id_pengarang" class="w-full p-2 border rounded" required>
                <option value="">Pilih Pengarang</option>
                @foreach($pengarangs as $pengarang)
                    <option value="{{ $pengarang->id_pengarang }}">{{ $pengarang->nama_pengarang }}</option>
                @endforeach
            </select>
            @error('id_pengarang')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="isbn" class="block">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="w-full p-2 border rounded" maxlength="20">
        </div>

        <div class="mb-4">
            <label for="judul_pustaka" class="block">Judul Pustaka</label>
            <input type="text" name="judul_pustaka" id="judul_pustaka" class="w-full p-2 border rounded" required>
            @error('judul_pustaka')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tahun_terbit" class="block">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" id="tahun_terbit" class="w-full p-2 border rounded" maxlength="5">
        </div>

        <div class="mb-4">
            <label for="keyword" class="block">Keyword</label>
            <input type="text" name="keyword" id="keyword" class="w-full p-2 border rounded" maxlength="50">
        </div>

        <div class="mb-4">
            <label for="keterangan_fisik" class="block">Keterangan Fisik</label>
            <input type="text" name="keterangan_fisik" id="keterangan_fisik" class="w-full p-2 border rounded" maxlength="100">
        </div>

        <div class="mb-4">
            <label for="keterangan_tambahan" class="block">Keterangan Tambahan</label>
            <input type="text" name="keterangan_tambahan" id="keterangan_tambahan" class="w-full p-2 border rounded" maxlength="100">
        </div>

        <div class="mb-4">
            <label for="abstraksi" class="block">Abstraksi</label>
            <textarea name="abstraksi" id="abstraksi" class="w-full p-2 border rounded" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="gambar" class="block">Gambar Pustaka</label>
            <input type="file" name="gambar" id="gambar" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="harga_buku" class="block">Harga Buku</label>
            <input type="number" name="harga_buku" id="harga_buku" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="kondisi_buku" class="block">Kondisi Buku</label>
            <input type="text" name="kondisi_buku" id="kondisi_buku" class="w-full p-2 border rounded" maxlength="15" required>
        </div>

        <div class="mb-4">
            <label for="fp" class="block text-gray-700 font-medium mb-2">Status Buku</label>
            <select name="fp" id="fp" required 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="0">Tersedia</option>
                <option value="1">Dipinjam</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jml_pinjam" class="block">Jumlah Pinjam</label>
            <input type="number" name="jml_pinjam" id="jml_pinjam" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="denda_terlambat" class="block">Denda Terlambat</label>
            <input type="number" name="denda_terlambat" id="denda_terlambat" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="denda_hilang" class="block">Denda Hilang</label>
            <input type="number" name="denda_hilang" id="denda_hilang" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Pustaka</button>
        </div>
    </form>
@endsection
