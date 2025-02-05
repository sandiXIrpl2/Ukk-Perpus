@extends('layouts.admin')

@section('header', 'Dashboard Admin')

@section('content')
<div class="max-w-6xl mx-auto">
    <h3 class="text-2xl font-semibold text-center mb-6">Dashboard Admin</h3>
    <p class="text-gray-600 text-center mb-6">Selamat datang di panel admin perpustakaan!</p>
    
    <!-- Cards Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Jumlah Anggota -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="bg-blue-500 p-4 rounded-full text-white">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-lg font-semibold">Anggota</h4>
                <p class="text-2xl font-bold">{{ $jumlahAnggota }}</p>
            </div>
        </div>
        
        <!-- Jumlah Transaksi -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="bg-green-500 p-4 rounded-full text-white">
                <i class="fas fa-exchange-alt text-2xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-lg font-semibold">Transaksi</h4>
                <p class="text-2xl font-bold">{{ $jumlahTransaksi }}</p>
            </div>
        </div>

        <!-- Jumlah Pustaka -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="bg-yellow-500 p-4 rounded-full text-white">
                <i class="fas fa-book text-2xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-lg font-semibold">Pustaka</h4>
                <p class="text-2xl font-bold">{{ $jumlahPustaka }}</p>
            </div>
        </div>

        <!-- Jumlah Rak -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="bg-red-500 p-4 rounded-full text-white">
                <i class="fas fa-boxes text-2xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-lg font-semibold">Rak</h4>
                <p class="text-2xl font-bold">{{ $jumlahRak }}</p>
            </div>
        </div>
    </div>
</div>
@endsection