@extends('layouts.main')
@section('content')
<div class="card">
    <h2>Tentang Sistem AgroClima Garut</h2>
    <p>
        AgroClima Garut merupakan inisiatif digitalisasi pertanian yang diinisiasi bersama Kelompok Tani Makmur di Kabupaten Garut. Sistem ini bertujuan untuk meningkatkan produktivitas serta ketahanan pangan lokal dengan mengintegrasikan pencatatan mikroklimat berbasis teknologi modern.
    </p>
</div>

<div class="card">
    <h2>Tujuan Sistem</h2>
    <ul class="content-list">
        <li>Menyediakan pencatatan hasil prediksi mikroklimat secara terpusat dan mudah diakses oleh operator maupun petani.</li>
        <li>Mendeteksi potensi kekeringan maupun kelebihan kadar air tanah secara dini.</li>
        <li>Memberikan panduan tindakan perawatan dan irigasi tanaman yang efektif dan efisien.</li>
        <li>Mendokumentasikan data deret waktu mikroklimat secara historis untuk kebutuhan analisis musim tanam.</li>
    </ul>
</div>

<div class="card">
    <h2>Lokasi Pemantauan</h2>
    <p>Pemantauan kondisi mikroklimat tanaman difokuskan pada tiga wilayah sentra pertanian di Kabupaten Garut, yaitu:</p>
    <ul class="content-list">
        <li><strong>Kecamatan Garut Kota</strong>: Kawasan pertanian perkotaan dan hortikultura sayuran.</li>
        <li><strong>Kecamatan Tarogong Kaler</strong>: Wilayah persawahan padi produktif dan palawija.</li>
        <li><strong>Kecamatan Samarang</strong>: Wilayah dataran tinggi dengan fokus komoditas cabai dan sayuran dataran tinggi.</li>
    </ul>
</div>

<div class="card">
    <h2>Parameter Mikroklimat yang Dicatat</h2>
    <p>Sistem memproses tiga parameter utama mikroklimat lahan pertanian:</p>
    <ul class="content-list">
        <li><strong>Suhu Udara (°C)</strong>: Pengukuran temperatur lingkungan mikro tanaman.</li>
        <li><strong>Kelembapan Udara (%)</strong>: Persentase uap air di udara sekitar tanaman.</li>
        <li><strong>Kelembapan Tanah (%)</strong>: Parameter penentu ketersediaan air tanah yang mendasari status perawatan.</li>
    </ul>
</div>

<div class="card">
    <h2>Model Prediksi yang Digunakan</h2>
    <p>
        Model prediksi yang digunakan adalah <strong>Long Short-Term Memory (LSTM)</strong>. Algoritma Deep Learning ini dipilih karena keunggulannya dalam menangkap dependensi jangka panjang pada data deret waktu (time-series data) yang dihasilkan oleh stasiun sensor IoT di lahan pertanian.
    </p>
</div>
@endsection
