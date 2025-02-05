<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\JenisAnggota;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnggotaAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.anggota.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('anggota')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('katalog'));
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::guard('anggota')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showRegistrationForm()
    {
        $jenisAnggotas = JenisAnggota::all();
        return view('auth.anggota.register', compact('jenisAnggotas'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:100|unique:tbl_anggota',
            'tempat' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:100',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|unique:tbl_anggota',
            'username' => 'required|string|max:20|unique:tbl_anggota',
            'password' => 'required|string|min:6|confirmed',
            'id_jenis_anggota' => 'required|exists:tbl_jenis_anggota,id_jenis_anggota',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Generate ID dan kode anggota
        $id_anggota = 'AGT-' . Str::random(10);
        $kode_anggota = 'A' . date('Ymd') . Str::random(4);

        // Handle foto upload
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('anggota-photos', 'public');
        }

        $anggota = Anggota::create([
            'id_anggota' => $id_anggota,
            'id_jenis_anggota' => $request->id_jenis_anggota,
            'kode_anggota' => $kode_anggota,
            'nama_anggota' => $request->nama_anggota,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'tgl_daftar' => now(),
            'masa_aktif' => now()->addYear(), // Masa aktif 1 tahun
            'fa' => 'Y', // Status aktif
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'keterangan' => 'Anggota baru',
            'foto' => $fotoPath ?? 'anggota-photos/default.jpg', // Gunakan foto default jika tidak ada upload
        ]);

        // Login setelah registrasi
        auth()->guard('anggota')->login($anggota);

        return redirect()->route('katalog')
            ->with('success', 'Registrasi berhasil! Selamat datang di Perpustakaan.');
    }
} 