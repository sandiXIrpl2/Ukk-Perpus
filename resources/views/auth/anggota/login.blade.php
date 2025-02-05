@extends('layouts.user')

@section('content')
<div class="max-w-md mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Login Anggota</h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('anggota.login') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" name="username" id="username" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
            </div>

            <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-gray-600">Belum punya akun? 
                <a href="{{ route('anggota.register') }}" class="text-blue-500 hover:text-blue-600">Daftar di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection 