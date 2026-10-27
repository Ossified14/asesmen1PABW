@extends('layouts.main')

@section('content')
<div class="card">
    <h2>Form Input Hasil Prediksi Mikroklimat</h2>
    <p>Silakan masukkan data hasil estimasi/prediksi mikroklimat lahan pertanian untuk mendapatkan status dan rekomendasi perawatan.</p>

    @if ($errors->any())
        <div style="background-color: #fef2f2; border-left: 4px solid #ef4444; padding: 1rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <ul style="color: #b91c1c; margin-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hasil-prediksi') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="lokasi">Lokasi Lahan</label>
            <select name="lokasi" id="lokasi" required>
                <option value="">-- Pilih Lokasi Lahan --</option>
                <option value="Garut Kota" {{ old('lokasi') == 'Garut Kota' ? 'selected' : '' }}>Garut Kota</option>
                <option value="Tarogong Kaler" {{ old('lokasi') == 'Tarogong Kaler' ? 'selected' : '' }}>Tarogong Kaler</option>
                <option value="Samarang" {{ old('lokasi') == 'Samarang' ? 'selected' : '' }}>Samarang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nama_tanaman">Nama Tanaman</label>
            <input type="text" name="nama_tanaman" id="nama_tanaman" value="{{ old('nama_tanaman') }}" placeholder="Contoh: Padi, Jagung, Cabai" required>
        </div>

        <div class="form-group">
            <label for="suhu_udara">Prediksi Suhu Udara (&deg;C)</label>
            <input type="number" step="0.1" name="suhu_udara" id="suhu_udara" value="{{ old('suhu_udara') }}" placeholder="Contoh: 28.5" required>
        </div>

        <div class="form-group">
            <label for="kelembapan_udara">Prediksi Kelembapan Udara (%)</label>
            <input type="number" name="kelembapan_udara" id="kelembapan_udara" min="0" max="100" value="{{ old('kelembapan_udara') }}" placeholder="Contoh: 75" required>
        </div>

        <div class="form-group">
            <label for="kelembapan_tanah">Prediksi Kelembapan Tanah (%)</label>
            <input type="number" name="kelembapan_tanah" id="kelembapan_tanah" min="0" max="100" value="{{ old('kelembapan_tanah') }}" placeholder="Contoh: 55" required>
        </div>

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn">Simpan &amp; Proses Prediksi</button>
            <a href="{{ route('home') }}" class="btn btn-secondary" style="margin-left: 0.5rem;">Batal</a>
        </div>
    </form>
</div>
@endsection
