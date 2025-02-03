@extends('layouts.user')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6">Tentang Perpustakaan</h1>

    <div class="prose lg:prose-lg">
        <p class="mb-4">
            Selamat datang di Perpustakaan kami! Kami adalah institusi yang berkomitmen untuk menyediakan 
            akses ke pengetahuan dan informasi bagi semua anggota komunitas.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-4">Visi</h2>
        <p class="mb-4">
            Menjadi pusat pembelajaran dan pengembangan ilmu pengetahuan yang modern, 
            inklusif, dan berkelanjutan.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-4">Misi</h2>
        <ul class="list-disc pl-6 mb-4">
            <li>Menyediakan akses ke sumber daya informasi yang berkualitas</li>
            <li>Mendukung pembelajaran seumur hidup</li>
            <li>Memfasilitasi penelitian dan pengembangan ilmu pengetahuan</li>
            <li>Melestarikan warisan budaya dan intelektual</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-4">Jam Operasional</h2>
        <table class="w-full mb-4">
            <tr>
                <td class="py-2">Senin - Jumat</td>
                <td>: 08:00 - 16:00 WIB</td>
            </tr>
            <tr>
                <td class="py-2">Sabtu</td>
                <td>: 09:00 - 14:00 WIB</td>
            </tr>
            <tr>
                <td class="py-2">Minggu</td>
                <td>: Tutup</td>
            </tr>
        </table>

        <h2 class="text-xl font-semibold mt-6 mb-4">Kontak</h2>
        <p class="mb-2">Email: perpustakaan@example.com</p>
        <p class="mb-2">Telepon: (021) 1234-5678</p>
        <p class="mb-4">Alamat: Jl. Contoh No. 123, Kota, Provinsi 12345</p>
    </div>
</div>
@endsection 