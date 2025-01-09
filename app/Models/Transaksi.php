<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    // Set primary key menjadi kode_trx
    protected $primaryKey = 'kode_trx';

    // Jika primary key bukan auto-incrementing
    public $incrementing = false;

    // Jika primary key bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'id_user',
        'kode_layanan',
        'id_dokter',
        'jadwal_temu',
        'kode_ruangan',
        'total_biaya',
        'status_trx'
        
    ];

    // Definisikan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    // Definisikan relasi ke model ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'kode_ruangan');
    }
    // Definisikan relasi ke model layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'kode_layanan');
    }
    // Definisikan relasi ke model dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }


}