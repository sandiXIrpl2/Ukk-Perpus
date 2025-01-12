@extends('layouts.admin')

@section('header', 'Edit Anggota')

@section('content')
    <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Kode Anggota -->
        <div class="mb-4">
            <label for="kode_anggota" class="block text-gray-700">Kode Anggota</label>
            <input type="text" id="kode_anggota" name="kode_anggota" value="{{ old('kode_anggota', $anggota->kode_anggota) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('kode_anggota') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('kode_anggota')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Anggota -->
        <div class="mb-4">
            <label for="nama_anggota" class="block text-gray-700">Nama Anggota</label>
            <input type="text" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota', $anggota->nama_anggota) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('nama_anggota') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('nama_anggota')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Jenis Anggota -->
        <div class="mb-4">
            <label for="id_jenis_anggota" class="block text-gray-700">Jenis Anggota</label>
            <select id="id_jenis_anggota" name="id_jenis_anggota" class="mt-1 block w-full border p-2 rounded {{ $errors->has('id_jenis_anggota') ? 'border-red-500' : 'border-gray-300' }}" required>
                <option value="">Pilih Jenis Anggota</option>
                @foreach ($jenisAnggotas as $jenisAnggota)
                    <option value="{{ $jenisAnggota->id_jenis_anggota }}" {{ $anggota->id_jenis_anggota == $jenisAnggota->id_jenis_anggota ? 'selected' : '' }}>
                        {{ $jenisAnggota->jenis_anggota }}
                    </option>
                @endforeach
            </select>
            @error('id_jenis_anggota')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-4">
            <label for="tempat" class="block text-gray-700">Tempat Lahir</label>
            <input type="text" id="tempat" name="tempat" value="{{ old('tempat', $anggota->tempat) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('tempat') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('tempat')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-4">
            <label for="tgl_lahir" class="block text-gray-700">Tanggal Lahir</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $anggota->tgl_lahir) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('tgl_lahir') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('tgl_lahir')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $anggota->alamat) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('alamat') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('alamat')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- No Telepon -->
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700">No Telepon</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $anggota->no_telp) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('no_telp') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('no_telp')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $anggota->email) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Daftar -->
        <div class="mb-4">
            <label for="tgl_daftar" class="block text-gray-700">Tanggal Daftar</label>
            <input type="date" id="tgl_daftar" name="tgl_daftar" value="{{ old('tgl_daftar', $anggota->tgl_daftar) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('tgl_daftar') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('tgl_daftar')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Masa Aktif -->
        <div class="mb-4">
            <label for="masa_aktif" class="block text-gray-700">Masa Aktif</label>
            <input type="date" id="masa_aktif" name="masa_aktif" value="{{ old('masa_aktif', $anggota->masa_aktif) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('masa_aktif') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('masa_aktif')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- FA (Status) -->
        <div class="mb-4">
            <label for="fa" class="block text-gray-700">FA (Status)</label>
            <select id="fa" name="fa" class="mt-1 block w-full border p-2 rounded {{ $errors->has('fa') ? 'border-red-500' : 'border-gray-300' }}" required>
                <option value="Y" {{ $anggota->fa == 'Y' ? 'selected' : '' }}>Ya</option>
                <option value="T" {{ $anggota->fa == 'T' ? 'selected' : '' }}>Tidak</option>
            </select>
            @error('fa')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Keterangan -->
        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $anggota->keterangan) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('keterangan') ? 'border-red-500' : 'border-gray-300' }}">
            @error('keterangan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto Anggota -->
        <div class="mb-4">
            <label for="foto" class="block text-gray-700">Foto Anggota</label>
            <input type="file" id="foto" name="foto" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('foto') ? 'border-red-500' : 'border-gray-300' }}">
            @error('foto')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
            @if($anggota->foto)
                <img src="{{ Storage::url($anggota->foto) }}" alt="Foto Anggota" class="mt-2 w-32 h-32 object-cover">
            @endif
        </div>

        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username', $anggota->username) }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }}" required>
            @error('username')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password (Optional) -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password (Optional)</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" 
                   class="mt-1 block w-full border p-2 rounded {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}">
            @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Konfirmasi Password (Optional) -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" 
                   class="mt-1 block w-full border p-2 rounded">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
