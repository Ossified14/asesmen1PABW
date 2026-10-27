@extends('layouts.main')

@section('content')
<div class="card">
    <h2>Hasil Prediksi Mikroklimat Tanaman</h2>
    <p>Data prediksi telah berhasil diolah dan disimpan ke sistem basis data AgroClima Garut.</p>

    {{-- Pembedaan tampilan status mikroklimat menggunakan directive Blade @if, @elseif, @else --}}
    @if ($status_mikroklimat === 'Kering')
        <div class="rekomendasi-box rekomendasi-kering">
            <strong>Status Mikroklimat: Kering</strong><br>
            Rekomendasi: {{ $rekomendasi }}
        </div>
    @elseif ($status_mikroklimat === 'Optimal')
        <div class="rekomendasi-box rekomendasi-optimal">
            <strong>Status Mikroklimat: Optimal</strong><br>
            Rekomendasi: {{ $rekomendasi }}
        </div>
    @else
        <div class="rekomendasi-box rekomendasi-lembap">
            <strong>Status Mikroklimat: Terlalu Lembap</strong><br>
            Rekomendasi: {{ $rekomendasi }}
        </div>
    @endif

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 35%;">Parameter / Kategori</th>
                <th>Nilai Input / Hasil Analisis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Lokasi Lahan</strong></td>
                <td>{{ $prediksi->lokasi }}</td>
            </tr>
            <tr>
                <td><strong>Nama Tanaman</strong></td>
                <td>{{ $prediksi->nama_tanaman }}</td>
            </tr>
            <tr>
                <td><strong>Prediksi Suhu Udara</strong></td>
                <td>{{ $prediksi->suhu_udara }} &deg;C</td>
            </tr>
            <tr>
                <td><strong>Prediksi Kelembapan Udara</strong></td>
                <td>{{ $prediksi->kelembapan_udara }} %</td>
            </tr>
            <tr>
                <td><strong>Prediksi Kelembapan Tanah</strong></td>
                <td>{{ $prediksi->kelembapan_tanah }} %</td>
            </tr>
            <tr>
                <td><strong>Status Mikroklimat</strong></td>
                <td>
                    @if ($status_mikroklimat === 'Kering')
                        <span class="badge badge-kering">{{ $status_mikroklimat }}</span>
                    @elseif ($status_mikroklimat === 'Optimal')
                        <span class="badge badge-optimal">{{ $status_mikroklimat }}</span>
                    @else
                        <span class="badge badge-lembap">{{ $status_mikroklimat }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td><strong>Rekomendasi Perawatan</strong></td>
                <td>{{ $rekomendasi }}</td>
            </tr>
            <tr>
                <td><strong>Waktu Pencatatan</strong></td>
                <td>{{ $prediksi->created_at ? $prediksi->created_at->format('d-m-Y H:i:s') : '-' }}</td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top: 1.5rem; display: flex; gap: 0.5rem;">
        <a href="{{ route('prediksi') }}" class="btn">Input Prediksi Baru</a>
        <a href="{{ route('riwayat') }}" class="btn btn-secondary">Lihat Riwayat Prediksi</a>
    </div>
</div>
@endsection
