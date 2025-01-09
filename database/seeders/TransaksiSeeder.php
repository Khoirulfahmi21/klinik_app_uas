<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            DB::table('transaksis')->insert([
                'id_user' => 'USR' . $faker->unique()->numberBetween(1000, 9999),
                'kode_layanan' => 'LYN' . $faker->numberBetween(100, 999),
                'id_dokter' => 'DOK' . $faker->numberBetween(100, 999),
                'jadwal_temu' => $faker->dateTimeBetween('now', '+30 days')->format('Y-m-d H:i:s'),
                'kode_ruangan' => 'RUA' . $faker->numberBetween(100, 999),
                'total_biaya' => $faker->numberBetween(100000, 1000000),
                'status_trx' => $faker->randomElement(['pending', 'selesai', 'batal']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}