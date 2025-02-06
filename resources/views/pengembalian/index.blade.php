@extends('layouts.user')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Pengembalian Buku</h2>
        <a href="{{ route('pengembalian.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Pengembalian
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Buku</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Pinjam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Kembali</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterlambatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Denda</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kondisi Buku</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($transaksis->where('fp', '0') as $transaksi)
                    <tr>
                        <td class="px-6 py-4">{{ $transaksi->id_transaksi }}</td>
                        <td class="px-6 py-4">{{ $transaksi->pustaka->judul_pustaka }}</td>
                        <td class="px-6 py-4">{{ $transaksi->tgl_pinjam }}</td>
                        <td class="px-6 py-4">{{ $transaksi->tgl_kembali }}</td>
                        <td class="px-6 py-4">
                            <span class="{{ str_contains($transaksi->getStatusKeterlambatan(), 'Terlambat') ? 'text-red-500' : 'text-green-500' }}">
                                {{ $transaksi->getStatusKeterlambatan() }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($transaksi->hitungDenda() > 0)
                                <span class="text-red-500">
                                    Rp {{ number_format($transaksi->hitungDenda(), 0, ',', '.') }}
                                </span>
                            @else
                                <span class="text-green-500">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('pengembalian.return', $transaksi->id_transaksi) }}" method="POST" class="flex gap-2">
                                @csrf
                                @method('PUT')
                                <select name="kondisi_buku" id="kondisi_buku_{{ $transaksi->id_transaksi }}" 
                                        class="border rounded px-2 py-1 flex-1">
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                    <option value="Rusak Berat">Rusak Berat</option>
                                    <option value="Hilang">Hilang</option>
                                </select>
                                <button type="submit" 
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm"
                                        onclick="return confirmReturn({{ $transaksi->id_transaksi }})">
                                    Kembalikan
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada buku yang perlu dikembalikan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
function confirmReturn(transaksiId) {
    const kondisiBuku = document.getElementById('kondisi_buku_' + transaksiId).value;
    let message = 'Apakah Anda yakin ingin mengembalikan buku ini?';
    
    if (kondisiBuku !== 'Baik') {
        let dendaInfo = '';
        switch (kondisiBuku) {
            case 'Rusak Ringan':
                dendaInfo = '(Denda: Rp 20.000)';
                break;
            case 'Rusak Berat':
                dendaInfo = '(Denda: Rp 50.000)';
                break;
            case 'Hilang':
                dendaInfo = '(Denda: Rp 100.000)';
                break;
        }
        message += `\nKondisi buku: ${kondisiBuku} ${dendaInfo}`;
    }
    
    return confirm(message);
}
</script>
@endpush
@endsection 