<?php
namespace Database\Seeders;
use App\Models\PrediksiMikroklimat;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PrediksiMikroklimatSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $lokasiList = ['Garut Kota', 'Tarogong Kaler', 'Samarang'];
        $tanamanList = ['Padi', 'Jagung', 'Cabai'];
        
        for ($i = 0; $i < 20; $i++) {
            $lokasi = $faker->randomElement($lokasiList);
            $namaTanaman = $faker->randomElement($tanamanList);
            $suhuUdara = $faker->randomFloat(1, 18, 35);
            $kelembapanUdara = $faker->numberBetween(40, 100);
            $kelembapanTanah = $faker->numberBetween(20, 90);

            if ($kelembapanTanah < 40) {
                $statusMikroklimat = 'Kering';
            } elseif ($kelembapanTanah <= 70) {
                $statusMikroklimat = 'Optimal';
            } else {
                $statusMikroklimat = 'Terlalu Lembap';
            }

            PrediksiMikroklimat::create([
                'lokasi' => $lokasi,
                'nama_tanaman' => $namaTanaman,
                'suhu_udara' => $suhuUdara,
                'kelembapan_udara' => $kelembapanUdara,
                'kelembapan_tanah' => $kelembapanTanah,
                'status_mikroklimat' => $statusMikroklimat,
            ]);
        }
    }
}
