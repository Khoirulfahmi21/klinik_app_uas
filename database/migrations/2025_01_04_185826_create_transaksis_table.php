<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('kode_trx');
            $table->string('id_user');
            $table->string('kode_layanan');
            $table->string('id_dokter');
            $table->string('jadwal_temu')->nullable();
            $table->string('kode_ruangan');
            $table->string('total_biaya');
            $table->string('status_trx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
