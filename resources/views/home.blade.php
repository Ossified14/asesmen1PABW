@extends('layouts.main')

@section('content')
<div class="card">
    <h2>Selamat Datang di AgroClima Garut – Sistem Prediksi Mikroklimat Tanaman Berbasis LSTM</h2>
    <p>
        Selamat datang di aplikasi web resmi <strong>AgroClima Garut</strong>. Sistem ini dirancang untuk mendukung para petani di bawah naungan Kelompok Tani Makmur Kabupaten Garut dalam memantau dan mengantisipasi perubahan kondisi lingkungan di sekitar lahan pertanian mereka secara digital dan akurat.
    </p>
</div>

<div class="card">
    <h2>Tujuan Pengembangan Sistem</h2>
    <p>
        Pengembangan sistem AgroClima Garut memiliki beberapa tujuan strategis:
    </p>
    <ul class="content-list">
        <li>Membantu petani mengantisipasi perubahan mikroklimat pada tanaman 24 jam ke depan.</li>
        <li>Menggantikan pencatatan manual berbasis buku dengan sistem pencatatan berbasis web yang terstruktur.</li>
        <li>Mempermudah pemantauan tren suhu udara, kelembapan udara, dan kelembapan tanah di lahan pertanian.</li>
        <li>Memberikan rekomendasi perawatan tanaman yang tepat berdasarkan status kelembapan tanah untuk mencegah gagal panen.</li>
    </ul>
</div>

<div class="card">
    <h2>Teknologi Deep Learning (LSTM)</h2>
    <p>
        Sistem AgroClima memanfaatkan teknologi kecerdasan buatan berbasis <strong>Long Short-Term Memory (LSTM)</strong>, yang merupakan salah satu varian dari <em>Recurrent Neural Network (RNN)</em>. Model ini dilatih secara khusus untuk mengenali pola deret waktu (time series) dari sensor IoT yang dipasang di lahan pertanian.
    </p>
    <p>
        Dengan memanfaatkan arsitektur sel memori pada LSTM, sistem mampu memprediksi fluktuasi parameter mikroklimat secara akurat berdasarkan riwayat data kondisi cuaca dan kelembapan sebelumnya.
    </p>
    <div style="margin-top: 1.5rem;">
        <a href="{{ route('prediksi') }}" class="btn">Mulai Input Prediksi &raquo;</a>
        <a href="{{ route('riwayat') }}" class="btn btn-secondary">Lihat Riwayat &raquo;</a>
    </div>
</div>
@endsection
