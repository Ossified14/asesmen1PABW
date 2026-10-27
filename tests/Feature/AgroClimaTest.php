<?php

namespace Tests\Feature;

use App\Models\PrediksiMikroklimat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AgroClimaTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_utama_bisa_diakses()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('AgroClima Kabupaten Garut');
        $response->assertSee('Selamat Datang di AgroClima Garut – Sistem Prediksi Mikroklimat Tanaman Berbasis LSTM');
        $response->assertSee('&copy; 2026 AgroClima Kelompok Tani Makmur Kabupaten Garut', false);
    }

    public function test_halaman_tentang_bisa_diakses()
    {
        $response = $this->get(route('tentang'));

        $response->assertStatus(200);
        $response->assertSee('Kecamatan Garut Kota');
        $response->assertSee('Kecamatan Tarogong Kaler');
        $response->assertSee('Kecamatan Samarang');
        $response->assertSee('LSTM');
    }

    public function test_halaman_prediksi_menampilkan_form()
    {
        $response = $this->get(route('prediksi'));

        $response->assertStatus(200);
        $response->assertSee('Form Input Hasil Prediksi Mikroklimat');
        $response->assertSee('name="lokasi"', false);
        $response->assertSee('name="nama_tanaman"', false);
        $response->assertSee('name="suhu_udara"', false);
        $response->assertSee('name="kelembapan_udara"', false);
        $response->assertSee('name="kelembapan_tanah"', false);
    }

    public function test_proses_prediksi_kering()
    {
        $payload = [
            'lokasi' => 'Garut Kota',
            'nama_tanaman' => 'Cabai',
            'suhu_udara' => 32.5,
            'kelembapan_udara' => 50,
            'kelembapan_tanah' => 30, // < 40% -> Kering
        ];

        $response = $this->post(route('hasil-prediksi'), $payload);

        $response->assertStatus(200);
        $response->assertSee('Kering');
        $response->assertSee('Segera lakukan penyiraman atau irigasi');

        $this->assertDatabaseHas('prediksi_mikroklimat', [
            'lokasi' => 'Garut Kota',
            'nama_tanaman' => 'Cabai',
            'status_mikroklimat' => 'Kering',
        ]);
    }

    public function test_proses_prediksi_optimal()
    {
        $payload = [
            'lokasi' => 'Tarogong Kaler',
            'nama_tanaman' => 'Padi',
            'suhu_udara' => 28.0,
            'kelembapan_udara' => 70,
            'kelembapan_tanah' => 55, // 40-70% -> Optimal
        ];

        $response = $this->post(route('hasil-prediksi'), $payload);

        $response->assertStatus(200);
        $response->assertSee('Optimal');
        $response->assertSee('Pertahankan pola perawatan saat ini');

        $this->assertDatabaseHas('prediksi_mikroklimat', [
            'lokasi' => 'Tarogong Kaler',
            'nama_tanaman' => 'Padi',
            'status_mikroklimat' => 'Optimal',
        ]);
    }

    public function test_proses_prediksi_terlalu_lembap()
    {
        $payload = [
            'lokasi' => 'Samarang',
            'nama_tanaman' => 'Jagung',
            'suhu_udara' => 24.0,
            'kelembapan_udara' => 85,
            'kelembapan_tanah' => 80, // > 70% -> Terlalu Lembap
        ];

        $response = $this->post(route('hasil-prediksi'), $payload);

        $response->assertStatus(200);
        $response->assertSee('Terlalu Lembap');
        $response->assertSee('Kurangi penyiraman dan periksa drainase');

        $this->assertDatabaseHas('prediksi_mikroklimat', [
            'lokasi' => 'Samarang',
            'nama_tanaman' => 'Jagung',
            'status_mikroklimat' => 'Terlalu Lembap',
        ]);
    }

    public function test_halaman_riwayat_menampilkan_data()
    {
        PrediksiMikroklimat::create([
            'lokasi' => 'Garut Kota',
            'nama_tanaman' => 'Cabai',
            'suhu_udara' => 25.5,
            'kelembapan_udara' => 60,
            'kelembapan_tanah' => 50,
            'status_mikroklimat' => 'Optimal',
        ]);

        $response = $this->get(route('riwayat'));

        $response->assertStatus(200);
        $response->assertSee('Riwayat Hasil Prediksi Mikroklimat');
        $response->assertSee('Garut Kota');
        $response->assertSee('Cabai');
        $response->assertSee('Optimal');
    }
}
