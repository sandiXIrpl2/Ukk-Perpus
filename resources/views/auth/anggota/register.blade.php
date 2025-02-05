@extends('layouts.user')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Registrasi Anggota Baru</h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('anggota.register') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_anggota" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="nama_anggota" id="nama_anggota" value="{{ old('nama_anggota') }}" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="tempat" class="block text-gray-700 font-medium mb-2">Tempat Lahir</label>
                    <input type="text" name="tempat" id="tempat" value="{{ old('tempat') }}" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label for="tgl_lahir" class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                </div>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                <textarea name="alamat" id="alamat" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">{{ old('alamat') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="no_telp" class="block text-gray-700 font-medium mb-2">No. Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                </div>
            </div>

            <div class="mb-4">
                <label for="id_jenis_anggota" class="block text-gray-700 font-medium mb-2">Jenis Anggota</label>
                <select name="id_jenis_anggota" id="id_jenis_anggota" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                    <option value="">Pilih Jenis Anggota</option>
                    @foreach($jenisAnggotas as $jenisAnggota)
                        <option value="{{ $jenisAnggota->id_jenis_anggota }}" 
                            {{ old('id_jenis_anggota') == $jenisAnggota->id_jenis_anggota ? 'selected' : '' }}>
                            {{ $jenisAnggota->jenis_anggota }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-6">
                <label for="foto" class="block text-gray-700 font-medium mb-2">Foto (Opsional)</label>
                <input type="file" name="foto" id="foto" accept="image/*"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, JPEG, PNG (Max. 2MB)</p>
            </div>

            <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                Daftar
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-gray-600">Sudah punya akun? 
                <a href="{{ route('anggota.login') }}" class="text-blue-500 hover:text-blue-600">Login di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection 