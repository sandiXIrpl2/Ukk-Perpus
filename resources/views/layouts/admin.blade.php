<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Perpustakaan Admin') }}</title>
    @vite('resources/css/app.css') <!-- Pastikan Anda sudah menggunakan Tailwind CSS dengan Vite -->
</head>
<body class="bg-gray-100">

    <!-- Sidebar and Content -->
    <div class="flex">

        <!-- Sidebar -->
        <div class="w-72 bg-gray-800 text-white p-3 h-screen fixed">
            <h3 class="text-2xl font-bold mb-6">Admin Perpustakaan</h3>
            <ul>
                <!-- Dashboard Link -->
                <li class="mb-4">
                    <a href="{{ route('admin.home') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.home') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Dashboard
                    </a>
                </li>

                <!-- Manajemen Rak -->
                <li class="mb-4">
                    <a href="{{ route('admin.raks.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.raks.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Rak
                    </a>
                </li>

                <!-- Manajemen Ddc -->
                <li class="mb-4">
                    <a href="{{ route('admin.ddc.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.ddc.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        DDC
                    </a>
                </li>

                <!-- Manajemen Format -->
                <li class="mb-4">
                    <a href="{{ route('admin.format.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.format.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Format
                    </a>
                </li>

                <!-- Manajemen Penerbit -->
                <li class="mb-4">
                    <a href="{{ route('admin.penerbit.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.penerbit.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Penerbit
                    </a>
                </li>

                <!-- Manajemen Pengarang -->
                <li class="mb-4">
                    <a href="{{ route('admin.pengarang.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.pengarang.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Pengarang
                    </a>
                </li>

                <!-- Manajemen Jenis Anggota -->
                <li class="mb-4">
                    <a href="{{ route('admin.jenis_anggota.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.jenis_anggota.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Jenis Anggota
                    </a>
                </li>

                <!-- Manajemen Pustaka -->
                <li class="mb-4">
                    <a href="{{ route('admin.pustaka.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.pustaka.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Pustaka
                    </a>
                </li>

                <!-- Manajemen Anggota -->
                <li class="mb-4">
                    <a href="{{ route('admin.anggota.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.anggota.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Anggota
                    </a>
                </li>

                <!-- Manajemen Transaksi -->
                <li class="mb-4">
                    <a href="{{ route('admin.transaksi.index') }}" 
                        class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md 
                        {{ request()->routeIs('admin.transaksi.*') ? 'bg-blue-600' : 'hover:bg-blue-500' }}">
                        Transaksi
                    </a>
                </li>

                <!-- Logout -->
                <li class="mb-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                            class="text-lg text-white hover:text-blue-300 px-4 py-2 rounded-md hover:bg-blue-500 w-full text-left">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-72 p-6">
            <!-- Header Section -->
            {{-- <div class="bg-white shadow-md p-4 mb-6 rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    - 
                </h2>
            </div> --}}

            <!-- Content Section -->
            <div class="bg-white p-6 shadow-md rounded-lg">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
