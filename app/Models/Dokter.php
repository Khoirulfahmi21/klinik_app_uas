<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';

    // Set primary key menjadi id_dokter
    protected $primaryKey = 'id_dokter';

    // Jika primary key bukan auto-incrementing
    public $incrementing = false;

    // Jika primary key bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'id_dokter',
        'nama_dokter',
        'spesialisasi',
        'jadwal_praktik',
    ];
}