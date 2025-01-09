<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanan_klinik = [
            'Konsultasi Dokter Umum',
            'Konsultasi Dokter Spesialis',
            'Pemeriksaan Fisik',
            'Cek Tekanan Darah',
            'Cek Gula Darah',
            'Cek Kolesterol',
            'Cek Asam Urat',
            'Vaksinasi',
            'Suntik Vitamin',
            'Nebulizer',
            'Perawatan Luka',
            'EKG (Elektrokardiogram)',
            'USG',
            'Rontgen',
            'Rapid Test COVID-19',
            'Swab PCR',
            'Imunisasi Anak',
            'Pemeriksaan Kehamilan',
            'Khitan',
            'Cabut Gigi'
        ];

        for ($i = 0; $i < 100; $i++) {
            DB::table('layanans')->insert([
                'nama_layanan' => $layanan_klinik[array_rand($layanan_klinik)],
                'harga_layanan' => rand(50000, 2000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
