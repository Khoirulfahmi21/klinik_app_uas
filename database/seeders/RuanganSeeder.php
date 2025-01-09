<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Daftar jenis ruangan klinik
        $jenisRuangan = [
            'Poli Umum',
            'Poli Gigi',
            'Poli Anak',
            'Poli Mata',
            'Poli THT',
            'Poli Kulit',
            'Ruang Laboratorium',
            'Ruang Radiologi',
            'Ruang UGD',
            'Ruang Farmasi',
            'Ruang Tunggu',
            'Ruang Administrasi',
            'Ruang Konsultasi',
            'Ruang Tindakan',
            'Ruang Perawat'
        ];

        // Daftar deskripsi yang mungkin
        $deskripsi = [
            'Ruangan untuk pemeriksaan dan konsultasi pasien',
            'Dilengkapi dengan peralatan medis standar',
            'Ruangan ber-AC dan nyaman untuk pasien',
            'Tersedia wastafel dan peralatan steril',
            'Ruangan dengan pencahayaan yang baik',
            'Dilengkapi tempat tidur periksa',
            'Area steril untuk tindakan medis',
            'Ruangan khusus untuk penanganan pasien',
            'Dilengkapi dengan sistem ventilasi yang baik',
            'Area pelayanan untuk pasien'
        ];

        // Generate 100 data
        for ($i = 1; $i <= 100; $i++) {
            $jenisRuang = $faker->randomElement($jenisRuangan);
            
            DB::table('ruangans')->insert([
                'nama_ruangan' => $jenisRuang . ' ' . $i,
                'desc_ruangan' => $faker->randomElement($deskripsi) . ' di ' . $jenisRuang,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
