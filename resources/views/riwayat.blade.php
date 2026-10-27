@extends('layouts.main')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
        <div>
            <h2>Riwayat Hasil Prediksi Mikroklimat</h2>
            <p>Daftar seluruh riwayat data simulasi prediksi kondisi mikroklimat lahan pertanian di Kabupaten Garut.</p>
        </div>
        <div>
            <a href="{{ route('prediksi') }}" class="btn">+ Tambah Prediksi Baru</a>
        </div>
    </div>

    <div style="overflow-x: auto;">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Lokasi Lahan</th>
                    <th>Tanaman</th>
                    <th>Suhu Udara</th>
                    <th>Kelembapan Udara</th>
                    <th>Kelembapan Tanah</th>
                    <th>Status Mikroklimat</th>
                    <th>Waktu Pencatatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data_prediksi as $index => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->nama_tanaman }}</td>
                        <td>{{ $item->suhu_udara }} &deg;C</td>
                        <td>{{ $item->kelembapan_udara }} %</td>
                        <td>{{ $item->kelembapan_tanah }} %</td>
                        <td>
                            @if ($item->status_mikroklimat === 'Kering')
                                <span class="badge badge-kering">Kering</span>
                            @elseif ($item->status_mikroklimat === 'Optimal')
                                <span class="badge badge-optimal">Optimal</span>
                            @else
                                <span class="badge badge-lembap">Terlalu Lembap</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center; color: #64748b; padding: 2rem;">
                            Belum ada data riwayat prediksi mikroklimat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
