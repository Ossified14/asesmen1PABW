<?php
namespace App\Http\Controllers;
use App\Models\PrediksiMikroklimat;
use Illuminate\Http\Request;

class PrediksiController extends Controller
{
    public function index()
    {
        return view('prediksi');
    }

    public function prosesData(Request $request)
    {
        $request->validate([
            'lokasi' => 'required|string',
            'nama_tanaman' => 'required|string|max:100',
            'suhu_udara' => 'required|numeric',
            'kelembapan_udara' => 'required|integer',
            'kelembapan_tanah' => 'required|integer',
        ]);

        $kelembapan_tanah = (int) $request->kelembapan_tanah;

        if ($kelembapan_tanah < 40) {
            $status_mikroklimat = 'Kering';
            $rekomendasi = 'Segera lakukan penyiraman atau irigasi';
        } elseif ($kelembapan_tanah <= 70) {
            $status_mikroklimat = 'Optimal';
            $rekomendasi = 'Pertahankan pola perawatan saat ini';
        } else {
            $status_mikroklimat = 'Terlalu Lembap';
            $rekomendasi = 'Kurangi penyiraman dan periksa drainase';
        }

        $prediksi = PrediksiMikroklimat::create([
            'lokasi' => $request->lokasi,
            'nama_tanaman' => $request->nama_tanaman,
            'suhu_udara' => $request->suhu_udara,
            'kelembapan_udara' => $request->kelembapan_udara,
            'kelembapan_tanah' => $request->kelembapan_tanah,
            'status_mikroklimat' => $status_mikroklimat,
        ]);

        return view('hasil', compact('prediksi', 'status_mikroklimat', 'rekomendasi'));
    }

    public function riwayat()
    {
        $data_prediksi = PrediksiMikroklimat::orderBy('id', 'desc')->get();

        return view('riwayat', compact('data_prediksi'));
    }
}