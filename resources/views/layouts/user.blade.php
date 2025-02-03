<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Perpustakaan') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-full">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="{{ route('dashboard') }}" class="flex items-center py-4 px-2">
                            <span class="font-semibold text-gray-500 text-lg">Perpustakaan</span>
                        </a>
                    </div>
                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="{{ route('dashboard') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Beranda</a>
                        <a href="{{ route('katalog') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Katalog</a>
                        <a href="{{ route('about') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Tentang</a>
                    </div>
                </div>
                <!-- Secondary Navbar items -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-500">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Logout</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container mx-auto px-4 py-8 flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-4">
            <div class="text-center text-gray-500">
                &copy; {{ date('Y') }} Perpustakaan. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
