<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Dashboard</h2>
            </div>
            <ul class="space-y-2 px-4 py-6">
                <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Dashboard</a></li>
                <li><a href="{{ route('profile.edit') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Profile</a></li>
                <li><a href="{{ route('rak.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Rak</a></li>
                <li><a href="{{ route('ddc.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">DDC</a></li>
                <li><a href="{{ route('format.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Format</a></li>
                <li><a href="{{ route('jenis_anggota.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Jenis Anggota</a></li>
                <li><a href="{{ route('penerbit.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Penerbit</a></li>
                <li><a href="{{ route('pengarang.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Pengarang</a></li>
                <li><a href="{{ route('perpustakaan.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Perpustakaan</a></li>
                <li><a href="{{ route('pustaka.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Pustaka</a></li>
                <li><a href="{{ route('anggota.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Anggota</a></li>
                <li><a href="{{ route('transaksi.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Transaksi</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header ?? 'Dashboard' }}
                </h2>
            </x-slot>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
