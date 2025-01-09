<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $spesialisasi = [
            'Dokter Umum',
            'Dokter Gigi',
            'Dokter Anak',
            'Dokter Kandungan',
            'Dokter Jantung',
            'Dokter Mata',
            'Dokter THT',
            'Dokter Kulit',
            'Dokter Syaraf',
            'Dokter Bedah'
        ];

        $jadwalPraktik = [
            'Senin-Rabu 08:00-14:00',
            'Selasa-Kamis 09:00-15:00',
            'Rabu-Jumat 10:00-16:00',
            'Kamis-Sabtu 08:00-14:00',
            'Jumat-Minggu 09:00-15:00'
        ];

        for ($i = 0; $i < 100; $i++) {
            DB::table('dokters')->insert([
                'nama_dokter' => 'dr. ' . $faker->name,
                'spesialisasi' => $faker->randomElement($spesialisasi),
                'jadwal_praktik' => $faker->randomElement($jadwalPraktik),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
