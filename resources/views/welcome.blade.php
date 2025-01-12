<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Perpustakaan</title>
    @vite('resources/css/app.css') <!-- Menyertakan Tailwind CSS -->
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex flex-col justify-center items-center py-12 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-extrabold text-gray-800">Selamat datang di Perpustakaan!</h1>
            <p class="mt-4 text-lg text-gray-600">Aplikasi manajemen perpustakaan untuk Anda.</p>
        </div>

        <div class="mt-8 space-x-4">
            @auth
                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-red-600 text-white text-lg font-semibold rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">
                        Logout
                    </button>
                </form>
            @else
                <!-- Tombol Login -->
                <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
                    Login
                </a>
                <!-- Tombol Register -->
                <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-green-600 text-white text-lg font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50">
                    Register
                </a>
            @endauth
        </div>

        <div class="mt-8 text-center">
            @auth
                <p class="text-gray-600">Terima kasih telah login!</p>
            @else
                <p class="text-gray-600">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700">Masuk sekarang</a></p>
            @endauth
        </div>
    </div>

</body>
</html>
