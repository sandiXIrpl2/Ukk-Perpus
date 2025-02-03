<?php

namespace App\Http\Controllers;

use App\Models\Ddc;
use App\Models\Pustaka;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Pustaka::with(['pengarang', 'ddc']);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul_pustaka', 'like', "%{$search}%")
                  ->orWhere('isbn', 'like', "%{$search}%")
                  ->orWhereHas('pengarang', function($q) use ($search) {
                      $q->where('nama_pengarang', 'like', "%{$search}%");
                  });
            });
        }

        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('id_ddc', $request->category);
        }

        $pustakas = $query->paginate(12);
        $ddcs = Ddc::all();

        return view('katalog.index', compact('pustakas', 'ddcs'));
    }

    public function show($id)
    {
        $pustaka = Pustaka::with(['pengarang', 'penerbit', 'ddc', 'format'])->findOrFail($id);
        return view('katalog.show', compact('pustaka'));
    }
} 